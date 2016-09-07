<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
        //返回指定数量的值，用于分页
        $categories = DB::table('category')->paginate(5);
    	return View('admin/category/index')->withCategories($categories);
    }

    //新建
    public function create(){
    	return view('admin/category/create');
    }

    // 存储
    public function store(Request $request){
    	$this -> validate($request,[
    			'name' => 'required',
    		]);
    	$Category = new Category;
    	$Category->name = $request->get('name');

    	if ($Category->save()) {
    		return redirect('admin/category');
    	} else{
    		return redirect()->back()->withInput()->withErrors('保存失败！');
    	}
    }


    //删除
    public function destroy($id){
    	if (Category::find($id)->delete()) {
    		return redirect()->back()->withInput()->withErrors('删除成功！');
    	}else{
    		return redirect()->back()->withInput()->withErrors('删除失败！');
    	}
    }

}
