<?php
    require_once "forbidden-rules.php";

    $allowed_origin = array("169.99.69.199");
    $is_origin_allowed = true;

    $user_agent= "";
    $http_origin = "";

    if ($_SERVER['USER'] !== 'perdiaatmaja') {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        if (isset($_SERVER['HTTP_ORIGIN'])){
            $http_origin = rtrim($_SERVER['HTTP_ORIGIN'], '/');
            if (in_array($http_origin, $allowed_origin) === false) {
                $is_origin_allowed = false;
                echo false;
            }
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' ||
    strpos($user_agent, 'PostmanRuntime') !== false
    || $is_origin_allowed === false) {
        $response = array(
            "success" => false,
            "code"=> 410,
            "message" => "Method not allowed",
            "data" => array()
        );
        die(json_encode($response));
    }
?>