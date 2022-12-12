<?php

require_once 'connect.php';
$sql = "SELECT * FROM course";
$check_course = $connect->query($sql);

while($temp = $check_course->fetch(PDO::FETCH_ASSOC)){
    $courses[] = $temp;
}

