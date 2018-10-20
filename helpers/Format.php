<?php 
    class Format
    {
        public function formatDate($date){
            return date('F -j-Y, g:i a', strtotime($date));
        }    
        public function textShort($text , $limit = 400)
    {
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text," "));
        $text = $text."..";
        return $text;
    }
    public function validation($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function ucase($tex){ 
        $tex  = ucwords($tex); 
        return $tex; 
    }
    public function title(){
        $title = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($title , '.php');
        if ($title == 'index') {
            $title = "home";
        }elseif($title == 'contact'){
            $title = "contact";
        } 
        return ucwords($title);
    }
}   
    
?>