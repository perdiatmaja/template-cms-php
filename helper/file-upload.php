<?php
    require_once "forbidden-rules.php";
    
    function onUploadFile($object_name, $valid_extensions, $path){
        $response = (object)[];
        // $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
        
        if(isset($_FILES['file'])) {
            $img_name = $_FILES['file']['name'];
            $tmp_name = $_FILES['file']['tmp_name'];
            
            $ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
            
            $final_image_name = rand(1000,1000000).$img_name;
            
            if(in_array($ext, $valid_extensions)) { 
                $employee_id = isset($params->id) ? $params->id : $final_image_name;
                $path = $path.strtolower($final_image_name);
                $upload_result = move_uploaded_file($tmp_name,$path);
                if ($upload_result) {
                    $response = (object) [
                        "success" => true,
                        "message" => "Success",
                        "code" => 200,
                        "name" => $final_image_name
                    ];
                }
            }
            
            else {
                $response = (object) [
                    "success" => true,
                    "message" => "Not a valid image",
                    "code" => 200,
                    "name" => $final_image_name
                ];
            }
        } else {
            $response = (object) [
                "success" => true,
                "message" => "No image uploaded",
                "code" => 200,
                "name" => $final_image_name
            ];
        }

        return $response;
    }
?>