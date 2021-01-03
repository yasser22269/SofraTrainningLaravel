@extends('Admin.layouts.app')

@section('title', 'Add User Home')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">الاعضاء</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item"><a href="{{ route('Admin.users.index') }}">الاعضاء</a></li>
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
            <form role="form" method="POST" action="{{ route('Admin.users.store') }}">
                {{ csrf_field() }}

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                       @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">phone</label>
                        <input type="tel" class="form-control" id="exampleInputEmail1" placeholder="Enter phone" name="phone" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                       @endif
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                   @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="{{ old('password') }}">
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Data Of Birth:</label>

                    <div class="input-group">

                      <input type="date" class="form-control" name="data_of_birth" value="{{ old('data_of_birth') }}">
                    </div>
                    <!-- /.input group -->
                    @if ($errors->has('data_of_birth'))
                    <span class="help-block">
                        <strong>{{ $errors->first('data_of_birth') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Last Donation Date:</label>

                    <div class="input-group">

                      <input type="date" class="form-control reservation"name="last_donation_date" value="{{ old('last_donation_date') }}">
                    </div>
                    <!-- /.input group -->
                    @if ($errors->has('last_donation_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_donation_date') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Blood Type</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"  tabindex="-1" aria-hidden="true" name="blood_type_id" value="{{ old('blood_type_id') }}">

                        @foreach ($blood_types as $blood_type)
                      <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                      @endforeach

                    </select>
                    @if ($errors->has('blood_type_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('blood_type') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>City</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"  tabindex="-1" aria-hidden="true" name="city_id" value="{{ old('city_id') }}">

                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{  $city->governorate->name }} -- {{  $city->name }}</option>
                        @endforeach

                    </select>
                    @if ($errors->has('city_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                    @endif
                  </div>


                  <div class="form-group">
                    <label>Roles</label>

                    <div class="checkbox">
                        <input type="checkbox" name="roles[]"
                        value='1'
                        > User
                    </div>

                    <div class="checkbox">
                        <input type="checkbox" name="roles[]"
                        value='2'

                        > Super Admin
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" name="roles[]"
                        value='3'
                        > Admin
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-12">
                      <!-- Custom Tabs -->
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">permissions</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            @php
                                $models = ['posts','categories'];
                                $maps = ['create','read','update','delete'];

                            @endphp

                            @foreach ($models as $items=>$model)
                            <li class="nav-item"><a class="nav-link {{ $items == 0 ? 'active' : '' }}" href="#{{ $model }}" data-toggle="tab">{{ $model }}</a></li>

                            @endforeach

                            </li>
                          </ul>

                          <br>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            @foreach ($models as $items=>$model)
                            <div class="tab-pane {{ $items == 0 ? 'active' : '' }}" id="{{ $model }}">
                                @foreach ($maps as $map)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"name='permissions[]'value='{{$map . '_'. $model }}' id="exampleCheck1">
                                    <label class="form-check-label " for="exampleCheck1">{{ $map }}</label>




                                  </div>
                                  @endforeach

                            </div>
                              @endforeach

                          </div>
                          <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                      </div>
                      <!-- ./card -->
                    </div>
                    <!-- /.col -->
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

