@extends('Admin.layouts.app')

@section('title', 'show contacts Home')


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
          <li class="breadcrumb-item"><a href="{{ route('Admin.contacts.index') }}">الاميل</a></li>
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

                <input type="hidden" name="id" value="{{ $contacts->id}}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name : </label>
                            {{ $contacts->name}}

                      </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email : </label>
                            {{ $contacts->email}}

                      </div>

                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">phone : </label>
                            {{ $contacts->phone}}

                      </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">message : </label>
                            {{ $contacts->message}}

                      </div>

                </div>


                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">message_type : </label>
                            {{ $contacts->type_massage}}

                      </div>

                </div>
                <!-- /.card-body -->


        </div>
        </div>

</div>
</div>

  @endsection

