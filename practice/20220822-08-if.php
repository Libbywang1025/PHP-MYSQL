<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>php blocks</title>
</head>
<body>
   
<?php
    $age = isset($_GET['age']) ? intval($_GET['age']) : 0;

    if($age >= 18){
    ?>
        <h2>歡迎光臨</h2>
        <img src="../images/depositphotos_23467488-stock-photo-grandma-with-open-mouth.jpeg" alt="">
    <?php
    } else {
    ?>
        <h2>以後再來</h2>
        <img src="../images/baby.jpeg" alt="">
    <?php
    }
    ?>
</body>
</html>