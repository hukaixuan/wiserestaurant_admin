<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Type;

class TestController extends Controller
{
    //
	public function index()
	{
		# code...
		return view('test')->withGoods(Type::find(2)->goods);
	}
}
