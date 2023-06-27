<?php
require '../model/db.model.php';
date_default_timezone_set('Asia/Manila');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $action = $_REQUEST['action'];
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $birthdate = $_REQUEST['birthdate'];
    $gender = $_REQUEST['gender'];
    $region = $_REQUEST['region'];


    $today = date("Y-m-d");
    $diffInSeconds = strtotime($today) - strtotime($birthdate);
    $age = number_format($diffInSeconds / (365 * 24 * 60 * 60),2);

    if($action == "save"){
        $qry = "insert into volunteer_list(`firstname`,`lastname`,`age`,`birthdate`,`sex_id`,`region_code`)";
        $qry .= "values('".$firstname."','".$lastname."','".$age."','".$birthdate."','".$gender."','".$region."')";
    
        $result = $DB->insert($qry);
        if($result == 1){
            echo json_encode(["message"=>"success"]);
        }else{
            echo json_encode(["message"=>"notsaved"]);
        }
    }elseif($action == "update"){
        $volunteerid = $_REQUEST['volunteerid'];
        $qry = "update volunteer_list set firstname = '$firstname',lastname = '$lastname',age = $age,birthdate = '$birthdate',sex_id = '$gender',region_code = '$region' where volunteerid = '$volunteerid'";

        $result = $DB->update($qry);
        if($result == 1){
            echo json_encode(["message"=>"updated"]);
        }else{
            echo json_encode(["message"=>"notupdated"]);
        }
    }elseif($action == "delete"){
        $volunteerid = $_REQUEST['volunteerid'];
        $qry = "delete from volunteer_list where volunteerid = $volunteerid";
        $result = $DB->delete($qry);
        if($result == 1){
            echo json_encode(["message"=>"deleted"]);
        }else{
            echo json_encode(["message"=>"notdeleted"]);
        }
    }
}