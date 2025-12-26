
<?php
include '../includes/header.inc.php';
include '../includes/navbar.inc.php';
?>
    <h1  class="mx-auto p-2 container text-center" >
        Login
    </h1>

    <form class="mx-auto my-auto  p-2" style="width: 500px; ">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-labelj" for="exampleCheck1">Remember</label>
        </div>
        <button type="submit" class="btn btn-primary container text-center">Submit</button>
    </form>

<?php
include '../includes/footer.inc.php';
?>

