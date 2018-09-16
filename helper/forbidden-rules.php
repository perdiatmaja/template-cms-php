<?php
    $requests_uri = $_SERVER['REQUEST_URI'];
    $arr_uri = explode('/', $requests_uri);
    $name = end($arr_uri);

    if (strpos($name, ".php")){
        $name = str_replace(".php", "", $name);
    }

    $forbidden_files = 
    array("response-encode", "rules", "file-list", "get-url",
    "forbidden-rules", "dbconn", "params-parser",
    "file-access-rules", "get-auth", "endec", "token");
    
    if (in_array($name, $forbidden_files)){
        header('Content-type: application/json');
        $response = array(
            "success" => false,
            "code"=> 404,
            "message" => "No resources found",
            // "message" => $filename,
            "data" => array()
        );
        die(json_encode($response));
    }
?>