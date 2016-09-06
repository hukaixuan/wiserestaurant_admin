<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Type;
use App\Good;
use DB;

class TestController extends Controller
{
    //
	public function index()
	{
		# code...
		$goods = Good::paginate(5);  //分页显示
  //   	return View('test')->withGoods($goods);
		// $good = Good::find(198);
		// echo $good->type->name;
		return View('test',['goods'=>$goods]);
	}
}
