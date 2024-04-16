<?php

require '04-16_connect-config.php';
# include './../config/connect-config.php';

$dsn = "mysql:host={$db_host};dbname={$db_name};charest:utf8mb4";

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);