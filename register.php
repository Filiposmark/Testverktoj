<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Secure Login: Registration Form</title>
    <script src="js/sha512.js"></script>
    <script src="js/forms.js"></script>
</head>
<body>
<!-- Registration form to be output if the POST variables are not
set or if the registration script caused an error. -->
<h1>Register with us</h1>
<?php
if (!empty($error_msg)) {
    echo $error_msg;
}
?>

    <ul>
        <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
        <li>Passwords must be at least 6 characters long</li>
        <li>Passwords must contain
            <ul>
                <li>At least one uppercase letter (A..Z)</li>
                <li>At least one lowercase letter (a..z)</li>
                <li>At least one number (0..9)</li>
            </ul>
        </li>
        <li>Your password and confirmation must match exactly</li>
    </ul>
    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>"
          method="post"
          name="registration_form">
        Full name: <input type="text" name="name" id="name"><br>
        Username: <input type='text' name='username' id='username'><br>
        Password: <input type="password" name="password" id="password"><br>
        Confirm password: <input type="password" name="confirmpwd" id="confirmpwd"><br>
        <input type="button" value="Register"
               onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.password,
                                   this.form.confirmpwd);" />
    </form>
    <p>Return to the <a href="index.php">login page</a>.</p>

</body>
</html>
