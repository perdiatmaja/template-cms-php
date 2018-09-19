<?php
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