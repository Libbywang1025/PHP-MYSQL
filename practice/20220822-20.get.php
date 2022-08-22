<!-- 內建變數實際上是一個陣列 -->
<a href="?name=arron&a[]=100&a[]=120&b[name]=bill&b[age]=40">test</a>

<pre>
<?php
print_r($_GET);
?>
</pre>