<?php
session_start();
print_r($_SESSION['useid']);
include '../controller/user.php';
$path1 = "userActive.json";
$userDataSet = read_from_file($path1);
$userDataSet = get_user_active();
echo '<pre>';
print_r($userDataSet[2]);
echo '</pre>';
$i = 0;
foreach ($userDataSet as $element) {

    // echo '<pre>';
    // print_r($element);
    // echo '</pre>';

    if ($element == $_SESSION['useid']) {

        unset($userDataSet[$i]);

        echo ("ok");
    }
    $i++;
}
// for ($i = 0; $i < count($userDataSet); $i++) {
//     for ($j = 1; $j <= count($userDataSet[$i]); $j++) {
//         if ($userDataSet[$i][$j]['username'] == $_SESSION['useid']) {
//             unset($userDataSet[$i]);
//             echo 'pk';
//             break;
//         }
//     }
// }

// $userDataSet[] = $userDataSet;
// $userDataSet = json_encode($userDataSet, JSON_PRETTY_PRINT);
echo '<pre>';
print_r($userDataSet);
echo '</pre>';
//write_to_file($path1, $DataSet);;

//file_put_contents('autocaricate.json', json_encode($data));
//header('Location: logout.php');
