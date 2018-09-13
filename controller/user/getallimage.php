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

    $query = "select source, id from img order by created_dt desc limit ".get_params($params, "limit");
    $result = executeQuery($db, $query);

    if ($result)
    {
        if ($result->num_rows > 0){
            $data = array();

            while($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
            echo responseEncoder(true, 200, "Success", $data);
        } else {
            echo responseEncoder(false, 404, "No Data", array());
        }
    }

    $db->close();
?>