<?php
    require_once "forbidden-rules.php";
    require "firebase-jwt/JWT.php";
    
    use \Firebase\JWT\JWT;

    function encodeJWT($payload){
        $key = hash256("atmaja02294");
        $token = array(
            "data" => $payload,
            "iss" => "http://example.org",
            "iat" => 1356999524,
            "nbf" => 1357000000
        );

        $jwt = JWT::encode($token, $key);

        return $jwt;
    }

    function decodeJWT($jwt){
        $key = hash256("atmaja02294");

        $decoded = JWT::decode($jwt, $key, array('HS256'));

        return $decoded;

        // $decoded_array = (array) $decoded;

        // JWT::$leeway = 60;
        // $decoded = JWT::decode($jwt, $key, array('HS256'));

        // print_r($decoded);
    }

    function hash256($str){
        return hash("sha256", $str);
    }
?>