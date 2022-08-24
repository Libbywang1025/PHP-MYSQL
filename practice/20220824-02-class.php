<?php

//class 類別名稱 {
// 屬性宣告
// 建構函式定義 // 方法定義
//}
//類別定義的標頭

//建構函式是物件在使用 new 建立之後，會自動被呼叫的函式，用來做物件的初始設定之用。 只要定義一個名稱和類別相同的 function 就是建構函式，然而在 PHP5 建議使用「__construct」。PHP 5 在物件被刪除前會呼叫解構函式「__destruct」，有時資料庫的操作在 物件刪除後就要關閉，即可在解構函式中進行關閉動作。


class Person{
    public $name;
    public $age;

    function __construct($name, $age=18)
    {
        $this ->name = $name; //把參數（區域變數）設定到屬性
        $this ->age = $age; //把參數（區域變數）設定到屬性
    } 

    function getJSON(){
        return json_encode([
            'name' => $this->name,
            'age' => $this->age,
        ], JSON_UNESCAPED_UNICODE);
    }
}

$p1 = new Person('Peter');

echo $p1 ->getJSON();

