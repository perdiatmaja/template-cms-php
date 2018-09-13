<?php
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
        $query = "select * from farewell.employee where employee_no='"
        .get_params($params, "employee_no")."' limit 1";
        
        if ($result = executeQuery($db, $query)){
            if ($result->num_rows > 0){
                $query = "select * from farewell.employee order by created_dt desc limit 1";
                if ($result = executeQuery($db, $query)){
                    die(responseEncoder(true, 200, "data exist", fetchDataObject($result)));
                } else {
                    throw new Exception($this->mysqli->error);
                }
            } else{
                $query = "insert into farewell.employee values(uuid(), '"
                .get_params($params, "employee_no")."', '"
                .get_params($params, "name")."', '"
                .get_params($params, "division")."','"
                .(new \DateTime())->format('Y-m-d H:i:s')."');";
    
                $query .= "select * from farewell.employee order by created_dt desc limit 1";
    
                $result;
                if (executeMultiQuery($db, $query)){
                    $db->next_result();
                    if ($result = $db->store_result()) {
                        die(responseEncoder(true, 200, "success", fetchDataObject($result)));
                    }
                } else {
                    throw new Exception($this->mysqli->error);
                }
            }
        } else {
            throw new Exception($this->mysqli->error);
        }
    } catch(mysqli_sql_exception $e) {
        die(responseEncoder(false, 400, $e->getMessage(), array()));
    }

    $db->close();
?>