<?php

if (
    empty($_SERVER['$PHP_AUTH_USER']) ||
    empty($_SERVER['$PHP_AUTH_PW'])
) {

    echo json_encode([
        'status' => 'ERROR',
        'message' => 'Invalid access.'
    ]);
    return;
}
   

$usuarios = [
    [
        'user' => 'joao',
        'pass' => '123'
    ],
    [
        'user' => 'Ana',
        'pass' => '111'
    ],
    [
        'user' => 'Carlos',
        'pass' => '222'
    ],
    ];

$user = ($_SERVER['$PHP_AUTH_USER']);
$pass = ($_SERVER['$PHP_AUTH_PW']);

$valid_authentication = false;
foreach($usuarios as $usuario){
    if($usuario['user']==$user && $usuario['pass']== $pass){
        $valid_authentication = true;
    }
}

if(!$valid_authentication){
    echo json_encode([
        'status' => 'ERROR',
        'message' => 'Invalid authetication credentials.'
    ]); 
    return;
}

echo json_encode([
    'status' => 'success',
    'message' => 'Welcome to this API'
]
);