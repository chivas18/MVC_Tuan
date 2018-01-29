<?php
$base_url = COMMON['base_url'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD USER</title>
</head>
<body>

	<form method="post" action="<?= $base_url ?>/users/create">
		<table>
			<tr><td align="center" colspan="2"><h1>Register</h1></td></tr>
			<tr><td colspan="2" align="center" style="color: red"><?php echo isset($_SESSION['err_message']) ? $_SESSION['err_message'] : ''  ?></td></tr>
			<tr>
				<td>User name: </td>
				<td><input type="text" name="username" placeholder="User name" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>"><label style="color: red">*</label></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password" placeholder="Password"><label style="color: red">*</label></td>
			</tr>
			<tr>
				<td>Re-Password: </td>
				<td><input type="password" name="re-password" placeholder="Re-Password"><label style="color: red">*</label></td>
			</tr>
			<tr>
				<td>Full name</td>
				<td><input type="text" name="fullname" placeholder="Full name" value="<?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : '' ?>"><label style="color: red">*</label></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type="email" name="email" placeholder="Email"><label style="color: red">*</label></td>
			</tr>
			<tr>
				<td>Position: </td>
				<td><input type="radio" name="position" value="1">Admin<br />
					<input type="radio" name="position" value="0" checked="checked">Member
				</td>
			</tr>
			<tr>
				<td>Facebook: </td>
				<td><input type="text" name="facebook" placeholder="Facebook"></td>
			</tr>
			<tr>
				<td>Gooogle: </td>
				<td><input type="text" name="google" placeholder="Google"></td>
			</tr>
			<tr>
				<td>Twitter: </td>
				<td><input type="text" name="twitter" placeholder="Twitter"></td>
			</tr>
			<tr>
				<td>Phone: </td>
				<td><input type="number" name="phone" placeholder="Phone number"></td>
			</tr>
			<tr>
				<td>Description: </td>
				<td><input type="textarea" name="description" placeholder="Decription"></td>
			</tr>
			<tr>
				<td>Avatar</td>
				<td><input type="file" name="file" size="20"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit"><input type="reset" name="submit" value="Reset"></td>
			</tr>
		</table>
	</form>

</body>
</html>