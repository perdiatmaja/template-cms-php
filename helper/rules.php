<?php
    require_once "forbidden-rules.php";

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $response = array(
            "success" => false,
            "code"=> 410,
            "message" => "Method not allowed",
            "data" => array()
        );
        die(json_encode($response));
    }
?>