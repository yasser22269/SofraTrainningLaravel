@extends('Admin.layouts.app')

@section('title', 'show donation Home')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">الاميل</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item"><a href="{{ route('Admin.donation_reguest.index') }}">التبرعات</a></li>
          <li class="breadcrumb-item active">مشاهده</li>
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

                <input type="hidden" name="id" value="{{ $donation->id}}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name : </label>
                            {{ $donation->name}}

                      </div>

                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">phone : </label>
                            {{ $donation->phone}}

                      </div>

                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">age : </label>
                            {{ $donation->age}}

                      </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">hospital address : </label>
                            {{ $donation->hospital_address}}

                      </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">notes : </label>
                            {{ $donation->notes}}

                      </div>

                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">bags num : </label>
                            {{ $donation->bags_num}}

                      </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">blood type : </label>
                            {{ $donation->blood_type->name}}

                      </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">city : </label>
                            {{ $donation->city->name}}

                      </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">clinet : </label>
                            {{ $donation->client->name}}

                      </div>

                </div>
                <!-- /.card-body -->


        </div>
        </div>

</div>
</div>

  @endsection

