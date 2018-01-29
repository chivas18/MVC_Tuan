<?php
$base_url = COMMON['base_url'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD USER</title>
</head>
<body> 

	<form method="post" action="<?= $base_url ?>/login/do_login">
		<table>
			<tr><td align="center" colspan="2"><h1>Login</h1></td></tr>
			<tr><td align="center" colspan="2" style="color: red"><?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''  ?></td></tr>

			<tr>
				<td>User name: </td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="login"></td>
			</tr>
		</table>
	</form>

</body>
</html>