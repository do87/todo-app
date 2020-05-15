<?php

$server_name = getenv('HOSTNAME');
if(empty($server_name)) {
    $server_name = 'localhost';
} else {
    if(shell_exec('cat /proc/self/cgroup | grep /docker')) {
        $running_in_docker = true;
    }
}

$logo_img = getenv('LOGO_IMG');

$server_name = getenv('HOSTNAME');
if(empty($server_name)) {
    $server_name = 'localhost';
}

$db_host = getenv('DB_HOST');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASS');

if (empty($db_host) || empty($db_name) || empty($db_user) || empty($db_pass)) {
    die("DB Connection wasn't properly set.<br /><br />Please configure the following environment variables:<br />DB_HOST, DB_NAME, DB_USER, DB_PASS");
}
