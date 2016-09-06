<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //套餐
    /**
	* 关联到模型的数据表 *
	* @var string
	*/
	protected $table = 'packages';

	public $timestamps = false; //不使用时间戳

}
