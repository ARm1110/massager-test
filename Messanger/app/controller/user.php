<?php
include '../controller/file.php';

function add_user($userName, $name, $email, $pass1)
{
    $user =

        [
            $userName => [
                'username' => $userName,
                'name' => $name,
                'email' => $email,
                'newpassword' => $pass1,
                'activeUsers' => 'offline',
            ]

        ];
    $users = get_user();
    $users[] = $user;
    $users = json_encode($users, JSON_PRETTY_PRINT);
    write_to_file('users.json', $users);
}
function get_user()
{
    return json_decode(read_from_file('users.json'), true);
}
function get_user_custom($path)
{
    return json_decode(read_from_file($path), true);
}
function get_user_active()
{
    return json_decode(read_from_file('userActive.json'), true);
}


function search_user($userName)
{
    $users = get_user();
    for ($i = 0; $i < count($users); $i++) {
        foreach ($users as $key => $value) {
            if ($value['username'] === $userName) {
                return $value['username'];
            }
        }
    }
    return false;
}
function search_email($email)
{
    $users = get_user();
    for ($i = 0; $i < count($users); $i++) {
        foreach ($users as $key => $value) {
            if ($value['email'] === $email) {
                return $value['email'];
            }
        }
    }
    return false;
}
function search_userid($username)
{

    $users = get_user();
    for ($i = 0; $i < count($users); $i++) {
        foreach ($users[$i] as $key => $value) {
            if ($value['username'] === $username) {
                return $value['username'];
            }
        }
    }
    return false;
}
function search_pass($password)
{

    $users = get_user();
    for ($i = 0; $i < count($users); $i++) {
        foreach ($users[$i] as $key => $value) {
            if ($value['newpassword'] === $password) {
                return $value['newpassword'];
            }
        }
    }
    return false;
}

function set_activeUser($username)
{
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

    return false;
}
