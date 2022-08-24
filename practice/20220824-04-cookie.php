<?php

setcookie('my_cookie','wang',time()+30); //設定
echo $_COOKIE['my_cookie']; //讀取

//第一次設定給server端 用戶端還讀不到 第二次才會讀取到資料
//第一次用 setcookie()設值時，用 $_COOKIE 是讀不到的，因為 server 是要告訴 client 設定 Cookie，並未從 client 端得到 Cookie。