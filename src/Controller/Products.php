<?php 
/**
* 
*/
class Products extends Controller
{
	protected $products;
	function __construct()
	{
		$this->products = $this->model('Product');
	}
	public function index(){
		//Lấy toàn bộ dữ liệu các bản ghi
		$products = Product::list();
		//Lấy tổng số lượng bản ghi
		$total_record = $products; 
		//Khai báo limit
		$limit = 10;
		//Tổng số trang
		$total_page = ceil($total_record/$limit);
		$_GET['total_page'] = $total_page;
		//Lấy trang hiện tại
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		$_GET['current_page'] = $current_page;
		//Giới hạn số trang từ 1->total_page
		if ($current_page > $current_page) {
			$current_page = $current_page;
		} else if($current_page < 1){
			$current_page = 1;
		}
		//Tìm start
		$start = ($current_page - 1) * $limit;
		//Lấy dữ liểu bản ghi limit
		$products = Product::list_limit($start,$limit);
		//Gọi đến trang hiển thị
		$this->view('admin/index/products/list',array('products' => $products));
	}















}//End class Products
?>