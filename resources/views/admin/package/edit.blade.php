@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">编辑菜品</div>
                <div class="panel-body">
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>编辑失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form enctype="multipart/form-data" action="{{ url('admin/package/'.$package->id) }}" method="POST">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <input type="text" name="name" class="form-control" required="required" placeholder="请输入套餐名" value="{{$package->name}}">
                        <br>                        

                        <img src="{{asset($package->pic)}}" alt="">                                         
                        <input type="file" accpet="image/*" name="pic" class="form-control" placeholder="上传介绍图片">
                        <br> 
                                 
                        <input type="text" name="detail" class="form-control" placeholder="详情" value="{{$package->detail}}">
                        <br>
                        <input type="number" name="discount" class="form-control" placeholder="折扣" value="{{$package->discount}}">
                        <br>
                        <br>
                        <div >
                            <h4>{{$package->goodId}}</h4>
                            <h3>选择菜品</h3>    
                            @foreach($goods as $good)
                                <input type="checkbox" name="goodId[]" value="{{$good->id}}">{{$good->name}}&nbsp;
                            @endforeach
        
                        </div>
                        
                        <button class="btn btn-lg btn-info">提交修改</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection