<?php
    header('Content-type: application/json');
    
    function responseEncoder($isSuccess, $code, $message, $data)
    {
        $response = array(
            "success" => $isSuccess,
            "code"=> $code,
            "message" => $message,
            "data" => $data
        );

        return json_encode($response);
    }
?>