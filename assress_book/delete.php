<?php
require __DIR__ . '/../config/04-16_pdo-content.php';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if ($sid < 1) {
  header('Location: pdo-list.php');
  exit;
}
$sql = "DELETE FROM `address_book` WHERE sid=$sid";
$pdo->query($sql);

# $_SERVER['HTTP_REFERER']: 從哪個頁面連過來的
$comeFrom = 'pdo-list.php';
if (isset($_SERVER['HTTP_REFERER'])) {
  $comeFrom = $_SERVER['HTTP_REFERER'];
}
header("Location: $comeFrom");