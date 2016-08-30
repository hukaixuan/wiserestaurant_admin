@extends('layouts.admin')

@section('content')
<div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">菜品分类管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <a href="{{ url('admin/type/create') }}" class="btn btn-lg btn-primary">新增</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>菜品分类</th>
                                <th></th>
                            </tr>
                        </thead>
                                <hr>
                        <tbody>
                            @foreach ($types as $type)
                                <div class="type">
                                    <div class="content">
                                        <tr>
                                            <td>{{$type->id}}</td>
                                            <td>{{ $type->name }}</td>
                                            <td>
                                                <form action="{{ url('admin/type/'.$type->id) }}" method="POST" style="display: inline;">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger">删除</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </div>
                                </div>
                            @endforeach
                            
                        </tbody>
                    </table>
                    {!!$types->links()!!}    <!-- 分页链接 -->

                </div>
            </div>
        </div>
    </div>
</div>  
@endsection