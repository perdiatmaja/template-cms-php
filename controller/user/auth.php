<?php
    error_reporting(E_ALL);
    $direct_uri = $_SERVER['REQUEST_URI'];
    $scriptname = basename(__FILE__);

    if (strpos($direct_uri, $scriptname)){
        header('Content-type: application/json');
        $response = array(
            "success" => false,
            "code"=> 404,
            "message" => "No resources found",
            "data" => array()
        );
        die(json_encode($response));
    }

    try{
        $query = "select * from user where email='"
        .get_params($params, "email")."' limit 1";
        
        if ($result = executeQuery($db, $query)){
            if ($result->num_rows > 0){
                $dbo = fetchDataObject($result);
                if ($dbo->password == hash("sha256", get_params($params, "password"))){
                    $user = (object)[];

                    $user->id = $dbo->id;
                    $user->email = $dbo->email;
                    $user->name = $dbo->name;
                    $user->role = $dbo->role;
                    $user->secure_token = encodeJWT($user);
                    
                    echo responseEncoder(true, 200, "Success", $user);
                    insertRecord($db, 0, $user->id);
                } else{
                    echo responseEncoder(false, 401, "Password incorrect",(object)[]);
                }
            } else{
                echo responseEncoder(false, 404, "User not found",(object)[]);
            }
        } else {
            throw new Exception($this->mysqli->error);
        }
    } catch(mysqli_sql_exception $e) {
        die(responseEncoder(false, 400, $e->getMessage(), (object)[]));
    }

    $db->close();
?>