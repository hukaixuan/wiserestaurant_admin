@foreach( $goods as $good)
	{{$good->name}} &nbsp; {{$good->type->name}} <br>
@endforeach