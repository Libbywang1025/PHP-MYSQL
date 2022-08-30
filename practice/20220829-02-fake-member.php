<?php


require __DIR__ . '/parts/connect-db.php';
$pass = '123456';
$email = 'apple@gmail.com';  //unique key
$nickname = 'apple'; 


$sql = sprintf("INSERT INTO `members`(
    `id`, `email`, `password`,
    `mobile`, `address`, `birthday`, 
    `hash`, `activated`, `nickname`,
    `create_at`
    ) VALUES (
        NULL,
        '$email',
        '%s',

        '0918111222',
        '台中市',
        '1995-01-23',

        'abc',
        '1', 
        '$nickname',
        NOW()
    )", password_hash($pass, PASSWORD_DEFAULT));

$stmt = $pdo->query($sql);

echo $stmt->rowCount() ? 'OK' : 'BAD';


