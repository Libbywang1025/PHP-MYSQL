<?php
session_start();
if(!empty($_POST) and $_POST['account']=='libby'and $_POST['password']=='1234') {
    $_SESSION['user1']=[
        'account' => 'libby',
        'nickname' => 'apple',

    ];
}


?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?php if(empty($_SESSION['user1'])): ?>  
        
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">登入</h5>

                    <form method="post">
                        <div class="mb-3">
                            <label for="account" class="form-label">帳號</label>
                            <input type="text" class="form-control" id="account" name="account">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">密碼</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <button type="submit" class="btn btn-primary">登入</button>
                    </form>

                </div>
            </div>
            <?php else: ?>
                <h2><?=$_SESSION['user1']['nickname'].'Hello' ?> </h2>
                <p><a href="20220825-01-loginout.php">登出</a></p>
                <?php endif ?>
        </div>
    </div>
</div>


<?php include __DIR__ . '/parts/scripts.php'; ?>
<?php include __DIR__ . '/parts/html-foot.php'; ?>