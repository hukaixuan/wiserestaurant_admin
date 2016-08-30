<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Response;
use App\Http\Controllers\Controller;
use App\Seat;
use Auth;
use DB;
use QrCode;

class SeatController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }


    public function index()
    {
        $seats = DB::table('seats')->paginate(5);        
    	return View('admin/seat/index')->withSeats($seats);
    }

    //新建
    public function create(){
    	return view('admin/seat/create');
    }

    // 存储
    public function store(Request $request){
    	$this -> validate($request,[
    			'id' => 'required|unique:seats|max:255',
    			'name' => 'required',
    		]);
    	$Seat = new Seat;
    	$Seat->id = $request->get('id');
    	$Seat->name = $request->get('name');

    	if ($Seat->save()) {
    		return redirect('admin/seat');
    	} else{
    		return redirect()->back()->withInput()->withErrors('保存失败！');
    	}
    }


    //编辑
    public function edit($id){
    	return view('admin/seat/edit')->withSeat(Seat::find($id));
    }
    public function update(Request $request, $id){
    	$this -> validate($request,[
    			'id' => 'required|max:255',
    			'name' => 'required',
    		]);
    	$Seat = Seat::find($id);
    	$Seat->id = $request->get('id');
    	$Seat->name = $request->get('name');

    	if ($Seat->save()) {
    		return redirect('admin/seat');
    	} else{
    		return redirect()->back()->withInput()->withErrors('修改失败！');
    	}
    }


    //删除
    public function destroy($id){
    	if (Seat::find($id)->delete()) {
    		return redirect()->back()->withInput()->withErrors('删除成功！');
    	}else{
    		return redirect()->back()->withInput()->withErrors('删除失败！');
    	}
    }

    //生成单个二维码并下载
    public function create_a_qrcode($id)
    {
        # code...
        QrCode::format('png')->size(200)->generate('http://121.42.198.119/welcome/'.$id,public_path('download/qrcodes/'.$id.'.png'));
        return response()->download('download/qrcodes/'.$id.'.png');
        // return redirect()->back()->withInput();
    }

    //生成全部二维码
    public function create_qrcodes()
    {
        # code...
        $seats = DB::table('seats')->get();
        foreach ($seats as $seat) {
            # code...
            QrCode::format('png')->size(200)->generate('http://121.42.198.119/welcome/'.$seat->id,public_path('download/qrcodes/'.$seat->id.'.png'));
        }
        return view('admin/seat/all_qrcode')->withSeats($seats);
    }
}














