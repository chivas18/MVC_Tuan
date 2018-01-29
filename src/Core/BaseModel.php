<?php 
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\contracts\Pagination\Paginator;
/**
* 
*/
class BaseModel extends Eloquent
{
	
	public function getTableName()
	{
		return with(new static)->getTable();
	}
}
 ?>