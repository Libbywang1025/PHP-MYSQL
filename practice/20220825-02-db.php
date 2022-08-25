<?php
require __DIR__. '/parts/connect-db.php';  //require相當於拷貝貼上

$sql = "SELECT * FROM address_book";  //sql外面通常用雙引號 因為裡面會有單引號 比較方便不需要跳脫
$stmt = $pdo->query($sql);  //一般查詢資料庫用query $stmt是statement（搜尋結果的代理物件）這邊拿到不是資料的結果

//讀取一筆，索引值陣列 不常用
// $row =$stmt->fetch(PDO::FETCH_NUM); 

//讀取一筆，關聯式陣列 為預設較常用
//$row =$stmt->fetch(PDO::FETCH_ASSOC); 
$row =$stmt->fetch(); //預設可以不用給參數 


//下fetch才會真的讀資料
// echo json_encode($stmt -> fetch());  
echo json_encode($row);