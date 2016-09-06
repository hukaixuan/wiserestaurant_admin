@extends('layouts.admin')


@section('content')
<div class="container">  
    
  <div class="grid">
     <div class="row col-md-12" >
        <a href="{{ url('admin/good') }}" >
          <div class="tile tile-alizarin col-md-3 col-xs-12"  >
              <h1>管理菜品</h1>
          </div>
        </a>
        <a href="{{ url('admin/other') }}">
          <div class="tile tile-emerald col-md-3 col-xs-12"  >
            <h1>管理其他</h1>
          </div>
        </a>
        <a href="{{ url('admin/seat') }}">
          <div class="tile tile-turquoise col-md-3 col-xs-12"  >
            <h1>管理座位</h1>
          </div>
        </a>
        <a href="{{ url('admin/type') }}">
          <div class="tile tile-amethyst col-md-3 col-xs-12"  >
            <h1>管理菜品分类</h1>
          </div>
        </a>
      </div>
      <div class="row col-md-12"></div>
      <div class="row col-md-12"></div>
      <div class="row col-md-12">
        <a href="{{ url('admin/category') }}">
          <div class="tile col-md-3 col-xs-12"  >
            <div class="tile-content">
              <!-- <div class="tile-icon-large">
                <img src="images/twittertile.png">
              </div> -->
            </div>
                <span class="tile-label">
                    <h1>管理其他分类</h1>
                </span>
          </div>
        </a>
        <a href="{{ url('admin/package') }}">
          <div class="tile tile-clouds col-md-3 col-xs-12"  >
                <span class="tile-label">
                    <h1>管理套餐</h1>
                </span>
          </div>
        </a>
          <!-- <div class="tile tile-carrot col-md-6 col-xs-12">
          <div class="tile-content">
              <div class="tile-icon-large">
                <img src="images/twittertile.png">
              </div>
            </div>
            <span class="tile-label">Tile 3</span>
          </div> -->
      </div>
      <!-- <div class="row col-md-12"></div>
      <div class="row col-md-12"></div>
      <div class="row col-md-12">
          <div class="tile tile-alizarin col-md-3 col-xs-12"  >
            <span class="tile-label">Tile 4</span>
          </div>
          <div class="tile tile-danger col-md-3 col-xs-12"  >
            <span class="tile-label">Tile 5</span>
          </div>
      </div> -->
    </div>

    

@endsection
