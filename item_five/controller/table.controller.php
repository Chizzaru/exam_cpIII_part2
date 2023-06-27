<?php

require '../model/db.model.php';

$sql = "select a.volunteerid as id, a.firstname, a.lastname, a.age, a.birthdate, b.sex_id as sex_id,b.name as gender, c.region_code as region_code, c.region_name as region from volunteer_list as a inner join lib_sex as b on a.sex_id = b.sex_id inner join lib_regions as c on a.region_code = c.region_code order by a.lastname ASC";
$results = $DB->select($sql);
//print_r($results);
echo json_encode($results);