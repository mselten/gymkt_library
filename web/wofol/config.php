<?php

$dsn = "mysql:host=127.0.0.1;dbname=knihovna;charset=utf8";
$name = "root";
$password = "mlavek79";

$pdo = new PDO($dsn, $name, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);






