<?php
require __DIR__ . '/parts/connect-db.php';
$pageName = 'edit'; //頁面名稱
$title = '編輯資料';

//如果沒有給pk，轉向並結束
if(!isset($_GET['sid'])){
    header(('Location: data-list.php'));
    exit;
}
    //如果有設定就刪除
    $sid = intval(($_GET['sid']));  
    $sql = "SELECT * FROM address_book WHERE sid = $sid";
    $r = $pdo->query($sql) ->fetch();

    //如果沒有拿到資料 就轉向到列表頁
    if(empty($r)){
        header(('Location: data-list.php'));
        exit;
    }

    // echo json_encode($r, JSON_UNESCAPED_UNICODE);
    // exit;
?>



<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">編輯資料</h5>
                    <form name="form1" onsubmit=" checkForm(); return false;" novalidate>
                        <!-- novalidate 先不驗證資料 -->
                        <input type="hidden" name="sid" value="<?=$r['sid']?>">
                        <!-- 隱藏欄位 送出 -->
                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input type="text" class="form-control" id="name" name="name" required
                            value="<?= htmlentities($r['name'])?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="text" class="form-control" id="email" name="email"  
                            value="<?= $r['email']?>">
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile"
                            value="<?= $r['mobile']?>">
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday"
                            value="<?= $r['birthday']?>">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">address</label>
                            <textarea class="form-control" name="address" id="address" cols="50" rows="10">
                            <?= htmlentities($r['address']) ?>
                            </textarea>
                            <!-- 不要換行 -->
                        </div>
                        <div id="msgContainer">
                            <!-- <div class="alert alert-primary" role="alert">
                                A simple primary alert—check it out!
                            </div> -->
                        </div>

                        <button type="submit" class="btn btn-primary">修改</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    const msgc = $('#msgContainer');

    function genAlert(msg, type='danger') {
        const a = $(`
        <div class="alert alert-${type}" role="alert">
            ${msg}
        </div>
        `);

        msgc.append(a);
        setTimeout(()=>{
            a.fadeOut(400, function(){
                a.remove();
            });
        }, 2000);
    }


    function checkForm() {
        //TODO: 檢查欄位資料格式是否符合

        let isPass = true; //預設表單資料是沒問題的
        const name = document.form1.name.value;
        const email = document.form1.email.value;

        // if(! name){
        //     alert('請填寫姓名！');
        //     isPass = false;
        // }
        if (name.length < 2) {
            genAlert('請填寫正確的姓名！');
            isPass = false;
        }
        if (!email) {
            genAlert('請填寫正確的email!');
            isPass = false;
        }
        if (isPass) {
            //送出表單資料

            $.post(
                //第一個參數：要送給誰  
                'data-edit-api.php',
                //第二個參數：送出的資料
                $(document.form1).serialize(),
                //第三個參數：callback function
                function(data) {
                    console.log(data);
                    if (data.success) {
                        genAlert('修改完成', 'success')
                    } else {
                        genAlert(data.error)
                    }
                },
                //第四個參數：轉換為json格式
                'json');
        }

    }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>