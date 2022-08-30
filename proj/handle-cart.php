<?php
require __DIR__ . '/parts/connect-db.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; //沒有設定就設定空陣列
}

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;  //如果有設定就轉換成整數 沒給就預設為0
$qty = isset($_GET['qty']) ? intval($_GET['qty']) : 0;


// C: 加到購物車,sid,qty(要有產品的pk(sid),qty數量的參數 其他內容查看資料表就好)
// R: 查看購物車內容
// U: 更新,有給sid,qty
// D: 移除項目,給sid沒給數量 


if (!empty($sid)) {
    //先判斷如果有給sid再往下做
    if (!empty($qty)) {
        //  有給sid新增或變更
        if (!empty($_SESSION['cart']['sid'])) {
            //已存在就做變更
            $_SESSION['cart'][$sid]['qty'] = $qty;
        } else {
            //新增
            //TODO: 檢查資料表是否有這個商品
            $row = $pdo->query("SELECT * FROM products WHERE sid=$sid")->fetch();
            if (!empty($row)) {
                $row['qty'] = $qty; //先把數量放進去
                $_SESSION['cart'][$sid] = $row;
            }
        }
    } else {
        //沒給sid就刪除項目
        unset($_SESSION['cart'][$sid]);
    }
}

echo json_encode($_SESSION['cart']);
