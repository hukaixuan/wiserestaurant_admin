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


    //菜品
    public function index()
    {
        // $goods = DB::table('goods')->paginate(5);  //分页显示  //用了分页无法用模型关联了
     //    $goods = Good::paginate(5);    //得用基于Eloquent模型的分页才能用模型的关联
    	// return View('admin/good/index')->withGoods($goods);
        $goods = Good::where('category_id',1)->paginate(5);
        return View('admin/good/index')->withGoods($goods)->withTypes(Type::all());
    }
    //其他
    public function other()
    {
        $goods = Good::where('category_id','<>',1)->paginate(5);
        return View('admin/other/index')->withGoods($goods)->withCategories(Category::where('id','<>',1)->get());
    }
    //根据菜品分类得到菜品
    public function get_good_by_type($type_id)
    {
        $goods = Good::where('category_id',1)->where('type_id',$type_id)->paginate(5);
        return View('admin/good/index')->withGoods($goods)->withTypes(Type::all());
    }
    //根据category得到其他
    public function get_good_by_category($category_id)
    {
        $goods = Good::where('category_id',$category_id)->paginate(5);
        return View('admin/other/index')->withGoods($goods)->withCategories(Category::where('id','<>',1)->get());
    }

    //新建
    public function create(){
    	return view('admin/good/create')->withTypes(Type::all())->withCategories(Category::all());
    }

    // 存储
    public function store(Request $request){
    	$this -> validate($request,[
    			'name' => 'required',
    			'type_id' => 'required',
    			'price' => 'required',
    		]);
    	$Good = new Good;
    	$Good->name = $request->get('name');
    	$Good->type_id = $request->get('type_id');
    	$Good->price = $request->get('price');
    	$Good->detail = $request->get('detail');
    	$Good->isNew = $request->get('isNew');
    	$Good->category_id = $request->get('category_id');
        //保存图片
        $pic = $request->file('pic');
        if (is_null($pic)) {
            $Good->pic = '待上传';
        } else {
            $filedir = "/images/";   //上传图片的存放路径
            $image_name=$pic->getClientOriginalName(); //获取上传图片的文件名
            $pic->move($filedir,$image_name); //使用move 方法移动文件.
            $Good->pic = $filedir.$image_name;

        }

        //详情图
        $detailPic = $request->file('detailPics');
        if (is_null($detailPic)) {
            if ($request->get('detailPic')=='待上传') {
                $Good->pic = '待上传';
                
            }
        } else {
            $filedir = "images/";
            $image_name2=$detailPic->getClientOriginalName(); //获取上传图片的文件名
            $detailPic->move($filedir,$image_name2); //使用move 方法移动文件.
            if ($Good->detailPics) {
                # 如果数据库中以前存储的detailPics不为空
                $Good->detailPics = $Good->detailPics.'#'.$filedir.$image_name2;
            } else {
                # code...
                $Good->detailPics = $filedir.$image_name2;
            }
            
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
    			'type_id' => 'required',
    			'price' => 'required',
    		]);
    	$Good = Good::find($id);
    	$Good->name = $request->get('name');
    	$Good->type_id = $request->get('type_id');
    	$Good->price = $request->get('price');
    	$Good->detail = $request->get('detail');
    	$Good->isNew = $request->get('isNew');
    	$Good->category_id = $request->get('category_id');
        //保存图片
        $pic = $request->file('pic');
        if (is_null($pic)) {
            if ($request->get('pic')=='待上传') {
                $Good->pic = '待上传';
                
            }
        } else {
            $filedir = "images/";
            $image_name=$pic->getClientOriginalName(); //获取上传图片的文件名
            $pic->move($filedir,$image_name); //使用move 方法移动文件.
            $Good->pic = $filedir.$image_name;

        }
        //详情图
        $detailPic = $request->file('detailPics');
        if (is_null($detailPic)) {
            if ($request->get('detailPic')=='待上传') {
                $Good->pic = '待上传';
                
            }
        } else {
            $filedir = "images/";
            $image_name2=$detailPic->getClientOriginalName(); //获取上传图片的文件名
            $detailPic->move($filedir,$image_name2); //使用move 方法移动文件.
            if ($Good->detailPics) {
                # 如果数据库中以前存储的detailPics不为空
                $Good->detailPics = $Good->detailPics.'#'.$filedir.$image_name2;
            } else {
                # code...
                $Good->detailPics = $filedir.$image_name2;
            }
            
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
