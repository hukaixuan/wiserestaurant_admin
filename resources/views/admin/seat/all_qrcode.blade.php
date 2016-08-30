@extends('layouts.admin')

@section('content')
<div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
           @foreach($seats as $seat)
            <div class="cur-right">
                {{$seat->id}}
                <img src="{{url('download/qrcodes/'.$seat->id.'.png')}}">                
            </div>
           @endforeach
        </div>
    </div>
</div>  
@endsection