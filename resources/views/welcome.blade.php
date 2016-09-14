@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <div class="panel-control"><h3>扫码下载客户端</h3></div>
                    <div class="panel-control"><img src="{{asset('/download/image/download.png')}}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
