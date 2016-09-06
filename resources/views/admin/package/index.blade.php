@extends('layouts.admin')

@section('content')
<!-- <div class="container">   -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">套餐管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <a href="{{ url('admin/package/create') }}" class="btn btn-lg btn-primary">新增</a>

                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>套餐名</th>
                                <th>介绍图</th>
                                <th>描述</th>
                                <th>包含菜品</th>
                                <th>折扣</th>
                                
                            </tr>
                        </thead>
                        <hr>
                        <tbody>
                            @foreach ($packages as $package)
                            <div class="package">
                                <div class="content">

                                    <tr>
                                        <td>{{ $package->name }}</td>
                                        <td>{{ $package->pic }}</td>
                                        <td>{{ $package->detail }}</td>
                                        <td>{{ $package->goodId }}</td>
                                        <td>{{ $package->discount }}</td>
                                        <td>
                                            <a href="{{ url('admin/package/'.$package->id.'/edit') }}" class="btn btn-success">编辑</a>
                                            <form action="{{ url('admin/package/'.$package->id) }}" method="POST" style="display: inline;">
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
                    {!!$packages->links()!!}    <!-- 分页链接 -->
                        

                </div>
            </div>
        </div>
    </div>
<!-- </div>   -->
@endsection