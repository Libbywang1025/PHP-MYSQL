<?php
require __DIR__ . '/parts/connect-db.php';


$output = [
    'success' =>false, //是否修改成功
    'error' => '', //錯誤訊息
    'code' => 0,
    'postData' => $_POST,
];

//TODO:欄位資料要驗證
//必填欄位未填驗證
if(empty($_POST['sid']) or empty($_POST['name']) or empty($_POST['email'])){
    $output['error'] = '欄位資料不足';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

//如果時間的字串無法轉換成timestamp表示格式錯誤
if(strtotime($_POST['birthday'])===false){
    $birthday = null;
    //不能轉換就是空值
}else{
    $birthday = date('Y-m-d', strtotime($_POST['birthday']));
}

$sql = "UPDATE `address_book` SET 
`name`=?,
`email`=?,
`mobile`=?,
`birthday`=?,
`address`=?
WHERE `sid`=?";

$stmt = $pdo->prepare($sql);  //不會拿到結果  //prepare一次就可以
//執行
$stmt -> execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $birthday,  //因為上面寫成變數所以要改
    $_POST['address'],
    $_POST['sid']
]); 

if($stmt->rowCount()){
    $output['success'] = true;
}else{
    $output['error']= '資料沒有修改' ;
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);


