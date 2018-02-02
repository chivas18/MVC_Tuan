<?php
$base_url = COMMON['base_url'];
?>
<!DOCTYPE html>
<html>
<head>

	<title>Home Page</title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<style type="text/css">
	img{
		width: 60px;
		height: 60px;
	}
	a:link {
		color:#000000;
		background-color:transparent;
		text-decoration:none;
	}
	a:visited {
		color:#000000;
		background-color:transparent;
		text-decoration:underline;
	}
	a:hover {
		color:#ff0000;
		background-color:transparent;
		text-decoration:underline;
	}
	a:active {
		color:blue;
		background-color:transparent;
		text-decoration:underline;
	}
</style>
<script type="text/javascript">
	function onDel() {
		if(confirm("Are you sure you want to do this?") == true){
			$(function(){
				$('a').attr('href');
			});
		}else{
			$(function(){
				$('a').attr('href','<?= $base_url ?>/users/list/');
			});
		}
	}
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div align="center" style="color: red"><h1><?= isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?></h1></div>
	<table border="1" align="center" width="1000px">
		<tr><td colspan="8" align="center" bgcolor="yellow">
			<h1>LIST USER</h1>
			<a href="<?= $base_url.'/users/add' ?>">CREATE USER</a>
		</td></tr>
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
			<td><img src="<?= empty($user->url_avatar) ? '' : $base_url.'/public/'.$user->url_avatar ?>"></td>
			<td><a href="<?= $base_url.'/users/editbyid/'.$user->id ?>">Edit</a></td>
			<td><a href="<?= $base_url.'/users/delete/'.$user->id ?>" onclick="return onDel()">Delete</a></td>
		</tr>
	<?php endforeach; session_destroy(); ?>
	<tr><td colspan="8" align="center">
		<?php 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
		if ($_GET['current_page'] > 1 && $_GET['total_page'] > 1){
			$_GET['page'] = $_GET['current_page']-1;
			echo '<a href="'.$base_url.'/users/list?page='.$_GET['page'].'">Prev</a> | ';
		}

		// Lặp khoảng giữa
		for ($i = 1; $i <= $_GET['total_page']; $i++){
    	// Nếu là trang hiện tại thì hiển thị thẻ span
   		// ngược lại hiển thị thẻ a
			if ($i == $_GET['current_page']){
				echo '<span>'.$i.'</span> | ';
			}
			else{
				$_GET['page'] = $i;
				echo '<a href="'.$base_url.'/users/list?page='.$_GET['page'].'">'.$i.'</a> | ';
			}
		}

		// nếu current_page < $total_page và total_page > 1 mới hiển thị nút next
		if ($_GET['current_page'] < $_GET['total_page'] && $_GET['total_page'] > 1){
			$_GET['page'] = $_GET['current_page']+1;
			echo '<a href="'.$base_url.'/users/list?page='.$_GET['page'].'">Next</a> | ';
		}
		?>
	</td></tr>
	
</table>
</body>
</html>