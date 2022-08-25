<?php
require __DIR__. '/parts/connect-db.php';

$sql = "SELECT * FROM address_book";  //sql外面通常用雙引號 因為裡面會有單引號 比較方便不需要跳脫

$stmt = $pdo->query($sql);  //一般查詢資料庫用query $stmt是statement（搜尋結果的代理物件）這邊拿到不是資料的結果

//用while迴圈 一筆一筆讀取整張表資料
//$row = $stmt->fetch() 讀出來的值設定給$row 
while($row = $stmt->fetch()){
    //show某些欄位
    echo "<div>{$row['name']}:{$row['mobile']}</div>";
}