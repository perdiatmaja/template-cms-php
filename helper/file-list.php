<?php
require_once "forbidden-rules.php";
$dir = "uploads/";

// Sort in ascending order - this is default
$a = scandir($dir);

// Sort in descending order
$b = scandir($dir,1);

header('Content-type: application/json');
echo json_encode($a);

?>