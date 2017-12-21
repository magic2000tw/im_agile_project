<?php
session_start();
$_SESSION['sID'] = 0;
?>
<h1>Login test</h1><hr />
<form method="post" action="https://localhost/pro/test_loginControl.php">
<input type="hidden" name="act" value="login">
	loginMail: <input type="text" name="loginMail"><br />
	Password : <input type="password" name="password"><br />
<input type="submit">
</form>