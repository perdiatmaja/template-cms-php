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

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
$path = $main_path.'/assets/img/';

if(isset($_FILES['file'])) {
    $img = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    
    $final_image = rand(1000,1000000).$img;
    
    if(in_array($ext, $valid_extensions)) { 
        $employee_id = isset($params->id) ? $params->id : $final_image;
        $path = $path.strtolower($final_image);
        $upload_result = move_uploaded_file($tmp,$path);

        if($upload_result) {
            $query = "insert into img VALUES (uuid(), '"
            .$host
            ."/template/assets/img/"
            .$final_image."', '"
            .$employee_id."', '"
            .(new \DateTime())->format('Y-m-d H:i:s')."')";
            $result = executeQuery($db, $query);
            
            if ($result){
                echo responseEncoder(true, 200, "Image Uploaded", array());
            } else{
                echo responseEncoder(false, 400, $result, array());
            }
        }
    } 
    
    else {
        echo responseEncoder(false, 406, "Not a valid image", array());
    }
} else {
    echo responseEncoder(false, 400, "No image uploaded", array());
}

$db->close();
?>