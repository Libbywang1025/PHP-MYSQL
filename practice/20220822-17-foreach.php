<?php
//依序取得陣列的元素值，可以使用 foreach/as 迴圈。
//foreach(陣列變數 as 列舉變數) { //迴圈主體內容}


$ar3 = array(
    'name' => 'John',
    2,  //0:2 0是索引值
    'age'=> 25,
    4,6 //1:4 2:6 1、2是索引值
);

foreach($ar3 as $k=>$v){
    echo"<div>$k:$v</div>";
}

