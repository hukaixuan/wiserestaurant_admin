<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    //菜品类
    /**
	* 关联到模型的数据表 *
	* @var string
	*/
	protected $table = 'goods';

	public function category()
	{
		# code...
		return $this->belongsTo('App\Category','category_id','id');
	}

	public function type()
	{
		# code...
		return $this->belongsTo('App\Type','type_id','id');
	}


}
