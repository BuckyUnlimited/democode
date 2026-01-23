<?php
require_once './init/init.php';
include './includes/header.inc.php';
include './includes/navbar.inc.php';

// unset($_SESSION['user_id']); // logout
$user = loggedInUser();

$avialable_pages = ['login', 'register', 'dashboard', 'logout'];
$logged_in_pages = ['dashboard', 'logout'];
$non_logged_in_pages = ['login', 'register'];
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page']; // login
}
if (in_array($page, $logged_in_pages) && empty($user)) {
    header('Location: ./?page=login');
}
if (in_array($page, $non_logged_in_pages) && !empty($user)) {
    header('Location: ./?page=dashboard');
}
if (in_array($page, $avialable_pages)) {
    include './pages/' . $page . '.php';
} else {
    // header('Location: ./?page=dashboard');
    header('Location: ./?page=login');
}

?>

<?php
include './includes/footer.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
</body>

</html>