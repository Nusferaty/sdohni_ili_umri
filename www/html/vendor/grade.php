<?php

require_once 'connect.php';
$sql = "SELECT * FROM grade";
$check_grade = $connect->query($sql);

while($temp = $check_grade->fetch(PDO::FETCH_ASSOC)){
    $grades[] = $temp;
}

