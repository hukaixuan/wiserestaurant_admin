@extends('layouts.admin')

@section('content')
<div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增一张桌子</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/seat') }}" method="POST">
                        {!! csrf_field() !!}      <!-- 防止跨站伪造攻击csrf -->
                        <input type="number" name="id" class="form-control" required="required" placeholder="请输入桌号">
                        <br>
                        <textarea name="name" rows="10" class="form-control" required="required" placeholder="请输入桌名"></textarea>
                        <br>
                        <button class="btn btn-lg btn-info">新增</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>  
@endsection