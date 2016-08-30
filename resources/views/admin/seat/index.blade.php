@extends('layouts.admin')

@section('content')
<div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">座位管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <a href="{{ url('admin/seat/create') }}" class="btn btn-lg btn-primary">新增</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>座号</th>
                                <th>座名</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                <hr>
                                <hr>
                                
                            @foreach ($seats as $seat)
                                <div class="seat">
                                    <div class="content">
                                        <tr>
                                            <td>{{$seat->id}}</td>
                                            <td>{{ $seat->name }}</td>
                                            
                                            <td>
                                                <a href="{{ url('admin/seat/create_a_qrcode/'.$seat->id) }}" class="btn">
                                                    生成二维码
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/seat/'.$seat->id.'/edit') }}" class="btn btn-success">编辑</a>
                                                <form action="{{ url('admin/seat/'.$seat->id) }}" method="POST" style="display: inline;">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger">删除</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </div>
                                </div>
                            @endforeach

                            <a href="{{url('admin/seat/create_qrcodes')}}" class="btn">
                                生成全部二维码
                            </a>
                            
                        </tbody>
                    </table>
                    {!!$seats->links()!!}    <!-- 分页链接 -->

                </div>
            </div>
        </div>
    </div>
</div>  
@endsection