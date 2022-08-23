<!-- 加法api -->
<?php

$a = isset($_GET['a']) ? intval($_GET['a']) : 0;  //有沒有a 有的話轉換為整數 沒有就為0
$b = isset($_GET['b']) ? intval($_GET['b']) : 0;  //有沒有a 有的話轉換為整數 沒有就為0

echo $a + $b;

//這個範例主要在看資料怎麼傳給api 回傳回來長怎麼樣