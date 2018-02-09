<?php
if (!defined('IN_SITE')) die ('The request not found');
?>
<table border="1" align="center">
	<tr><td colspan="9" align="center" bgcolor="yellow">
		<h1>LIST PRODUCT</h1>
		<a href="<?= $base_url.'/products/add' ?>">CREATE PRODUCT</a>
	</td></tr>
	<tr align="center">
		<td><b>NO</b></td>
		<td><b>ID</b></td>
		<td><b>CATELOGY</b></td>
		<td><b>IMAGE</b></td>
		<td><b>NAME</b></td>
		<td><b>PRICE</b></td>
		<td><b>VIEW</b></td>
		<td><b>EDIT</b></td>
		<td><b>DELETE</b></td>
	</tr>
	<?php  $dem = 0; foreach ($products as $product): ?>
	<tr align="center">
		<td><?= ++$dem; ?></td>
		<td><?= $product->id ?></a></td>
		<td><?= $product->catalog_id ?></td>
		<td><img src="<?= empty($product->image_link) ? '' : $base_url.'/public/'.$product->image_link ?>"></td>
		<td><?= $product->name ?></td>
		<td><?= $product->price ?></td>
		<td><?= $product->view ?></td>
		<td><a href="<?= $base_url.'/products/editbyid/'.$product->id ?>">Edit</a></td>
		<td><a href="<?= $base_url.'/products/delete/'.$product->id ?>" onclick="return onDel()">Delete</a></td>
	</tr>
<?php endforeach; ?>



<!--Phân trang-->

<tr><td colspan="9" align="center">
	<?php 
	$curr = $_GET['current_page'];
	$total = $_GET['total_page'];
	// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
	if ($curr > 10 && $total > 10){
		$_GET['page'] = $curr-10;
		echo '<a href="'.$base_url.'/products/list?page='.$_GET['page'].'">Prev</a> | ';
	}
	$k = $curr%10;
	$l = $curr - 10;
		// Lặp khoảng giữa
	for ($i = 1; $i <= 10; $i++){
    	// Nếu là trang hiện tại thì hiển thị thẻ span
   		// ngược lại hiển thị thẻ a
		
		if ($i === $k){
			echo '<span>'.$curr.'</span> | ';
		}
		if ($k == null) {
			$cur = $l+ $i;
			$_GET['page'] = $curr;
			echo '<a href="'.$base_url.'/products/list?page='.$_GET['page'].'">'.$cur.'</a> | ';
		}else if($i > $k){
				$cur = $curr + ($i - $k);
				$_GET['page'] = $cur;
				echo '<a href="'.$base_url.'/products/list?page='.$_GET['page'].'">'.$cur.'</a> | ';
			}else if($i < $k){
				$cur = $curr - ($k - $i);
				$_GET['page'] = $cur;
				echo '<a href="'.$base_url.'/products/list?page='.$_GET['page'].'">'.$cur.'</a> | ';
			}
	}
		// nếu current_page < $total_page và total_page > 1 mới hiển thị nút next
	if ($curr < $total && $total > 10){
		$_GET['page'] = $curr+10;
		echo '<a href="'.$base_url.'/products/list?page='.$_GET['page'].'">Next</a> ';
	}
	?>
</td></tr>

</table>