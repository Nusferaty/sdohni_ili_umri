<?php
require_once 'connect.php';
$sql = "SELECT * FROM account";
$check_account = $connect->query($sql);

while($temp = $check_account->fetch(PDO::FETCH_ASSOC)){
    $accounts[] = $temp;
}
?>