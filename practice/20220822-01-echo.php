<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    /*
    區塊註解
    */
    define('MY_CONST',12345);   #自訂常數 大多使用全大寫 值在設定後不可變更
    echo 123+5;
    echo '<br>';
    echo 2+3;
    echo '<br>';
    echo 0xFF. '<br>';  //.字串串接
    echo TRUE. '<br>';  #布林值不區分大小寫
    echo faLSE. '<br>';  #布林值不區分大小寫
    echo Null. '<br>';  #空值不區分大小寫
    echo '--------<br>';
    echo MY_CONST.'<br>';
?>


</body>
</html>
