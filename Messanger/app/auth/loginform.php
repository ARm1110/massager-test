<?php
include '../controller/user.php';
session_start();
extract($_POST);




// if (isset($_SESSION['useid'])) {
//     header("Location:../src/home.php");
// }


// var_dump($_POST);
if (($user = search_userid($username)) && (isset($user))) {
    echo '<pre>';
    var_dump($user);
    echo '</pre>';
    $pass = search_pass($password);
    // var_dump($user['username']);
    if ($user === $username) {
        if ($pass === $password) {
            if (true) {
                echo '<pre>';
                var_dump(set_activeUser($username));
                echo '</pre>';
                $_SESSION['useid'] = $username;
                //set_activeUser($username);
                //var_dump($username);

                // $_SESSION['use'] = $email;
                //$_SESSION['pass'] = $password;
                header("location:../src/home.php");
                exit();
            } else {
                echo "invalid UserName or Password 1";
                exit();
            }
        } else {
            echo "invalid UserName or Password";
            exit();
        }
    } else {
        echo "invalid UserName or Password";
        exit();
    }
} else {
    header("location:../../resource/loginform.php?submit=error ");
}
