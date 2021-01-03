@extends('Admin.layouts.app')

@section('title', 'Edit setting Home')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">الاعدادت</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item active">الاعدادت</li>
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
            <form role="form" method="POST" action="{{ route('Admin.setting.update',$setting->id) }}">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type="hidden" name="id" value="{{ $setting->id}}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">commission</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter commission" name="commission" value="{{ $setting->commission}}">
                        @if ($errors->has('commission'))
                        <span class="help-block">
                            <strong>{{ $errors->first('commission') }}</strong>
                        </span>
                       @endif
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">accounts_bank</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter accounts_bank" name="accounts_bank" value="{{ $setting->accounts_bank}}">
                        @if ($errors->has('accounts_bank'))
                        <span class="help-block">
                            <strong>{{ $errors->first('accounts_bank') }}</strong>
                        </span>
                       @endif
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">about_us</label>
                        <textarea cols="30" rows="10" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter about_us" name="about_us" value="{{ old('about_us') }}">{{ $setting->about_us}}</textarea>
                        @if ($errors->has('about_us'))
                        <span class="help-block">
                            <strong>{{ $errors->first('about_us') }}</strong>
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

