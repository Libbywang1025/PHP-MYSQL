<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title></title>
    <style>
        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <?php for ($k = 0; $k < 16; $k++) :
                $c = sprintf("#%x%x%x000", $k, $k, $k);
            ?>
                <td style="background-color:<?= $c ?>"></td>
            <?php endfor; ?>
        </tr>
    </table>
</body>

</html>