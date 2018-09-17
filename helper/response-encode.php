<?php
    header('Content-type: application/json;');
    // header('Content-type: application/json; charset=ISO-8859-1');
    // header("Content-Type: text/html; charset=ISO-8859-1");
    
    function responseEncoder($isSuccess, $code, $message, $data){
        $response = array(
            "success" => $isSuccess,
            "code"=> $code,
            "message" => $message,
            "data" => $data
        );

        if (json_encode($response) === false){
            throw new Exception(json_last_error());
        } else {
            return json_encode($response);
        }
    }
?>