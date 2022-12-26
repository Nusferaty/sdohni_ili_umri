<?php

    $dsn = "pgsql:host=172.26.0.3;port=5432;dbname=chtyki;user=margo;password=admin";

    $connect = new PDO($dsn);

    if (!$connect) {
        die('Error connect to DataBase');
    }
?>