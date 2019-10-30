<?php

session_start();
var_dump($_SESSION);
$_SESSION=[
    'user'=>'Petras'
];

$_SESSION['low'] = 'rider';
var_dump($_SESSION);

