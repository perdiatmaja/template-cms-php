<?php
    require_once "forbidden-rules.php";
    
    $params = (object)[];

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

    if(strpos($contentType, 'json')!=0){
        $raw = trim(file_get_contents("php://input"));
        $decoded = json_decode($raw, true);
        if ($decoded != "" && sizeof($decoded)>0){
            foreach ($decoded as $key => $value) {
                $params->$key = mysqli_real_escape_string($db, $value);
            }
        }
    } else if(strpos($contentType, "x-www-form-urlencoded") != 0 || strpos($contentType, "form-data")!=0){
        if ($_POST != "" && sizeof($_POST)>0){
            foreach ($_POST as $key => $value) {
                $params->$key = mysqli_real_escape_string($db, $value);
            }
        }
    }
?>