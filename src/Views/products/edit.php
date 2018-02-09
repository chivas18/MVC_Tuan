<?php
if (!defined('IN_SITE')) die ('The request not found');
?>
	<form method="POST" name="editForm" action="<?= $base_url ?>/users/updated" onsubmit="return onSubmit()">
		<table border="0" align="center">
			<?php foreach ($users as $user): ?>
				<tr><td colspan="3" align="center" bgcolor="yellow"><img src="<?= $base_url.'/public/'.$user->url_avatar ?>"><h1><?= $user->username ?></h1></td></tr>
				<input type="hidden" name="re-password" value="<?= $user->password ?>">
				<tr><td><b>FULL NAME: </b></td><td><input type="text" name="display_name" value="<?= $user->display_name ?>"></td><td align="center" style="color: red"><?= empty($_SESSION['err_message']) ? '' : $_SESSION['err_message']; ?></td></tr>
				<tr><td><b>EMAIL: </b></td><td><input type="text" name="email" value="<?= $user->email ?>"></td><td align="center" style="color: red"><?= empty($_SESSION['err_email']) ? '' : $_SESSION['err_email']; ?></td></tr>
				<!-- <tr><td><b>POSITION: </b></td><td><input type="radio" name="position" value="1">Admin<br />
					<input type="radio" name="position" value="0" checked="checked">Member
				</td></tr>
				<tr><td><b>STATUS: </b></td><td><input type="radio" name="status" value="1">Đang khóa<br />
					<input type="radio" name="status" value="0" checked="checked">Hoạt động
				</td></tr> -->
				<tr><td><b>FACEBOOK: </b></td><td><input type="text" name="facebook" value="<?= $user->facebook ?>"></td></tr>
				<tr><td><b>GOOGLE: </b></td><td><input type="text" name="google" value="<?= $user->google ?>"></td></tr>
				<tr><td><b>PHONE: </b></td><td><input type="number" name="phone" value="<?= $user->phone ?>"></td></tr>
				<tr><td><b>DESCRIPTION: </b></td><td><input type="" name="description" value="<?= $user->description ?>"></td></tr>
				<tr><td><b>PASSWORD: </b></td><td><input type="password" name="password"></td><td align="center" style="color: red"><?= empty($_SESSION['err_password']) ? '' : $_SESSION['err_password']; ?></td></tr>
			
				<tr><td><input type="hidden" name="id" value="<?= $user->id ?>"></td></tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Submit">  <input type="button" value="Back" onclick="history.back()"></td>
				</tr>
			<?php endforeach;unset($_SESSION['err_email']); ?>
		</table>
	</form>