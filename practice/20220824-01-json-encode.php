<?php

//關聯式陣列  big5一個中文字2個bite組成 utf8一個中文字3個bite組成
$ar = [
    'name' => '林小新',
    'age' => 30,
    'data' => '/abc',
    'data1' => [2,4,6,8],
];

echo json_encode($ar, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);  //｜位元運算子
// echo json_encode($ar); //只會echo一次 不合法格式 外掛就不會出來 

//php函式：可以傳位置、區域變數