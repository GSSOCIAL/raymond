<?php
class BeanExport{
    /**Supported export extensions*/
    const extension_supported = array("xml","json","csv","html","docx");
    /**Return generated record as file */
    public $force_download=false;
    /**Which sections need to export*/
    public $sections = "*";
    /**
     * @param string $module Module name (e.g Accounts,Cases,CaseHistory)
     * @param string $record Record id
     */
    function __construct($module,$record){
        return $this->retrieve($module,$record);
    }
    /**
     * @param string $module Module name (e.g Accounts,Cases,CaseHistory)
     * @param string $record Record id
     */
    public function retrieve($module,$record){
        global $sugar_config;
        $this->module_name = $module;
        $this->object_name = BeanFactory::getObjectName($this->module_name);
        $this->record_id = $record;
        $this->context = array();
        $this->table_context = array();
        $this->bean = BeanFactory::getBean($this->module_name,$this->record_id);
        if(!$this->bean){
            $this->content["message"] = "Couldnt retrieve \"{$this->module_name}\" record {$this->record_id}";
            return $this;
        }
        //Get context
        $this->context["properties"] = array(
            "id"=>$this->record_id,
            "module"=>$this->module_name,
            "url"=>"{$sugar_config['site_url']}/index.php?module={$this->module_name}&action=DetailView&record={$this->record_id}"
        );
        switch($this->module_name){
            case "Cases":
                $this->context["properties"]["case_number"]=$this->bean->case_number;
                $this->context["properties"]["subject"]=$this->bean->name;
                $this->context["properties"]["description"]=$this->bean->description;
                $this->context["properties"]["created"]=$this->bean->date_entered;
                $this->context["properties"]["modified"]=$this->bean->date_modified;
                $this->context["properties"]["account_id"]=$this->bean->account_id;
                //Get Case Updates records
                $this->context["case_updates"] = array();
                global $db;
                $query = $db->query("SELECT t.id,t.description AS `message`,t.assigned_user_id,t.internal,t.date_entered AS `created`,t.date_modified AS `modified`,t.contact_id FROM aop_case_updates t WHERE t.deleted=0 AND t.case_id='{$this->record_id}'");
                if($query && $query->num_rows>0){
                    $this->table_context[] = array("id","message","assigned_user_id","internal update");
                    while($item = $db->fetchByAssoc($query)){
                        $item["message"] = str_replace(array("<br/>","<br />","<br>"),array("\n","\n","\n"),strip_tags(htmlspecialchars_decode($item["message"]),"<br>"));
                        //Add table data
                        $this->table_context[]=$item;
                        //Specify object name
                        $item["__external__classname"] = "update";
                        $item = (Object)$item;
                        $this->context["case_updates"][]=$item;
                    }
                }
            break;
        }
        return $this;
    }
    /**
     * Convert Bean Data to JSON string
     * @return string Json 
     */
    public function to_json(){
        if(empty($this->context)) return NULL;
        if($this->force_download===true){
            header("Content-disposition: attachment; filename={$this->object_name}_{$this->record_id}.json");
            header("Content-type: application/json");
            exit($this->context);
        }
        return json_encode($this->context);
    }
    /**
     * Convert Bean Data to XML string
     * @return string XML 
     */
    public function to_xml(){
        if(empty($this->context)) return NULL;
        if(!function_exists("simplexml_load_string")){
            return array("result"=>false,"message"=>"Couldnt convert to XML. Convert function doenst exist");
        }
        $tag = mb_strtolower($this->object_name);
        
        $ctx = simplexml_load_string("<?xml version='1.0'?><{$tag}></{$tag}>");
        foreach($this->context as $name=>$property){
            $ctx = $this->xmlAsChild($ctx,$name,$property);
        }
        if($this->force_download===true){
            header("Content-disposition: attachment; filename={$this->object_name}_{$this->record_id}.xml");
            header("Content-type: text/xml");
            exit($ctx->asXML());
        }
        return $ctx->asXML();
    }
    /**
     * Convert Bean Data to CSV
     */
    public function to_csv(){
        if(empty($this->table_context)) return NULL;
        if(!function_exists("iconv")){
            return array("result"=>false,"message"=>"Couldnt convert to csv. Convert function doenst exist");
        }
        ob_clean();
        ob_start();
        $now = gmdate("D, d M Y H:i:s");
        header('Content-Type: text/xml, charset=UTF-8; encoding=UTF-8');
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");
        header("Content-Disposition: attachment;filename={$this->object_name}_{$this->record_id}.csv");
        header("Content-Transfer-Encoding: binary");
        //Convert data to read-e .csv format
        $col_delimiter = ';';
        $row_delimiter = "\r\n";
        $CSV_Output = '';
        foreach($this->table_context as $row){
            $cols = array();
            foreach($row as $col_val){
                if($col_val && preg_match('/[",;\r\n]/', $col_val)){
                    if( $row_delimiter === "\r\n" ){
                        $col_val = str_replace( "\r\n", '\n', $col_val );
                        $col_val = str_replace( "\r", '', $col_val );
                    }
                    elseif( $row_delimiter === "\n" ){
                        $col_val = str_replace( "\n", '\r', $col_val );
                        $col_val = str_replace( "\r\r", '\r', $col_val );
                    }
                    $col_val = str_replace( '"', '""', $col_val );
                    $col_val = '"'. $col_val .'"';
                }
                $cols[] = $col_val;
            }
            $CSV_Output .= implode($col_delimiter,$cols).$row_delimiter;
        }
        $CSV_Output = rtrim($CSV_Output,$row_delimiter);
        $CSV_Output = iconv("UTF-8","cp1251",$CSV_Output);
        //Print content
        echo($CSV_Output);
        exit(ob_get_clean());
        return ob_get_clean();
    }
    /**
     * Convert Bean Data to CSV
     */
    public function to_html(){
        if(empty($this->table_context) || empty($this->context)) return NULL;
        $title = "{$this->record_id} - {$this->module_name}";
        if($this->bean && !empty($this->bean->name)){
            $title = "{$this->bean->name} - {$this->module_name}";
        }
        $ctx = "<html><head><title>{$title}</title></head><body>";
        if(!empty($this->context)){
            foreach($this->context as $a=>$b){
                $ctx .= sprintf("<h1>Bean %s</h1>",ucfirst($a));
                $ctx .= $this->buildHtmlTable($a,$b);
            }
        }
        $ctx .= "</body></html>";
        if($this->force_download===true){
            header("Content-disposition: attachment; filename={$this->object_name}_{$this->record_id}.html");
            header("Content-type: text/html");
            exit($ctx);
        }
        return $ctx;
    }/**
     * Convert Bean Data to Document
     */
    public function to_docx(){
        if(empty($this->context)) return NULL;
        require_once "vendor/autoload.php";
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        //Define fonts
        $phpWord->addFontStyle(
            "userDefinedText",
            array('name' => 'Tahoma','size' => 12,'color'=>'black','bold' => false)
        );
        $phpWord->addFontStyle(
            "userDefinedTitle",
            array('name' => 'Tahoma','size' => 16,'color'=>'black','bold' => true)
        );
        //Create root 
        $section = $phpWord->addSection();
        //And push content
        $section = $this->buildDocumentContent("doc",$section,null,$this->context);
        //Export document
        if($this->force_download===true){
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename={$this->object_name}_{$this->record_id}.docx");
            header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
            header("Content-Transfer-Encoding: binary");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Expires: 0");
            $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            $xmlWriter->save("php://output");
            exit();
        }
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');
        $ctx="";
        return $ctx;
    }
    /**
     * Parse and Import data to xml node. Use in loop
     * @param SimpleXmlObject $node SimpleXML DOM node
     * @param string $name Node name
     * $param mixed $content Node content
     * @return SimpleXmlObject Return updated $node content
     */
    private function xmlAsChild($node,$name,$content){
        $name = strval($name);
        if(strpos($name,"__external__")!==false) return $node;
        switch(gettype($content)){
            case "array":
            case "object":
                $_name = empty(((array)$content)['__external__classname'])?(is_array($content)?$name:get_class($content)):((array)$content)['__external__classname'];
                $n = $node->addChild($_name);
                foreach($content as $a=>$b){
                    $n = $this->xmlAsChild($n,$a,$b);
                }
            break;
            case "string":
                $node->addChild($name,htmlspecialchars($content));
            break;
        }
        return $node;
    }
    /**
     * Parse and Import data to html table node. Use in loop
     * @param SimpleXmlObject $node SimpleXML DOM node
     * @param string $name Node name
     * $param mixed $content Node content
     * @return SimpleXmlObject Return updated $node content
     */
    private function buildHtmlTable($name=NULL,$content){
        $name = !empty($name)?strval($name):$name;
        $node = "";
        if(strpos($name,"__external__")!==false) return $node;
        switch(gettype($content)){
            case "array":
            case "object":
                $node .= "<table>";
                foreach($content as $a=>$b){
                    $node .= $this->buildHtmlTable($a,$b);
                }
                $node .= "</table>";
            break;
            case "string":
                $node .= "<tr><td><b>{$name}</b></td><td>{$content}</td></tr>";
            break;
        }
        /**
         * echo("<table>");
                foreach($b as $c=>$d){
                    if(is_array($d)) continue;
                    echo("<tr><td><b>{$c}</b></td><td>{$d}</td></tr>");
                }
                echo("</table>");
         */
        return $node;
    }
    private function buildDocumentContent($type="doc",$node=NULL,$node_name="",$body=""){
        $name = !empty($node_name)?strval($node_name):$node_name;
        $type = strtolower($type);
        if(strpos($name,"__external__")!==false) return $node;//skip system nodes
        switch(gettype($body)){
            case "array":
            case "object":
                $_name = empty(((array)$body)['__external__classname'])?(is_array($body)?$name:get_class($body)):((array)$body)['__external__classname'];
                foreach($body as $a=>$b){
                    //Add section title
                    if(empty($_name) && !empty($a)){
                        $node->addText(ucfirst(str_replace("_"," ",$a)),
                        array("color"=>"black","bold"=>true,"size"=>18));
                    }
                    $node = $this->buildDocumentContent($type,$node,$a,$b);
                }
            break;
            case "string":
                $table = $node->addTable();
                $table->addRow();
                $table->addCell()->addText($name,array("bold"=>true));
                $table->addCell()->addText(htmlspecialchars($body));
            break;
        }
        return $node;
    }
}
?>