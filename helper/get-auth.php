<?php
    require_once "forbidden-rules.php";

    if (isset($_SERVER["HTTP_AUTHORIZATION"])){
        try{
            $decode = decodeJWT($_SERVER["HTTP_AUTHORIZATION"]);

            checkToken($db, $decode->data);
        } catch (Exception $e){
            die(responseEncoder(true, 400, "Invalid Token", null));
            // die(responseEncoder(true, 400, $e->getMessage(), null));
        }
    } else {
        die(responseEncoder(false, 400, "No Authorization", null));
    }

    function checkToken($con, $data){
        $query = "select * from user where id='$data->id' limit 1";
        if ($result = executeQuery($con, $query)){
            if (!$result->num_rows){
                die(responseEncoder(false, 400, "Invalid Token", null));
            }
        }
    }
?>