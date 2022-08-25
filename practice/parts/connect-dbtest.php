<?php
//資料庫連線

//設定（習慣用法）

$db_host= '192.168.33.78';
$db_user= 'meow';
$db_pass= 'meow';
$db_name= 'meow';


//定義
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8";  //data source name //不要有空格 不會錯誤 但資料抓取會有問題

$pdo_options = [
    //PDO屬性：ATTR_ERRMODE錯誤模式
    PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
];


//連線設定
try{
    // 需要測試的語句
    $pdo = new PDO($dsn, $db_user, $db_pass,$pdo_options);
} catch(PDOException $exp){

    //$exp是自定義  "Exceprion"是自己設定的字串 錯誤的話會回傳的訊息
    echo "Exceprion".$exp->getMessage();
}


