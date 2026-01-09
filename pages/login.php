<?php
$username = $passwd = "";
$usernameErr = $passwdErr = "";
if (isset($_POST['username']) && isset($_POST['passwd'])) {
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];


    if (empty($username)) {
        $usernameErr = "Username is required";
    }
    if (empty($passwd)) {
        $passwdErr = "Password is required";
    }
};
?>

<h1 class="mx-auto p-2 container text-center">
    Login
</h1>

<form method="post" action="./?page=login" class="mx-auto my-auto  p-2" style="width: 500px; ">
    <div class="mb-3">
        <label  class="form-label">Email address</label>
        <input name="username" type="text" class="form-control
         <?php echo empty($usernameErr) ? '' : 'is-invalid' ?>" 
         value="<?php echo $username?>"
         >
         <div>
            <?php echo $usernameErr ?>
         </div>
    </div>
    <div class="mb-3">
        <label  class="form-label">Password</label>
        <input name="passwd" type="password" class="form-control 
        <?php echo empty($passwdErr) ? '' : 'is-invalid' ?>"
        value="<?php echo $passwd?>"
        >
        <div>
            <?php echo $passwdErr ?>
        </div>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember</label>
    </div>
    <button type="submit" class="btn btn-primary container text-center">Submit</button>
</form>
