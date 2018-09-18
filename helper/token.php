<?php
    require_once "forbidden-rules.php";
    require "firebase-jwt/JWT.php";
    
    use \Firebase\JWT\JWT;

    function encodeJWT($payload){
        $iat = new DateTime();
        $nbf = new DateTime();
        
        $nbf->add(new DateInterval('P3D'));

        $key = hash256("atmaja02294");
        $token = array(
            "data" => $payload,
            "iat" => $iat->getTimestamp(),
            "nbf" => $nbf->getTimestamp()
        );

        $jwt = JWT::encode($token, $key);

        return $jwt;
    }

    function decodeJWT($jwt){
        $key = hash256("atmaja02294");

        JWT::$leeway = 600000;
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