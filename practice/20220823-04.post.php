<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post表單</title>
</head>
<body>
    <!-- 不建議用$_REQUEST -->
    <!-- 表單登入通常用post -->

<!-- 依據get/post參數決定畫面內容 -->
<!-- 送出後重整會依據送出參數改變 不懂在說啥????? 10:30 -->

    <?php if (empty($_POST)): ?>  
        <!-- 如果沒有表單資料進來就會呈現下表欄位 -->
        <form name="form1" method="post">
            <input type="text" name="account" placeholder="帳號">
            <br>
            <input type="password" name="password" placeholder="密碼">
            <br>

            <button>送出</button>
        </form>
    <?php else: ?>
        <pre>
        <?php print_r($_POST); ?>
        </pre>
    <?php endif; ?>
       

</body>
</html>