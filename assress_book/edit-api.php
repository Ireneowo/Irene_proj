<?php

require __DIR__ . '/../config/04-16_pdo-content.php';
header('Content-Type: application/json');

$output = [
  'success' => false, # 有沒有新增成功
  'bodyData' => $_POST,
];

$birthday = strtotime($_POST['birthday']);
if ($birthday === false) {
  $birthday = null;
} else {
  $birthday = date('Y-m-d', $birthday);
}


// TODO: 欄位資料檢查
if (!isset($_POST['sid'])) {
  echo json_encode($output);
  exit; # 結束 php 程式
}

// '\[value-\d\]' 按搜尋 替換成?
$sql = "UPDATE `address_book` SET 
`name`=?,
`email`=?,
`mobile`=?,
`birthday`=?,
`address`=? WHERE sid=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([
  $_POST['name'],
  $_POST['email'],
  $_POST['mobile'],
  $birthday,
  $_POST['address'],
  $_POST['sid'],
  // 再加sid  他是透過表單傳過來
]);


$output['success'] = !!$stmt->rowCount(); # 修改了幾筆

echo json_encode($output);