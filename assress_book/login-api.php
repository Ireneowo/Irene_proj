<?php

require __DIR__ . '/../config/04-16_pdo-content.php';
header('Content-Type: application/json');

$output = [
  'success' => false, # 有沒有登入成功
  'bodyData' => $_POST,
  'code' => 0, # 除錯追蹤的
];

if (empty($_POST['email']) or empty($_POST['password'])) {
  $output['code'] = 400;
  echo json_encode($output);
  exit;  # 結束php程式
}


# 1. 判斷帳號是否正確

$sql = "SELECT * FROM members WHERE email=?";
$stmt = $pdo->prepare($sql);

$stmt->execute([$_POST['email']]);

$row = $stmt->fetch();
if (empty($row)) {
  # 帳號是錯的
  $output['code'] = 420;
  echo json_encode($output);
  exit;
}

if (password_verify($_POST['password'], $row['password'])) {
  $output['success'] = true;
  $_SESSION['admin'] = [
    'id' => $row['id'],
    'email' => $row['email'],
    'nickname' => $row['nickname'],
  ];
} else {
  #密碼是錯的
  $output['code'] = 440;
}

echo json_encode($output);