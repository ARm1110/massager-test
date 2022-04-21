<?php
date_default_timezone_set('Iran');
session_start();
if (isset($_SESSION['useid'])) {
    $massage = $_POST['massage'];

    $dir = fopen("../../storage/log.html", 'a+');
    fwrite($dir, "<li class='clearfix' onclick='edite()'><div class='message-data text-right'><span class='message-data-time'>" . $_SESSION['useid']  . "</span><img src='https://bootdey.com/img/Content/avatar/avatar7.png' alt='avatar'></div><div class='message other-message float-right'> " . stripslashes(htmlspecialchars($massage)) . '<p><small>' . date("g:i A") . '</small></p>' . " </div></li>\n");
    fclose($dir);
    header('location:../src/home.php');
}
$x= "<li class='flex flex-col gap-y-2 justify-start '> <div> <img class='object-cover w-10 h-10 rounded-full' src='<?php echo '../auth/upload/' ." $_SESSION['useid'] ". '.jpg' ?>' . . alt="username' /> </div> <div class='relative max-w-xl px-4 py-2 text-gray-700 rounded shadow'><span class='block'>Hi</span> <div class='relative max-w-xl px-4 py-2 text-gray-700 '> <span class= 'text-gray-700 '>12:32 am</span> </div> </div> </li>"