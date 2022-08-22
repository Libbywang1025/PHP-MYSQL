<pre>
<?php
$arr = []; //有說明的用意 不是必要的

for($i=1; $i<=20; $i++){
    $arr[] = $i;  //array push
}

shuffle($arr);//亂數排序 php內建
print_r($arr);
?>
</pre>
<!-- <pre> 標籤(tag) 是用來保存原始文字內容的格式(preformatted text)，意思是文字內容中的空白、換行 (whitespace) 都會被保留下來顯示 -->