<?php
/**
 * 
 */
class BeanExport{
    /**Supported export extensions*/
    const extension_supported = array("xml","json");
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
        $this->module_name = $module;
        $this->record_id = $record;
        $this->context = array();
        //Get context
        $this->context["properties"] = array(
            "id"=>$this->record_id,
            "module"=>$this->module_name,
            "url"=>"index.php?module={$this->module_name}&action=DetailView&record={$this->record_id}"
        );
        switch($this->module_name){
            case "Cases":
                //Get Case Updates records
                $this->context["case_updates"] = array();
                global $db;
                $query = $db->query("SELECT t.id,t.description AS `message`,t.assigned_user_id,t.internal FROM aop_case_updates t WHERE t.deleted=0 AND t.case_id='{$this->record_id}'");
                if($query && $query->num_rows>0){
                    while($item = $db->fetchByAssoc($query)){
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
        $ctx = simplexml_load_string("<?xml version='1.0'?><bean></bean>");
        foreach($this->context as $name=>$property){
            $group = $ctx->addChild($name);
            $ctx = $this->xmlAsChild($ctx,$name,$property);
        }
        $ctx->formatOutput=true;
        header('Content-Type: application/xml; charset=utf-8');
        exit($ctx->saveXML());
        return $ctx->asXML();
    }
    /**
     * @param mixed $input 
     */
    private function xmlAsChild($node,$name,$content){
        switch(gettype($content)){
            case "array":
                $n = $node->addChild($name);
                foreach($content as $a=>$b){
                    $n = $this->xmlAsChild($n,$a,$b);
                }
            break;
            case "string":
                var_dump($content);
            break;
        }
        return $node;
    }
}
?>