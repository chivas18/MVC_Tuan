<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<style type="text/css">
	img{
		width: 60px;
		height: 60px;
	}
</style>
</head>
<body>
	<table border="0" align="center">
					<?php foreach ($users as $user): ?>
					<tr><td colspan="2" align="center" bgcolor="yellow"><h1><?= $user->username ?></h1></td></tr>
					<tr><td><b>PASSWORD: </b></td><td><?= isset($user->password) ? 'Có mật khẩu' : 'Rỗng nhé' ?></td></tr>
					<tr><td><b>FULL NAME: </b></td><td><?= $user->display_name ?></td></tr>
					<tr><td><b>EMAIL: </b></td><td><?= $user->email ?></td></tr>
					<tr><td><b>POSITION: </b></td><td><?= ($user->position== '1') ? 'Admin' : 'Member' ?></td></tr>
					<tr><td><b>STATUS: </b></td><td><?= ($user->status == '0') ? 'Hoạt động' : 'Bị khóa' ?></td></tr>
					<tr><td><b>DATE CREATED: </b></td><td><?= $user->date_created ?></td></tr>
					<tr><td><b>FACEBOOK: </b></td><td><?= $user->facebook ?></td></tr>
					<tr><td><b>GOOGLE: </b></td><td><?= $user->google ?></td></tr>
					<tr><td><b>PHONE: </b></td><td><?= $user->phone ?></td></tr>
					<tr><td><b>DESCRIPTION: </b></td><td><?= $user->description ?></td></tr>
					<tr><td><b>AVATAR: </b></td><td><img src="<?= $user->url_avatar ?>" title="Tao là Admin"></td></tr>
				<?php endforeach; ?>
	</table>

</body>
</html>