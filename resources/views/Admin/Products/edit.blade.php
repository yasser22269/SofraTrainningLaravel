@extends('Admin.layouts.app')

@section('title', 'Edit Products Home')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">المنتاجات</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item"><a href="{{ route('Admin.Products.index') }}">المنتاجات</a></li>
          <li class="breadcrumb-item active">اضافة</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form role="form" method="post" action="{{ route('Admin.Products.update',$Product->id) }}"enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type="hidden" name="id" value="{{ $Product->id}}">
                <div class="card-content">
                    <div class="form-group">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="title" value="{{ $Product->title}}">
                        @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                       @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">content</label>
                        <textarea cols="30" rows="10" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter content" name="content" value="{{ old('content') }}">{{ $Product->content}}</textarea>
                        @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                       @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">price</label>
                        <textarea cols="1" rows="1" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter price" name="price" value="{{ old('price') }}">{{ $Product->price}}</textarea>
                        @if ($errors->has('price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                       @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">price_offer</label>
                        <textarea cols="1" rows="1" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter price_offer" name="price_offer" value="{{ old('price_offer') }}">{{ $Product->price_offer}}</textarea>
                        @if ($errors->has('price_offer'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price_offer') }}</strong>
                        </span>
                       @endif
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Processing_time</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Processing_time" name="Processing_time" value="{{ $Product->Processing_time}}">
                        @if ($errors->has('Processing_time'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Processing_time') }}</strong>
                        </span>
                       @endif
                      </div>
                      <div class="form-group">
                        <label>restaurant</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"  tabindex="-1" aria-hidden="true" name="restaurant_id" value="{{ old('restaurant_id') }}">

                            @foreach ($restaurants as $restaurant)
                          <option {{ ($restaurant->id ==$Product->restaurant_id)?'selected':'' }} value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                          @endforeach

                        </select>
                        @if ($errors->has('restaurant_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('restaurant_id') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Photo</label>
                        <input type="file"  name="Photo" class="form-control">
                        @if ($errors->has('Photo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Photo') }}</strong>
                        </span>
                       @endif
                      </div>
                      @if($Product->Photo)
                      <img src="{{ asset('Photos/Product/'.$Product->Photo) }}"style='width:100px'class='img-thumbnail' alt="">
                      @endif
                </div>
                <!-- /.card-content -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
        </div>

</div>
</div>

  @endsection

