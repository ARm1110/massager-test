<?php
define('STORAGE', "C:\\xampp\\htdocs\\learnphp.com\\Messenger\\storage\\");

function write_to_file($path, $data)
{
    file_put_contents(STORAGE . $path, $data);
}
function write_to_file_user($path, $data)
{
    file_put_contents(STORAGE . $path, $data);
}

function read_from_file($path)
{
    return file_get_contents(STORAGE . $path);
}
