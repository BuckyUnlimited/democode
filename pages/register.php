<?php
$username = $passwd = $name = "";
$usernameErr = $passwdErr = $nameErr = "";
// Check if username already exists
if (isset($_POST['username']) && isset($_POST['passwd']) && isset($_POST['name']) && isset($_POST['confirm_passwd'])) {
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    $name = $_POST['name'];
    $comfirm_passwd = $_POST['confirm_passwd'];
    if (empty($name)) {
        $nameErr = "Name is required";
    }
    if (empty($username)) {
        $usernameErr = "Username is required";
    }
    if (empty($passwd)) {
        $passwdErr = "Password is required";
    }
    if ($passwd !== $_POST['confirm_passwd']) {
        $passwdErr = "Passwords do not match";
    }
    if ($usernameExists = UserExists($db, $username, $name)) {
        $usernameErr = "Username already exists";
    } else {
        $usernameErr = "";
        $usernameExists = false;
    }

    if (empty($nameErr) && empty($usernameErr) && empty($passwdErr)) {
        if (registerUser($db, $name, $username, $passwd)) {

            header("Location: ./?page=login");
        } else {
            $usernameErr = "Registration failed, try again";
        }
    }
}
?>

<h1 class="mx-auto p-2 container text-center">
    Register
</h1>

<form method="post" action="./?page=register" class="mx-auto p-2" style="width: 500px;  height: 100vh 9">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control 
        <?php echo empty($nameErr) ? '' : 'is-invalid' ?>" value="<?php echo $name ?>"
            name="name" aria-describedby="emailHelp">
        <div>
            <?php echo $nameErr ?>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control 
        <?php echo empty($usernameErr) ? '' : 'is-invalid' ?>"
            value="<?php echo $username ?>"
            name="username" aria-describedby="emailHelp">
        <div>
            <?php echo $usernameErr ?>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control <?php echo empty($passwdErr) ? '' : 'is-invalid' ?>" 
        name="passwd" id="exampleInputPassword1">
        <div>
            <?php echo $passwdErr ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Comfirm Password</label>
        <input name="confirm_passwd" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember</label>
    </div>
    <button type="submit" class="btn btn-primary container text-center">Submit</button>
</form>