<?php
    require_once "forbidden-rules.php";

    function get_params($params, $key){
        try {
            if (!isset($params->$key)) {
                throw new Exception("Invalid data");
            }
            return $params->$key;
        } catch(Exception $e) {
            die(responseEncoder(false, 400, $e->getMessage(), (object)[]));
        }
    }
?>