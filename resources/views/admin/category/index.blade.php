@extends('layouts.admin')

@section('content')
<div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">其他分类管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <a href="{{ url('admin/category/create') }}" class="btn btn-lg btn-primary">新增</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>其他分类</th>
                                <th></th>
                            </tr>
                        </thead>
                                <hr>
                        <tbody>
                            @foreach ($categories as $category)
                                <div class="category">
                                    <div class="content">
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <form action="{{ url('admin/category/'.$category->id) }}" method="POST" style="display: inline;">
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
                    {!!$categories->links()!!}    <!-- 分页链接 -->

                </div>
            </div>
        </div>
    </div>
</div>  
@endsection