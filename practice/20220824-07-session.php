<?php
//cookie只能存放字串
//session用在會員或購物車 訂單價錢一定從後端出來 不會放前端會有漏洞
session_start();   //初始化，才能使用$＿SESSION 一定要先做不然後面不會執行很重要！！！！！


if(! isset($_SESSION['my'])){
    $_SESSION['my'] = 1;  //設定

}else{
    $_SESSION['my']++;
}


//關聯式陣列
$_SESSION['my_data']=[
    'name' => 'shin',
    'age' => 30,
    'data' => [1,3,9]
];


echo $_SESSION['my'];








