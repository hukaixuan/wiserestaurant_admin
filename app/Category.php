<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //大分类
    /**
	* 关联到模型的数据表 *
	* @var string
	*/
	protected $table = 'category';

	public $timestamps = false; //不使用时间戳

	// public function types()
	// {
	// 	# code...
	// 	return $this->hasMany('App\Type','type','id');  //与之关联的类，外键，内键
	// }

	public function goods(){
		return $this->hasMany('App\Good','category','id');
	}
	
}
