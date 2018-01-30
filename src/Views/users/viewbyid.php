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
	<table border="0" align="center">
					<?php foreach ($users as $user): ?>
					<tr><td colspan="2" align="center" bgcolor="yellow"><img src="<?= $user->url_avatar ?>"><h1><?= $user->username ?></h1></td></tr>
					<tr><td colspan="2" align="center" style="color: red"><?= empty($_SESSION['message']) ? '' : $_SESSION['message'] ?></td></tr>
					<tr><td><b>PASSWORD: </b></td><td><?= isset($user->password) ? 'Có mật khẩu' : 'Rỗng nhé' ?></td></tr>
					<tr><td><b>FULL NAME: </b></td><td><?= $user->display_name ?></td></tr>
					<tr><td><b>EMAIL: </b></td><td><?= $user->email ?></td></tr>
					<tr><td><b>POSITION: </b></td><td><?= ($user->position== '1') ? 'Admin' : 'Member' ?></td></tr>
					<tr><td><b>STATUS: </b></td><td><?= ($user->status == '0') ? 'Hoạt động' : 'Bị khóa' ?></td></tr>
					<tr><td><b>CREATED: </b></td><td><?= $user->created_at ?></td></tr>
					<tr><td><b>UPDATED: </b></td><td><?= $user->updated_at ?></td></tr>
					<tr><td><b>FACEBOOK: </b></td><td><?= $user->facebook ?></td></tr>
					<tr><td><b>GOOGLE: </b></td><td><?= $user->google ?></td></tr>
					<tr><td><b>PHONE: </b></td><td><?= $user->phone ?></td></tr>
					<tr><td><b>DESCRIPTION: </b></td><td><?= $user->description ?></td></tr>
				<?php endforeach; session_destroy(); ?>
	</table>

</body>
</html>