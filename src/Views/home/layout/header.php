<div id="header">
	<?php if (isset($_SESSION['user'])): ?>
		<h1>Welcome member <label style="color: red"><?= $_SESSION['user']['username'] ?></label></h1>
		<div><a href="<?= COMMON['base_url'].'/home/logout' ?>">Logout</a></div>
	<?php else: ?>
		<div><a href="<?= COMMON['base_url'].'/login' ?>">Login</a></div>
	<?php endif ?>
	
</div>