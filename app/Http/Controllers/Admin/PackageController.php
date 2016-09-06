<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Package;
use App\Good;

class PackageController extends Controller
{
    //
    public function index()
    {
    	# code...
    	$packages = Package::paginate(5);
    	return view('admin/package/index')->withPackages($packages);
    }

    //新建
    public function create(){
    	return view('admin/package/create')->withGoods(Good::all());
    }

    // 存储
    public function store(Request $request){
    	$this -> validate($request,[
    			'name' => 'required',
    			// 'goodId' => 'required',
    		]);
    	$Package = new Package;
    	$Package->name = $request->get('name');
    	$Package->discount = $request->get('discount');
    	$Package->detail = $request->get('detail');
    	$goodIdArray = $request->get('goodId');
    	$goodIdString = '';
    	foreach ($goodIdArray as $goodId) {
    		# code...
    		if ($goodIdString=='') {
    			$goodIdString = $goodId;
    		} else {
    			$goodIdString = $goodIdString.'_'.$goodId;
    			
    		}
    		
    	}
    	$Package->goodId = $goodIdString;
        //保存图片
        $pic = $request->file('pic');
        if (is_null($pic)) {
            $Package->pic = '待上传';
        } else {
            $filedir = "images/";   //上传图片的存放路径
            $image_name=$pic->getClientOriginalName(); //获取上传图片的文件名
            $pic->move($filedir,$image_name); //使用move 方法移动文件.
            $Package->pic = $filedir.$image_name;

        }
        
    	if ($Package->save()) {
    		return redirect('admin/package');
    	} else{
    		return redirect()->back()->withInput()->withErrors('保存失败！');
    	}
    }


    //编辑
    public function edit($id){
    	return view('admin/package/edit')->withPackage(Package::find($id))->withGoods(Good::all());
    }
    public function update(Request $request, $id){
    	$this -> validate($request,[
    			'name' => 'required',  //email exists filled image in prsesnt regex required required_if required_unless required_with required_with_all same size
    		]);
    	$Package = Package::find($id);
    	$Package->name = $request->get('name');
    	$Package->discount = $request->get('discount');
    	$Package->detail = $request->get('detail');
    	$goodIdArray = $request->get('goodId');
    	$goodIdString = $Package->goodId;
    	foreach ($goodIdArray as $goodId) {
    		# code...
    		if ($goodIdString=='') {
    			$goodIdString = $goodId;
    		} else {
    			$goodIdString = $goodIdString.'_'.$goodId;
    			
    		}
    		
    	}
    	$Package->goodId = $goodIdString;
        //保存图片
        $pic = $request->file('pic');
        if (is_null($pic)) {
            if ($request->get('pic')=='待上传') {
                $Package->pic = '待上传';
                
            }
        } else {
            $filedir = "images/";
            $image_name=$pic->getClientOriginalName(); //获取上传图片的文件名
            $pic->move($filedir,$image_name); //使用move 方法移动文件.
            $Package->pic = $filedir.$image_name;

        }
        
    	if ($Package->save()) {
    		return redirect('admin/package');
    	} else{
    		return redirect()->back()->withInput()->withErrors('修改失败！');
    	}
    }


    //删除
    public function destroy($id){
    	if (Package::find($id)->delete()) {
    		return redirect()->back()->withInput()->withErrors('删除成功！');
    	}else{
    		return redirect()->back()->withInput()->withErrors('删除失败！');
    	}
    }

}
