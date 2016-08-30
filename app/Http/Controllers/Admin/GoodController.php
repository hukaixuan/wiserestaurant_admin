<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Good;
use App\Type;
use App\Category;
use DB;

class GoodController extends Controller
{
    //
    // public function __construct()
    // {
        
    // }


    public function index()
    {
        $goods = DB::table('goods')->paginate(5);  //分页显示
    	return View('admin/good/index')->withGoods($goods);
    }

    //新建
    public function create(){
    	return view('admin/good/create')->withTypes(Type::all())->withCategories(Category::all());
    }

    // 存储
    public function store(Request $request){
    	$this -> validate($request,[
    			'name' => 'required',
    			'type' => 'required',
    			'price' => 'required',
    		]);
    	$Good = new Good;
    	$Good->name = $request->get('name');
    	$Good->type = $request->get('type');
    	$Good->price = $request->get('price');
    	$Good->detail = $request->get('detail');
    	$Good->isNew = $request->get('isNew');
    	$Good->category = $request->get('category');
        //保存图片
        $pic = $request->file('pic');
        if (is_null($pic)) {
            $Good->pic = '待上传';
        } else {
            $filedir = "upload/good_img/";
            $image_name=$pic->getClientOriginalName(); //获取上传图片的文件名
            $pic->move($filedir,$image_name); //使用move 方法移动文件.
            $Good->pic = $filedir.$image_name;

        }
        
    	if ($Good->save()) {
    		return redirect('admin/good');
    	} else{
    		return redirect()->back()->withInput()->withErrors('保存失败！');
    	}
    }


    //编辑
    public function edit($id){
    	return view('admin/good/edit')->withGood(Good::find($id))->withTypes(Type::all())->withCategories(Category::all());
    }
    public function update(Request $request, $id){
    	$this -> validate($request,[
    			'name' => 'required',  //email exists filled image in prsesnt regex required required_if required_unless required_with required_with_all same size
    			'type' => 'required',
    			'price' => 'required',
    		]);
    	$Good = Good::find($id);
    	$Good->name = $request->get('name');
    	$Good->type = $request->get('type');
    	$Good->price = $request->get('price');
    	$Good->detail = $request->get('detail');
    	$Good->isNew = $request->get('isNew');
    	$Good->category = $request->get('category');
        //保存图片
        $pic = $request->file('pic');
        if (is_null($pic)) {
            if ($request->get('pic')=='待上传') {
                $Good->pic = '待上传';
                
            }
        } else {
            $filedir = "upload/good_img/";
            $image_name=$pic->getClientOriginalName(); //获取上传图片的文件名
            $pic->move($filedir,$image_name); //使用move 方法移动文件.
            $Good->pic = $filedir.$image_name;

        }
    	if ($Good->save()) {
    		return redirect('admin/good');
    	} else{
    		return redirect()->back()->withInput()->withErrors('修改失败！');
    	}
    }


    //删除
    public function destroy($id){
    	if (Good::find($id)->delete()) {
    		return redirect()->back()->withInput()->withErrors('删除成功！');
    	}else{
    		return redirect()->back()->withInput()->withErrors('删除失败！');
    	}
    }
}
