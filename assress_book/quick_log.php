<?php

session_start();

$_SESSION['admin'] = [
  'id' => 3,
  'email' => 'ming@gg.com',
  'nickname' => '老明',
];

header('Location: pdo-list.php');