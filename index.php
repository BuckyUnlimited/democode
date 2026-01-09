<?php
include './includes/header.inc.php';
include './includes/navbar.inc.php';



$aviable_pages = ['login', 'register'];
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if (in_array($page, $aviable_pages)) {
        include "./pages/ {$page}.php";
    } else {
        echo '<h1>Page not found</h1>';
    }
} else {
    echo 'Index Page';
}
?>


<h1 class="mx-auto p-2 container text-center">
    Welcome to Our Website Version v1
</h1>

<p class="mx-auto p-2 container text-center" style="width: 600px;">
    This is the home page. Please use the navigation bar to register or login.
</p>
<?php
include './includes/footer.inc.php';
?>