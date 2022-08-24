
<?php

$a = isset($_POST['a']) ? intval($_POST['a']) : 0;  //有沒有a 有的話轉換為整數 沒有就為0
$b = isset($_POST['b']) ? intval($_POST['b']) : 0;  //有沒有a 有的話轉換為整數 沒有就為0

$output = [
    'postData' => $_POST,
    'result' => $a + $b,
];
header('Content-Type: application/json'); //設定http檔頭 回應的檔案類型
echo json_encode($output, JSON_UNESCAPED_UNICODE); //可以做除錯驗證

//這個範例主要在看資料怎麼傳給api 回傳回來長怎麼樣