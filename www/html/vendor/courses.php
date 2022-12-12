<?php

require_once 'connect.php';
$sql = "SELECT * FROM course";
$check_courses = $connect->query($sql);

while($temp = $check_courses->fetch(PDO::FETCH_ASSOC)){
    $courses[] = $temp;
}