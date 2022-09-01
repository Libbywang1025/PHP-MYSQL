<?php
require __DIR__ . '/parts/connect-db.php';
if (empty($_SESSION['user']) or empty($_SESSION['cart'])) {
    header('Location: product-list.php');
    exit;
    //有登入且有購物車有東西才做
}

//應該從後端由資料表的資料計算總價
$total = 0;
foreach ($_SESSION['cart'] as $k => $v) {
    $total += $v['price'] * $v['qty'];
}

$o_sql = sprintf("INSERT INTO `orders`(
    `member_sid`, `amount`, `order_date`
    ) VALUES (%s,%s,NOW())", $_SESSION['user']['id'], $total);

//member_sid、amount的％s %s 因為當初資料庫設定已為整數 所以才沒給單引號 一般需要加單引號

$stmt = $pdo->query($o_sql);

//echo $stmt->rowCount()."<br>";
//echo $pdo->lastInsertId(); //primary key
// echo json_encode([
//     'rowCount'=>$stmt->rowCount(),
//     'lastInsertId'=>$pdo->lastInsertId(),
// ]);
// exit;

$order_sid = $pdo->lastInsertId(); //訂單編號

//訂單明細
$od_sql = "INSERT INTO `order_details`(`order_sid`, `product_sid`, `price`, 
`quantity`) VALUES (?,?,?,?)";
$stmt = $pdo->prepare($od_sql);

foreach ($_SESSION['cart'] as $k => $v) {
    $stmt->execute([
        $order_sid,
        $v['sid'],
        $v['price'],
        $v['qty'],
    ]);
}

unset($_SESSION['cart']);//清除購物車內容
?>

<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<div class="container">
    <h2>
        感謝訂購
    </h2>
</div>



<?php include __DIR__ . '/parts/scripts.php'; ?>
<?php include __DIR__ . '/parts/html-foot.php'; ?>