<?php


session_start();

// $userA = get_user_active();
// echo '<pre>';
// var_dump($userA[0][0]);
// echo '</pre>';

echo "Logout Successfully ";
session_destroy();
header("Location: ../../resource/loginform.php");
