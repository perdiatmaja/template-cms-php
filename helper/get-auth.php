<?php
    require_once "forbidden-rules.php";

    if (isset($_SERVER["HTTP_AUTHORIZATION"])){
        try{
            $auth_token = $_SERVER["HTTP_AUTHORIZATION"];
            if (strlen($auth_token)%3 !== 0){
                die(responseEncoder(true, 400, "Invalid Token", null));
            }
            $auth_token = decrypt(removeKey($auth_token, "atmaja02294"));
            $decode = decodeJWT($auth_token);

            checkToken($db, $decode);
        } catch (Exception $e){
            // die(responseEncoder(true, 400, "Invalid Token", null));
            die(responseEncoder(true, 400, $e->getMessage(), null));
        }
    } else {
        die(responseEncoder(false, 400, "No Authorization", null));
    }

    function checkToken($con, $decode){
        $data = $decode->data;
        $currentDate = new DateTime();

        if ($decode->nbf < $currentDate->getTimestamp()){
            die(responseEncoder(false, 406, "Token Expired", null));
        }

        // $query = "select * from user where id='$data->id' limit 1";
        // if ($result = executeQuery($con, $query)){
        //     if (!$result->num_rows){
        //         die(responseEncoder(false, 400, "Invalid Token", null));
        //     }
        // }
    }
?>