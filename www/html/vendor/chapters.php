<?php

/*session_start();*/

require_once 'connect.php';
$sql = "SELECT * FROM chapters";
$check_chapters = $connect->query($sql);

while($temp = $check_chapters->fetch(PDO::FETCH_ASSOC)){
    $chapter[] = $temp;
}