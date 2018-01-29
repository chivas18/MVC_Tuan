<?php
$base_url = COMMON['base_url'];
?>
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
	<div align="center" style="color: red"><h1><?= isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?></h1></div>
<table border="1" align="center">
	<tr><td colspan="8" align="center" bgcolor="yellow"><h1>LIST USER</h1></td></tr>
	<tr align="center">
		<td><b>NO</b></td>
		<td><b>USER NAME</b></td>
		<td><b>FULL NAME</b></td>
		<td><b>POSITION</b></td>
		<td><b>DESCRIPTION</b></td>
		<td><b>AVATAR</b></td>
		<td><b>Edit</b></td>
		<td><b>Delete</b></td>
	</tr>
<?php  $dem = 0; foreach ($users as $user): ?>
	<tr align="center">
		<td><?= ++$dem; ?></td>
		<td><a href="<?= $base_url.'/users/viewbyid/'.$user->id ?>"><?= $user->username ?></a></td>
		<td><?= $user->display_name ?></td>
		<td><?= ($user->position== '1') ? 'Admin' : 'Member' ?></td>
		<td><?= $user->description ?></td>
		<td><img src="<?= empty($user->url_avatar) ? 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/2000px-Flag_of_Vietnam.svg.png' : $user->url_avatar ?>"></td>
		<td><a href="">Edit</a></td>
		<td><a href="<?= $base_url.'/users/delete/'.$user->id ?>">Delete</a></td>
	</tr>
<?php endforeach; session_destroy(); ?>
</table>
</html>