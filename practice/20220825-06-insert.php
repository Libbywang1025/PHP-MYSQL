<?php
require __DIR__ . '/parts/connect-db.php';

$sql = "INSERT INTO `address_book`(
    `name`,
    `email`,
    `mobile`,
    `birthday`,
    `address`,
    `created_at`
)  VALUES(
    '蘋果',
    'apple@hotmail.com',
    '0977123456',
    '1994-12-12',
    '台中市',
    NOW()
)";

$stmt = $pdo->query($sql);  
echo $stmt->rowCount(); //影響的資料筆數



