<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //菜品分类
    /**
	* 关联到模型的数据表 *
	* @var string
	*/
	protected $table = 'type';

	public $timestamps = false; //不使用时间戳

	// public function category()
	// {
	// 	# code...
	// 	return $this->belongsTo('App\Category','id','')
	// }

	public function goods(){
		return $this->hasMany('App\Good','type_id','id');
	}
}
