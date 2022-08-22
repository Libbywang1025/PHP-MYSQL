<!-- 陣列的定義 -->

<pre>
<?php

//索引式陣列
$ar1 = array(2,4,6,8,10,12);
$ar2 = [2,4,6,8,10,12];

//關聯式陣列
$ar3 = array(
    'name' => 'John',
    'age'=>25,
);

$ar4 = [
    'name' =>'John',
    'age'=>25,
];

//var_dump、print_r常用來查看資料內容和除錯。
//var_dump除了print_r的資訊外，還會再列出變數型態
var_dump($ar1);
var_dump($ar3);


// print_r()印出陣列（PHP Array）的內容
//echo 沒有返回值而 print有
print_r($ar2); 
print_r($ar4); 

?>
</pre>
<!-- <pre> 標籤(tag) 是用來保存原始文字內容的格式(preformatted text)，意思是文字內容中的空白、換行 (whitespace) 都會被保留下來顯示 -->