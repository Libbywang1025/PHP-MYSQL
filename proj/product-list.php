<?php
require __DIR__ . '/parts/connect-db.php';
$pageName = 'list'; //頁面名稱

$perPage = 4;  //每頁最多有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;  //用戶決定要看第幾頁  //if get page就轉換為整數 不然就是page1 
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0; //用戶要指定哪個分類
$lowp = isset($_GET['lowp']) ? intval($_GET['lowp']) : 0; //低價
$highp = isset($_GET['highp']) ? intval($_GET['highp']) : 0; //高價

$qsp = []; //query string parameters

//取得分類資料 $cates(categories)
$cates = $pdo->query("SELECT * FROM categories WHERE parent_sid=0")
    ->fetchAll();

//-------------------------商品
$where = 'WHERE 1';  //起頭 
if ($cate) { //條件 
    $where .= " AND category_sid=$cate "; //.代表左右兩邊相加
    $qsp['cate'] = $cate;
}

//設定價格範圍
if ($lowp) { //條件 
    $where .= " AND price>=$lowp"; //低價
    $qsp['lowp'] = $lowp;
}
if ($highp) { //條件 
    $where .= " AND price<=$highp "; //高價
    $qsp['highp'] = $highp;
}

//取得資料的總筆數
$t_sql = "SELECT COUNT(1) FROM products $where"; //條件起頭
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; //查詢索引值陣列裡面的第一筆

//計算總頁數
$totalPages = ceil($totalRows / $perPage);  //天花板 

$rows = []; //預設值

//有資料才執行括號裡面
if ($totalRows > 0) {
    if ($page < 1) {
        header('Location: ?page=1');  //原：(data-list.php可省略)?page=1'
        exit;
    }
    if ($page > $totalPages) {
        header('Location: ?page=' . $totalPages);  //原：(data-list.php可省略)?page=1'
        exit;
    }
    //TODO:取得該頁面資料 
    $sql = sprintf(
        "SELECT * FROM products %s ORDER BY `sid` DESC  LIMIT %s, %s",
        $where,
        ($page - 1) * $perPage,
        $perPage
    );  //ORDER BY `sid` DESC降冪排列
    $rows = $pdo->query($sql)->fetchAll();
}

//查看資料狀態
// echo json_encode([
//     'totalRows' => $totalRows,
//     'totalPages' => $totalPages,
//     'perPage' => $perPage,
//     'page' => $page,
//     'rows'=> $rows,
// ]);
// exit;
?>


<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php $allBtnStyle = empty($cate) ? 'btn-primary' : 'btn-outline-primary' ?>
            <a type="button" class="btn <?= $allBtnStyle ?>" 
                href="?<?php
                $tmp = $qsp; //複製
                unset($tmp['cate']); //清空類別
                unset($tmp['lowp']); //清空低價
                unset($tmp['highp']);
                echo http_build_query($tmp); ?>">全部</a>
            <?php foreach ($cates as $c) :
                $btnStyle = $c['sid'] == $cate ? 'btn-primary' : 'btn-outline-primary'
            ?>
            <a type="button" class="btn <?= $btnStyle ?>" 
                href="?<?php
                $tmp['cate'] = $c['sid'];
                echo http_build_query($tmp); ?>"><?= $c['name'] ?>
            </a>
            <?php endforeach ?>
        </div>
    </div>

    <div class="row">

        <div class="col">
            <?php $btnStyle = (!$lowp && $highp == 400) ? 'btn-primary' : 'btn-outline-primary' //沒有設定高價格或低價格就是反白
            ?>

            <a type="button" class="btn <?= $btnStyle ?>" 
                href="?<?php
                $tmp = $qsp;
                unset($tmp['lowp']);
                $tmp['highp'] = 400;
                echo http_build_query($tmp); ?>">~400</a>

            <?php $btnStyle = ($lowp == 400 && $highp == 500) ? 'btn-primary' : 'btn-outline-primary' ?>
            <a type="button" class="btn <?= $btnStyle ?>" 
                href="?<?php $tmp['lowp'] = 400;
                $tmp['highp'] = 500;
                echo http_build_query($tmp); ?>">400~500</a>

            <?php $btnStyle = ($lowp == 500 && !$highp) ? 'btn-primary' : 'btn-outline-primary' ?>
            <a type="button" class="btn <?= $btnStyle ?>" 
                href="?<?php unset($tmp['highp']);
                $tmp['lowp'] = 500;
                echo http_build_query($tmp); ?>">500~</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?> ">
                        <a class="page-link" 
                            href="?<?php $qsp['page'] = $page - 1;
                            echo http_build_query($qsp); ?> ">
                            <i class="fa-solid fa-circle-arrow-left"></i>
                        </a>
                    </li>

                    <?php for ($i = $page - 3; $i <= $page + 3; $i++) :
                        //如果頁數很多 為了隱藏頁數可以用
                        //正常頁數呈現 for($i = 1 ; $i <= $totalPages; $i++) //
                        if ($i >= 1 and $i <= $totalPages) :
                            $qsp['page'] = $i;
                    ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?<?= http_build_query($qsp); ?>"><?= $i ?></a>
                            </li>
                    <?php endif;
                    endfor; ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" 
                            href="?<?php $qsp['page'] = $page + 1;
                            echo http_build_query($qsp); ?> ">
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">

        <?php foreach ($rows as $r) : ?>
            <div class="col-lg-3">
                <div class="card">
                    <img src="./imgs/big/<?= $r['book_id'] ?>.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $r['bookname'] ?></h5>
                        <p class="card-text"><?= $r['author'] ?></p>
                        <p class="card-text"><?= $r['price'] ?></p>
                        <p>  <!-- 選擇數量 -->
                            <select class="form-select">
                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </p>
                        <p>
                            <button class="btn btn-warning" 
                            data-sid="<?= $r['sid'] ?>" 
                            onclick="addToCart(event)">加入購物車</button>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    function addToCart(event){
        const btn = $(event.currentTarget);
        const qty = btn.closest('.card-body').find('select').val();
        const sid = btn.attr('data-sid');
        
        console.log({sid, qty});
        $.get(
            'handle-cart.php', //第一個參數：要送給誰  
            {sid,qty}, //第二個參數：送出的資料
            function(data){//第三個參數：callback function
                console.log(data);
                showCartCount(data);
            },
            'json');  //第四個參數：轉換為json格式;
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>

