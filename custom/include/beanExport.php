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
     * @return BeanExport
     */
    function __construct($module,$record){
        return $this->retrieve($module,$record);
    }

    /**
     * @param string $module Module name (e.g Accounts,Cases,CaseHistory)
     * @param string $record Record id
     * @return BeanExport
     */
    public function retrieve($module,$record){
        global $sugar_config,$app_list_strings;
        /**Requested Module name e.g Accounts,Cases*/
        $this->module_name = $module;
        /**Single object name e.g Account,Document (simillar with classname) */
        $this->object_name = BeanFactory::getObjectName($this->module_name);
        /**Requested record id */
        $this->record_id = $record;
        /**JSON context for future convert */
        $this->context = array();
        /**JSON table data for future export */
        $this->table_context = array();
        /**Single bean object */
        $this->bean = BeanFactory::getBean($this->module_name,$this->record_id);

        //Construct a filename
        $this->filename = !empty($this->bean->name)?$this->bean->name:"{$this->bean->object_name}_{$this->bean->record_id}";
        if(!$this->bean){
            $this->content["message"] = "Couldnt retrieve \"{$this->module_name}\" record {$this->record_id}";
            return $this;
        }
        //Get context
        $this->context["properties"] = array(
            "id"=>$this->record_id,
            "module"=>!empty($app_list_strings["moduleList"][$this->module_name])?$app_list_strings["moduleList"][$this->module_name]:$this->module_name,
            "url"=>"{$sugar_config['site_url']}/index.php?module={$this->module_name}&action=DetailView&record={$this->record_id}"
        );
        switch($this->module_name){
            case "Cases":
                $this->context["properties"]["Case_number"]=$this->bean->case_number;
                $this->context["properties"]["Subject"]=$this->bean->name;
                $this->context["properties"]["Description"]=$this->bean->description;
                $this->context["properties"]["Created"]=$this->bean->date_entered;
                $this->context["properties"]["Modified"]=$this->bean->date_modified;
                $this->context["properties"]["Account_id"]=$this->bean->account_id;
                
                $this->context["properties"]["Priority"]= $this->val($this->bean->priority);
                
                $this->context["properties"]["State"]= $this->val($this->bean->state);
                $this->context["properties"]["Status"]= $this->val($this->bean->status);
                $this->context["properties"]["Type"]= $this->val($this->bean->type);
                
                $this->context["properties"]["Assigned To"]=$this->val("assigned_user_name");
                $this->context["properties"]["Hardware"]=$this->val("ass_hardware_cases_name");
                $this->context["properties"]["Resolution"]=$this->val("resolution");
                $this->context["properties"]["IP eth0"]=$this->val("ip_eth0");
                $this->context["properties"]["Installation Site Name"]=$this->val("instal_name");
                
                //Get Case Updates records
                $this->context["case_updates"] = array();
                global $db,$app_list_strings;
                $query = $db->query("SELECT t.id,t.description AS `message`,CONCAT_WS(' ',au.first_name,au.last_name) AS `assigned_user`,t.internal,t.date_entered AS `created`,t.date_modified AS `modified`,CONCAT_WS(' ',c.first_name,c.last_name) AS `contact`,CONCAT_WS(' ',u.first_name,u.last_name) AS `author`
                FROM aop_case_updates t
                LEFT JOIN contacts c ON c.id=t.contact_id 
                LEFT JOIN users u ON u.id=t.created_by 
                LEFT JOIN users au ON au.id=t.assigned_user_id 
                WHERE t.deleted=0 AND t.case_id='{$this->record_id}'");
                
                if($query && $query->num_rows>0){
                    $this->table_context[] = array("id","message","assigned_user","internal update");
                    while($item = $db->fetchByAssoc($query)){
                        $item["message"] = str_replace(array("<br/>","<br />","<br>"),array("\n","\n","\n"),strip_tags(htmlspecialchars_decode($item["message"]),"<br>"));
                        //Add table data
                        $this->table_context[]=$item;
                        $this->table_context[]="divider";
                        //Specify object name
                        $item["__external__classname"] = "update";
                        $item = (Object)$item;
                        $this->context["case_updates"][]=$item;
                        $this->context["case_updates"][]="divider";
                    }
                }
                
            break;
            case "ass_hardware":
                $this->context["properties"]["module"] = "Hardware";
                $this->context["properties"]["Serial #"]=$this->val("name",$this->bean->name);
                $this->context["properties"]["Installation Site Name"]=$this->val("instal_name",$this->bean->instal_name);
                $this->context["properties"]["Status"]=$this->val("status",$this->bean->status);
                $this->context["properties"]["Account"]=$this->val("ass_hardware_accountsaccounts_ida",$this->bean->ass_hardware_accountsaccounts_ida);
                //Info about hardware
                $this->context["properties"]["Rapid"]=$this->val("rapid");
                $this->context["properties"]["Hardware Type"]=!empty($this->bean->hd_type)?$this->val("hd_type",$this->bean->hd_type):"undefined";
                $this->context["properties"]["Product Version"]=$this->val("dcmsys_ver",$this->bean->dcmsys_ver);
                $this->context["properties"]["OS Version"]=$this->val("os",$this->bean->os);
                $this->context["properties"]["description"]=$this->val("description",$this->bean->description);
                //Sens info
                $this->context["SensInfo"]=array(
                    "Password for Web"=>$this->val("pass_w"),
                    "Password for root"=>$this->val("pass_r"),
                    "Customer Shell Account"=>$this->val("ssh_user"),
                    "Customer Shell Password"=>$this->val("ssh_pass"),

                    "IP eth0"=>$this->val("ip_eth0"),
                    "IP eth1"=>$this->val("ip_eth1"),
                    "IP IPMI"=>$this->val("ip_ipmi"),
                    "IPMI Login and Pass"=>$this->val("ipmi_pass"),

                    "Hostname"=>$this->val("hostname"),
                    "Hardware id"=>$this->val("hard_id"),
                );
                
                //Cluster config
                $this->context["ClusterConfig"]=array(
                    "Cluster"=>$this->val("cluster"),
                    "Hardware"=>$this->val("ass_hardware_ass_hardware_name"),
                    "Heartbeat IP"=>$this->val("ip_oth"),
                    "Virtual IP"=>$this->val("vip"),
                );
            break;
        }
        $this->filename = str_replace(array(" ","-"),array("_","_"),trim($this->filename));
        return $this;
    }
    /**
     * Convert Bean Data to JSON string
     * @return string Json 
     */
    public function to_json(){
        if(empty($this->context)) return NULL;
        if($this->force_download===true){
            header("Content-disposition: attachment; filename={$this->filename}.json");
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
            header("Content-disposition: attachment; filename={$this->filename}.xml");
            header("Content-type: text/xml");
            exit($ctx->asXML());
        }
        return $ctx->asXML();
    }
    /**
     * Convert Bean Data to CSV
     * @return CSV table data
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
        header("Content-Disposition: attachment;filename={$this->filename}.csv");
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
     * Convert Bean Data to html content
     * @return HTML Content
     */
    public function to_html(){
        if(empty($this->context)) return NULL;
        $title = "{$this->filename} - {$this->module_name}";
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
            header("Content-disposition: attachment; filename={$this->filename}.html");
            header("Content-type: text/html");
            exit($ctx);
        }
        return $ctx;
    }
    /**
     * Convert Bean Data to Document
     * @return .docx data
     */
    public function to_docx(){
        if(empty($this->context)) return NULL;
        require_once "vendor/autoload.php";

        // Creating the new document...
        PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
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

        //Create root and add content
        $root = $phpWord->addSection();

        $ctx = "";
        if(!empty($this->context)){
            foreach($this->context as $a=>$b){
                $ctx .= sprintf("<h1 style=\"font-size:18px\">Bean %s</h1>",ucfirst($a));
                $ctx .= $this->buildHtmlTable($a,$b);
            }
        }
        \PhpOffice\PhpWord\Shared\Html::addHtml($root,$ctx,false,false);

        //Export document
        if($this->force_download===true){
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename={$this->filename}.docx");
            header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
            header("Content-Transfer-Encoding: binary");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Expires: 0");
            $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            $xmlWriter->save("php://output");
            exit();
        }

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save("{$this->filename}.docx");
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
                switch($content){
                    case "divider":
                    break;
                    default:
                        $name = str_replace(array(" ","#","\n","<br/>"),array("","","",""),htmlspecialchars($name));
                        $node->addChild(trim($name),htmlspecialchars($content));
                    break;
                }
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
                    if(is_array($b) || is_object($b)) $node .= "<tr><td>";
                    $node .= $this->buildHtmlTable($a,$b);
                    if(is_array($b) || is_object($b)) $node .= "</td></tr>";
                }

                $node .= "</table>";
            break;
            case "string":
                switch($content){
                    case "divider":
                        $node .= "<tr class=\"divider\"><td><hr/></td><td><hr/></td></tr>";
                    break;
                    default:
                        $node .= "<tr><td><b>{$name}</b></td><td>{$content}</td></tr>";
                    break;
                }
            break;
        }
        return $node;
    }

    /**
     * Converts bean value to read format
     * @param $field_name Field name
     * @param $value Field value
     * @return mixed Converted Value
     */
    private function val($field_name,$value=NULL){
        global $app_list_strings,$db;
        $value = empty($value)?(isset($this->bean->{$field_name})?$this->bean->{$field_name}:""):$value;
        if(!empty($this->bean) && !empty($this->bean->field_name_map) && !empty($this->bean->field_name_map[$field_name])){
            switch($this->bean->field_name_map[$field_name]["type"]){
                case "enum":
                    $options = !empty($app_list_strings[$this->bean->field_name_map[$field_name]["options"]])?$app_list_strings[$this->bean->field_name_map[$field_name]["options"]]:null;
                    if(!empty($options) && !empty($options[$value])){
                        $value = $options[$value];
                    }
                break;
                case "boolean":
                case "bool":
                    $value = $value==true?"Yes":"No";
                break;
                case "link":
                    //Get link field
                    $link = array(
                        "relate"=>null
                    );
                    foreach($this->bean->field_name_map as $fmname=>$fmoptions){
                        if(!empty($fmoptions) && !empty($fmoptions["id_name"]) && $fmoptions["type"]=="relate" && $fmoptions["id_name"]==$field_name){
                            if(!empty($fmoptions["table"]) && in_array($fmoptions["table"],array("accounts","users"))){
                                $link["relate"] = $fmname;
                                break;
                            }
                        }
                    }
                    if(!empty($link["relate"])){
                        $value = $this->bean->{$link["relate"]};
                    }else{
                        $value = trim($value);
                    }
                break;
                default:
                    $value = trim($value);
                break;
            }
        }
        if(is_array(($value))){
            return "";
        }
        return $value;
    }
}
?>