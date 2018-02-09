<?php 
/**
* 
*/
class Product extends BaseModel
{
	protected $table = 'products';
	protected $fillable = ['id', 'catalog_id', 'name', 'price', 'content', 'discount', 'image_link', 'image_list', 'created_at', 'updated_at', 'view'];
	public static function list()
	{
		//Lấy toàn bộ dữ liệu các bản ghi
		$products = Product::find(1)->get()->count();
		return $products;
	}
	public static function list_limit($start,$limit)
	{
		//Lấy dữ liệu từ start đến limit
		$products = Product::find(1)->offset($start)->take($limit)->get();
		return $products;
	}











}//End class Product
?>