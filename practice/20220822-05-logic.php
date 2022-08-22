<?php
//php的邏輯運算，結果一定為布林值
$a = 12;
$b = 3;

var_dump( $a && $b);  //查看任何變數
echo '<br>';
var_dump( $a || $b);  //查看任何變數
echo '<br>';
var_dump( $a=6 && $b=7);  //出錯 老師說很複雜
echo '<br>';
echo "$a, $b <br>";
var_dump( $a=6 and $b=7);  # and, or 的優先權比=要低
echo '<br>';
echo "$a, $b <br>";
$a = 12;
$b = 3;
var_dump( $a=0 and $b=7); # and, or 的優先權比=要低
echo '<br>';
echo "$a, $b <br>";   # $a=0 false 後面就不會再運算 7就不會設定給b 