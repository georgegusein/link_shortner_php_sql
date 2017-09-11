<?php
class Shortener {
    protected $db;

    public function __construct(){
        $this->db = new mysqli('localhost','root','','apidb');
    }

    protected function generateCode($num){
        return base_convert($num,10,36);
    }

    public function getUrl($code){
        $code = $this->db->escape_string($code);
        $code = $this->db->query("SELECT url FROM shortenedurls WHERE code = '{$code}'");
        if($code->num_rows){
            return $code->fetch_object()->url;
        }
        return '';

    }
    public function makeCode($url){
        $url = trim($url);
        if(!filter_var($url, FILTER_VALIDATE_URL)){
            return '';
        }
        $url = $this->db->escape_string($url);
        //check if exist
        $exists = $this->db->query("SELECT code FROM shortenedurls WHERE url='{$url}'");
        if($exists->num_rows){
            return $exists->fetch_object()->code;
        }else{
             //insert record without code
             $insert = $this->db->query("INSERT INTO shortenedurls (url, created) VALUES ('{$url}', NOW())");
             //generate code
             $code = $this->generateCode($this->db->insert_id);
             //updata the record with generated code
             $this->db->query("UPDATE shortenedurls SET code ='{$code}' WHERE url ='{$url}'");
             return $code;
        }
            
        }

}
?>