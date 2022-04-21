<?php
extract($_POST);

$massages = json_decode(file_get_contents('../../storage/massage.json'), true);

$massage = [
    'id' => $time . $username,
    "username" => $username,
    "massage" => $massage,
    "time" => $time,

];


$massages[] = $massage;

file_put_contents("../../storage/massage.json", json_encode($massages, JSON_PRETTY_PRINT));
