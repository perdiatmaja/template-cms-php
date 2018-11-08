<?php
$direct_uri = $_SERVER['REQUEST_URI'];
$scriptname = basename(__FILE__);

if (strpos($direct_uri, $scriptname)) {
    header('Content-type: application/json');
    $response = array(
        "success" => false,
        "code" => 404,
        "message" => "No resources found",
        "data" => array(),
    );
    die(json_encode($response));
}

try {
    $query = "insert into veshelp.workshop values(uuid(), '"
    . get_params($params, "name") . "', '', '"
    . get_params($params, "lat") . "','"
    . get_params($params, "lon") . "','0','"
    . (new \DateTime())->format('Y-m-d H:i:s') . "');";

    if (executeQuery($db, $query)) {
        echo responseEncoder(true, 200, "success", (object) []);
    } else {
        throw new Exception($this->mysqli->error);
    }
} catch (Exception $e) {
    die(responseEncoder(false, 400, $e->getMessage(), (object) []));
} catch (mysqli_sql_exception $e) {
    die(responseEncoder(false, 400, $e->getMessage(), (object) []));
}

$db->close();
