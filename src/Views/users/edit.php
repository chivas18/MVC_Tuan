<?php
$base_url = COMMON['base_url'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<style type="text/css">
	img{
		width: 100px;
		height: 100px;
	}
</style>
</head>
<body>
	<form method="post" action="<?= $base_url ?>/users/update">
		<table border="0" align="center">
			<?php foreach ($users as $user): ?>
				<tr><td colspan="2" align="center" bgcolor="yellow"><img src="<?= $user->url_avatar ?>"><h1><?= $user->username ?></h1></td></tr>
				<tr><td><b>PASSWORD: </b></td><td><input type="password" name="password"></td></tr>
				<tr><td><b>PASSWORD: </b></td><td><input type="re-password" name="re-password"></td></tr>
				<tr><td><b>FULL NAME: </b></td><td><input type="text" name="display_name" value="<?= $user->display_name ?>"></td></tr>
				<tr><td><b>EMAIL: </b></td><td><input type="" name="" value="<?= $user->email ?>"></td></tr>
				<tr><td><b>POSITION: </b></td><td><input type="radio" name="position" value="1">Admin<br />
					<input type="radio" name="position" value="0" checked="checked">Member
				</td></tr>
				<tr><td><b>STATUS: </b></td><td><?php if($user->status=0){<input type="radio" name="position" value="1">Khóa<br />
					<input type="radio" name="position" value="0" checked="checked">Hoạt động
				</td>}else{<input type="radio" name="position" value="1" checked="checked">Khóa<br />
				<input type="radio" name="position" value="0">Hoạt động
			</td>} ?></tr>
			<tr><td><b>FACEBOOK: </b></td><td><input type="text" name="facebook" value="<?= $user->facebook ?>"></td></tr>
			<tr><td><b>GOOGLE: </b></td><td><input type="text" name="google" value="<?= $user->google ?>"></td></tr>
			<tr><td><b>PHONE: </b></td><td><input type="number" name="phone" value="<?= $user->phone ?>"></td></tr>
			<tr><td><b>DESCRIPTION: </b></td><td><input type="" name="description" value="<?= $user->description ?>"></td></tr>
			<tr><td><input type="hidden" name="date_created" value="<?= date(); ?>"></td></tr>
		<?php endforeach; ?>
	</table>
</form>
</body>
</html>