<?php
$host = '127.0.0.1';
$dbname = 'demodatabase';
$username = 'root';
$password = '';
$port = 3306;

//mysqli connection
$db = new mysqli($host, $username, $password, $dbname);

if ($db->connect_error) {
    echo "Connection failed: " . $db->connect_error;
    die();
}
