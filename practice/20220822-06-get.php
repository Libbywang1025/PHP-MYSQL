<?php
//query string
//isset()判斷是不是有設定
//intval()把字串轉換為整數 
//floatval()把字串轉換為浮點數
$a = isset($_GET['a']) ? intval($_GET['a']): 0;  //不會跳warning
$b = isset($_GET['b']) ? intval($_GET['b']): 0;  //不會跳warning
echo $a + $b;

// echo $_GET['a'] + $_GET['b']; //$_GET為內建的變數