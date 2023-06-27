<?php
require '../model/db.model.php';
$req_type = $_GET['req_type'];
if($req_type == 'regions'){
    $sql = "select `region_code`,`region_name` from lib_regions";
    $results = $DB->select($sql);
    //print_r($results);
    echo json_encode($results);
}elseif($req_type == 'gender'){
    $sql = "select `sex_id`,`name` from lib_sex";
    $results = $DB->select($sql);
    echo json_encode($results);
}