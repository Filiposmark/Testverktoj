<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
Hej <?php echo $_SESSION["name"]; ?>! <br>Du er nu logget ind.

<?php else : echo "Du skal være logget ind for at se siden. <a href='login.php'>Log ind her</a>"; endif; ?>
</body>
</html>