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

$db->close();
?>