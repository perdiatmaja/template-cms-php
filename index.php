<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-type, Authorization");
    header('Content-type: application/json;');

    require "helper/response-encode.php";
    
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
        require "helper/endec.php";

        if (strpos($requests_uri, "upload")) {
            require "file-upload.php";
        }

        if ((strpos($requests_uri, "auth") === false)
        && (strpos($requests_uri, "register") === false)){
            // require "helper/get-auth.php";
        }
        
        require $filename;
    } else{
        die(responseEncoder(false, 404, "No resources found", array()));
    }
?>