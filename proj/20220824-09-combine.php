<?php
require __DIR__ . '/parts/connect-db.php';
$pageName = 'home'; //頁面名稱
?>

<?php include __DIR__. '/parts/html-head.php'; ?>
<?php include __DIR__. '/parts/navbar.php'; ?>
<div class="container">
    <h2>
        Hello GOD!
    </h2>
    <!-- 
        include 包含檔案進來
        require 包含檔案進來（連資料庫通常都會用require）
        差別在於發生錯誤時一個error 一個warining
    -->
</div>
<?php include __DIR__. '/parts/scripts.php'; ?>
<?php include __DIR__. '/parts/html-foot.php'; ?>








