<?php
$base_url = COMMON['base_url'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href=<?= COMMON['base_url']."/public/css/styleLogin.css" ?> >
	<link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body> 

	<form method="post" action="<?= $base_url ?>/admin/login">
		<h1>Login</h1><div style="color: red"><?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''  ?></div>
		<input type="text" name="username" placeholder="User name">
		<input type="password" name="password" placeholder="Password">
		<button type="submit" name="login" class="login">Login</button>
	</form>

</body>
</html>