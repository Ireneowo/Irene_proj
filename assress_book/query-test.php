<?php

require __DIR__ . '/../config/04-16_pdo-content.php';

$sql = "SELECT * FROM address_book LIMIT 3";

# $stat = $pdo->query($sql);
# $rows = $stat->fetchAll();

$rows = $pdo->query($sql)->fetchAll();

echo json_encode($rows, JSON_UNESCAPED_UNICODE);