<?php
require __DIR__ . '/parts/connect-db.php';

//SQL injection, SQL隱碼攻擊
//for迴圈建立100筆資料
$sql = "INSERT INTO `address_book`(
    `name`,
    `email`,
    `mobile`,
    `birthday`,
    `address`,
    `created_at`
)  VALUES(
    ?,
    ?,
    ?,
    ?,
    ?,
    NOW()
)";
//問號要對應

$stmt = $pdo->prepare($sql);  //不會拿到結果  //prepare一次就可以

//執行
$stmt -> execute([
    'banana',
    'aaa@gmail.com',
    '0935456123',
    '1992-10-30',
    '台南市',
]);  


echo json_encode([
    $stmt->rowCount(),  //影響的資料筆數：新增修改或刪除
    $pdo->lastInsertId(),//最新的新增資料的主鍵primary key
]);



