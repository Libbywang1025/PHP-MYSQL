<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>9*9 sprintf</title>
</head>
<body>
    <!-- for (起始式; 條件式; 步進式) { 
        //區塊內敘述
    } -->
    
   <table border="1">
    <?php for($i=1;$i<10;$i++):?>
    <tr>
        <?php for($k=1;$k<10;$k++):?>
            <td><?=sprintf("%s * %s = %s", $i, $k, $i*$k)?></td>   
            <!-- sprintf 輸出字串 對應右邊的值 -->
        <?php endfor;?>
    </tr>
    <?php endfor; ?>
   </table>

   <div><?=sprintf("%X",255)?></div>  
   <!-- 轉換為16進位 -->



</body>
</html>