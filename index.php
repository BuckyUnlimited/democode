<?php
include './includes/header.inc.php';
include './includes/navbar.inc.php';


$avialable_pages = ['login', 'register'];
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if (in_array($page, $avialable_pages)) {
        include './pages/' . $page . '.php';
    } else {
        echo '<h1>Page Not found</h1>';
    }
} else {
    echo '<h1>Index Home</h1>';
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