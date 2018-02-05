<?php define('IN_SITE',true);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="<?= COMMON['base_url'].'/public/css/styleAdmin.css' ?>" >
</head>
<body>
	<?php 
	include_once 'layout/header.php'; ?>
	<div id="container">
		<?php include_once 'layout/menuleft.php'; ?>
		<?php include_once 'layout/content.php'; ?>
		</div>
			<?php include_once 'layout/footer.php';	?>

