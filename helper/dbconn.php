<?php
    require_once "forbidden-rules.php";

    $driver = new mysqli_driver();
    $driver->report_mode = MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR;

    $db;
    $server = '167.99.69.199';
    $database = 'cms_school';
    $username = 'perdiatmaja';
    $password = 'atmaja02294';

    try {
        $db = new mysqli($server, $username, $password, $database);
        if (!$db) {
            throw new Exception($this->mysqli->error);
        }
    } catch(mysqli_sql_exception $e) {
        die(responseEncoder(false, 400, $e->getMessage(), array()));
    }

    function executeQuery($con, $query){
        return $con->query($query);
    }

    function executeMultiQuery($con, $query){
        return $con->multi_query($query);
    }

    function fetchDataList($result){
        $data = array();
        if (!$result->num_rows){
            throw new Exception($this->mysqli->error);
        } else if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
        }

        return $data;
    }

    function fetchDataObject($result){
        $data = (object)[];
        if (!$result->num_rows){
            throw new Exception($this->mysqli->error);
        } else if ($result->num_rows > 0) {
            $data = (object) $result->fetch_assoc();
        }

        return $data;
    }

?>