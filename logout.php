<?php

$_SESSION = [];

setcookie(session_name(), '', time() -1, '/');
//istrinam kukius serveryje
session_destroy();

header('Location: login.php');