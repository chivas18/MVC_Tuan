<?php define('IN_SITE',true);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="<?= COMMON['base_url'].'/public/css/styleAdmin.css' ?>" >
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="<?= COMMON['base_url'].'/public/js/admin.js' ?>"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php 
	include_once 'layout/header.php'; ?>
	<div id="container">
		<?php include_once 'layout/menuleft.php'; ?>
		<div id="content">
			<?php
			include_once SRC.'Views/users/list.php';
			?>
		</div>
	</div>
	<?php include_once 'layout/footer.php';	?>

