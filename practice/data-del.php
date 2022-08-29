<?php

//echo $_SERVER['HTTP_REFERER'];   //人從哪裡來 HTTP參照位址
//exit;


require __DIR__ . '/parts/connect-db.php';

if(isset($_GET['sid'])){
    //如果有設定就刪除
    $sid = intval(($_GET['sid']));  
    $sql = "DELETE FROM address_book WHERE sid = $sid";
    $pdo->query($sql);
}

$comeFrom = 'data-list.php';
if (!empty($_SERVER['HTTP_REFERER'])){
    $comeFrom = $_SERVER['HTTP_REFERER'];
}

//沒設定就返回列表頁
header('Location: '. $comeFrom);