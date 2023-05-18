<?php
define("base_url", "https://friendlygass.com");

class Url{
    public $BASE_URL = "https://friendlygass.com";//BASE_URL

    public static function post($param){
        if(isset($_POST[$param])){
            $value = $_POST[$param];
        }else{
            $value = null;
        }
        return $value;
    }

    public static function get($param){
        if(isset($_GET[$param])){
            $value = $_GET[$param];
        }else{
            $value = null;
        }
        return $value;
    }

    public static  function file($param){
        if(isset($_FILES[$param])){
            $value = $_FILES[$param];
        }else{
            $value = null;
        }
        return $value;
    }
}
?>
