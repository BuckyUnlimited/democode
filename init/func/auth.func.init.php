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
        return $result->fetch_object();
    } else {
        return false;
    }
}

function loggedInUser()
{
    global $db;
    if (!isset($_SESSION['user_id'])) {
        return null;
    }
    $user_id = $_SESSION['user_id'];
    $query = $db->prepare(
        "SELECT * FROM tbl_users WHERE id_user = ?"
    );
    $query->bind_param('s', $user_id);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows) {
        return $result->fetch_object();
    }
    return null;
}



function logoutUser($redirect = 'login.php') {
    // Check if user session exists
    if (isset($_SESSION['user_id'])) {
        unset($_SESSION['user_id']);  // Remove user ID
    }
    // Redirect to login page or custom page
    header("Location: ./?page=login");
    exit();
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

