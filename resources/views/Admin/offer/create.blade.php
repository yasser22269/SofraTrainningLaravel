@extends('Admin.layouts.app')

@section('title', 'Add offer Home')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">العروض</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item"><a href="{{ route('Admin.offers.index') }}">العروض</a></li>
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
            <form role="form" method="POST" action="{{ route('Admin.offers.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="restaurant_id"value="{{ auth('res')->user()->id }}">

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Photo</label>
                       <input type="file" name="Photo"class="form-control">
                       @if ($errors->has('Photo'))
                       <span class="help-block">
                           <strong>{{ $errors->first('Photo') }}</strong>
                       </span>
                      @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                       @endif
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">body</label>
                        <textarea name="body" class="form-control"placeholder="Enter body"></textarea>
                        @if ($errors->has('body'))
                        <span class="help-block">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                       @endif
                    </div>
                    <div class="form-group">
                        <label>Date from:</label>
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="from">
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                          @if ($errors->has('from'))
                          <span class="help-block">
                              <strong>{{ $errors->first('from') }}</strong>
                          </span>
                         @endif
                      </div>
                      <div class="form-group">
                        <label>Date To:</label>
                          <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="to">
                              <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                          @if ($errors->has('to'))
                          <span class="help-block">
                              <strong>{{ $errors->first('to') }}</strong>
                          </span>
                         @endif
                      </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
        </div>

</div>
</div>

  @endsection

