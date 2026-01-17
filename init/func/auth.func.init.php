<?php
function logUserIn($db, $username, $passwd)
{
    global $db;
    $qouery = $db->prepare("SELECT * FROM tbl_users WHERE username = ? AND passwd = ? LIMIT 1");
    $qouery->bind_param("ss", $username, $passwd);
    $qouery->execute();
    $result = $qouery->get_result();
    // num_rows returns the number of rows in the result set
    if ($result->num_rows) {
        return true;
    } else {
        return false;
    }
}

function registerUser($db, $name, $username, $passwd)
{
    global $db;
    $query = $db->prepare("INSERT INTO tbl_users (name, username, passwd) VALUES (?, ?, ?)");
    $query->bind_param("sss", $name, $username, $passwd);
    if ($query->execute()) {
        return true;
    } else {
        return false;
    }
}

function UserExists($db, $username, $name)
{
    global $db;
    $query = $db->prepare("SELECT * FROM tbl_users WHERE username = ? AND name = ?");
    $query->bind_param("ss", $username, $name);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows) {
        return true;
    } else {
        return false;
    }
}
