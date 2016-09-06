@extends('layouts.admin')

@section('content')
<!-- <div class="container">   -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">菜品管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <a href="{{ url('admin/good/create') }}" class="btn btn-lg btn-primary">新增</a>

                    
                    
                <div class="tabbable" id="tabs-705343">
                    <ul class="nav nav-tabs">
                    <li><a href="{{url('admin/other')}}">全部其他分类</a></li>
                        @foreach ($categories as $category)
                        <li>
                             <a href="{{url('admin/get_good_by_category/'.$category->id)}}" >{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        
                        <div class="tab-pane active" id="{{$category->id}}">
                            <p>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>商品名</th>
                                            <th>价格</th>
                                            <th>大分类</th>
                                            <th>菜品类别</th>
                                            <th>图片</th>
                                            <th>是否推荐</th>
                                            <th>详情</th>
                                            <th>详情图片</th>
                                        </tr>
                                    </thead>
                                    <hr>
                                    <tbody>
                                        @foreach ($goods as $good)
                                        <div class="good">
                                            <div class="content">

                                                <tr>
                                                    <td>{{ $good->name }}</td>
                                                    <td>{{ $good->price }}</td>
                                                    <td>{{ $good->category->name }}</td>
                                                    <td>{{ $good->type->name }}</td>
                                                    <td><img src="{{ asset($good->pic) }}" alt="" width="60px" height="60px"></td>
                                                    @if($good->isNew)
                                                        <td>推荐</td>
                                                    @else
                                                        <td>未推荐</td>
                                                    @endif
                                                    <td>{{ $good->detail }}</td>
                                                    @foreach (explode('#',$good->detailPics) as $detailPic )
                                                        @if ($detailPic)
                                                        <td><img src="{{ asset($detailPic) }}" alt="" width="60px" height="60px">{{$detailPic}}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>
                                                        <a href="{{ url('admin/good/'.$good->id.'/edit') }}" class="btn btn-success">编辑</a>
                                                        <form action="{{ url('admin/good/'.$good->id) }}" method="POST" style="display: inline;">
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
                            </p>
                        {!!$goods->links()!!}    <!-- 分页链接 -->
                        </div>
                        
                    </div>

                    
                        

                </div>
            </div>
        </div>
    </div>
<!-- </div>   -->
@endsection