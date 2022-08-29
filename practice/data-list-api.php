<?php
require __DIR__ . '/parts/connect-db.php';
$pageName = 'list'; //頁面名稱

$perPage = 2;  //每頁最多有幾筆
$page = isset($_GET['page']) ? intval(($_GET['page'])) : 1;  //用戶決定要看第幾頁  //if get page就轉換為整數 不然就是page1 


//取得資料的總筆數
$t_sql = "SELECT COUNT(1) FROM address_book";
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
    $sql = sprintf("SELECT * FROM address_book ORDER BY `sid` DESC  LIMIT %s, %s", ($page - 1) * $perPage, $perPage);  //ORDER BY `sid` DESC降冪排列
    $rows = $pdo->query($sql)->fetchAll();
}

//$page<1 ? ($page=1) : null;  //if page<1 true:($page=1) false:null
//$page>$totalPages ? ($page=$totalPages) : null;

//在還沒做版前 先查看資料狀況
// echo json_encode([
//     'totalRows' => $totalRows,
//     'totalPages' => $totalPages,
//     'perPage' => $perPage,
//     'page' => $page,
//     'rows'=> $rows,
// ]);

// exit;  //暫時離開資料庫迴圈


echo json_encode([
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'perPage' => $perPage,
    'page' => $page,
    'rows' => $rows,
]);



