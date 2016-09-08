@extends('layouts.admin')

@section('content')
<div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增菜品</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form enctype="multipart/form-data" action="{{ url('admin/good') }}" method="POST">
                        {!! csrf_field() !!}      <!-- 防止跨站伪造攻击csrf -->
                        <input type="text" name="name" class="form-control" required="required" placeholder="请输入菜名">
                        <br>                        
                        <input type="number" name="price" class="form-control" required="required" placeholder="请输入价格">
                        <br>                        
                        
                        <select name="type_id" class="form-control">
                            @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                        <br>                        
                        <input type="file" accpet="image/*" name="pic" class="form-control" placeholder="上传首页图片">
                        <br> 
                        <select name="isNew" class="form-control">
                            <option value="0">不推荐</option>
                            <option value="1">推荐</option>
                        </select>        
                        <br>               
                        <input type="text" name="detail" class="form-control" placeholder="详情">
                        <br>
                        <input type="file" accept="image/*" id="detailPics" name="detailPics" placeholder="添加详情图">添加详情图


                        <!-- <input type="text" name="isAvailable" class="form-control" required="required" placeholder="是否有货(1表示有货,0表示无货)"> -->
                        <!-- <select name="isAvailable" class="form-control">
                            <option value="1">有货</option>
                            <option value="0">无货</option>
                        </select> -->
                        <br>
                        <button class="btn btn-lg btn-info">新增</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>  
                     
@endsection