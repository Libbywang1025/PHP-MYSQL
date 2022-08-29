<?php
//登出：更改session的狀態

session_start();

unset($_SESSION['user']);  //清除某個session變數  //user改成cart就是購物車清空

$comeFrom = 'login.php';
if(! empty($_SERVER['HTTP_REFERER'])){
    $comeFrom = $_SERVER['HTTP_REFERER'];
}

header('Location:' .$comeFrom); //頁面轉向redirect

exit; //結束程式，底下的程式都不會執行
//die('oops'); //同exit

//開發network  2開頭：正常回應（200） 3開頭：頁面轉向或快取 4開頭：用戶端錯誤 5開頭：server端錯誤
