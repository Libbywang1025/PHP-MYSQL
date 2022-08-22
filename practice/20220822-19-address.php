<pre>
<?php

$ar = [2,5,7,3,17];
//$v複製後再設定 所以不會＋1
foreach ($ar as $v){
    $v++;
}
//把$ar陣列位置設定$v 所以會＋1
// foreach ($ar as &$v){
//     $v++;
// }

print_r($ar)

?>
</pre>