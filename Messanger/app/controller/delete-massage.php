<?php

extract($_POST);

$json_arr = json_decode(file_get_contents('../../storage/massage.json'), true);




$arr_index = array();
foreach ($json_arr  as $key => $value) {
    if ($value['id'] == $_POST["id"]) {
        $arr_index[] = $key;
    }
}
foreach ($arr_index as $i) {
    unset($json_arr[$i]);
}
$json_arr = array_values($json_arr);



file_put_contents("../../storage/massage.json", json_encode($json_arr, JSON_PRETTY_PRINT));
