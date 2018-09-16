<?php
    require "helper/response-encode.php";
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Authorization, Accept");
    
    $host = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER['HTTP_HOST'];
    $main_path = dirname(__FILE__); 
    $main_folder = "/cms";
    // $main_folder = "";
    $requests_uri = $_SERVER['REQUEST_URI'];
    $filename = "controller/".ltrim($requests_uri, $main_folder."/").".php";
    if (file_exists($filename)){
        require "helper/dbconn.php";
        require "helper/rules.php";
        require "helper/get-url.php";
        require "helper/params-parser.php";
        require "helper/get-params.php";
        require "helper/token.php";

        if ((strpos($requests_uri, "auth") === false)
        && (strpos($requests_uri, "register") === false)){
            require "helper/get-auth.php";
        }
        
        require $filename;
    } else{
        die(responseEncoder(false, 404, "No resources found", array()));
    }
?>