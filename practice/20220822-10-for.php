<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>for loop</title>
</head>
<body>
    <!-- for (起始式; 條件式; 步進式) { 
        //區塊內敘述
    } -->
    
   <table border="1">
    <?php for($i=1;$i<10;$i++):?>
    <tr>
        <td><?=$i ?></td>
    </tr>
    <?php endfor; ?>
   </table>

</body>
</html>