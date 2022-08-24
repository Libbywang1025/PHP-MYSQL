<pre>
<?php

//取得timestamp
echo time(). "\n";

//輸出時間格式
echo date("Y-m-d H:i:s"). "\n";   // "\n"要在pre內才有用
echo date("Y-m-d H:i:s", time()+7*24*60*60). "\n";
//沒給參數就是當下時間
//H	小時，24 小時格式，00-23
//i	00-59
//s 00-59

//標準格式的時間字串，轉換為timestamp
echo strtotime('2022-08-24'). "\n";
?>
</pre>




