<?php
require __DIR__. '/parts/connect-dbtest.php';  //require相當於拷貝貼上

$sql = "SELECT * FROM address_book";  //sql外面通常用雙引號 因為裡面會有單引號 比較方便不需要跳脫

$stmt = $pdo->query($sql);  //一般查詢資料庫用query $stmt是statement（搜尋結果的代理物件）這邊拿到不是資料的結果


$rows = $stmt->fetchAll(); //讀取所有資料

header('Content-Type: application/json');  //不可以亂空格
echo json_encode($rows);