<?php
include '../controller/user.php';

$userName = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$pass1 = $_POST['newpassword'];
if (!empty($_FILES)) {
    if (is_uploaded_file($_FILES['uploadFile']['tmp_name'])) {
        $ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
        $allow_ext = array('jpg');
        if (in_array($ext, $allow_ext)) {
            $_source_path = $_FILES['uploadFile']['tmp_name'];
            $target_path = 'upload/' . $_POST['username'] . ".$ext";
            if (move_uploaded_file($_source_path, $target_path)) {
            }
            //echo $ext;
        }
    }
} else {
    echo "ext";
    exit();
}
if (search_user($userName)) {
    echo "this username already exists";
    //header('Location: ../../resource/signup.php?error=invalid_usr');
    exit();
}
if (search_email($email)) {
    echo "this email already exists";
    //header('Location: ../../resource/signup.php?error=invalid_usr');
    exit();
}


add_user($userName, $name, $email,  $pass1);

header('Location: ../src/home.php');
