<?php


//insert_chat.php

include('database_connection.php');

session_start();

$data = array(
    ':from_user_id'        =>    $username,
    ':chat_message'        =>    $massage,
    ':status'            =>    '1'
);

$query = "
INSERT INTO chat_message 
(from_user_id, chat_message, status) 
VALUES ( :from_user_id, :chat_message, :status)
";

$statement = $connect->prepare($query);

if ($statement->execute($data)) {
} else {
    die("Error executing query ");
};
?>