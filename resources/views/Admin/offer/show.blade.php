@extends('Admin.layouts.app')

@section('title', 'show order Home')


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
          <li class="breadcrumb-item"><a href="{{ route('Admin.Orders.index') }}">الطلبات</a></li>
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

                <input type="hidden" name="id" value="{{ $order->id}}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">total_price : </label>
                            {{ $order->total_price}}

                      </div>

                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">notes : </label>
                        {{  isset($order->notes)? $order->notes : "--"}}

                      </div>

                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Special_order : </label>
                        {{ isset($order->Special_order)? $order->Special_order : "--"}}

                      </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">payment : </label>
                            {{ $order->payment->name}}

                      </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">clinet : </label>
                            {{ $order->client->name}}

                      </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1 btn btn-denger">state : </label>
                            <button type="button"  class="btn btn-primary">
                            {{ $order->state}}
                            </button>
                      </div>

                </div>
                <!-- /.card-body -->


        </div>
        </div>

</div>
</div>

  @endsection

