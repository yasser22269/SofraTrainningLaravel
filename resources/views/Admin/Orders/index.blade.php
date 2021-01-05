@extends('Admin.layouts.app')

@section('title', 'order Home')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">الطلبات</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item active">الطلبات</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
    <div class="row">

        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>total_price</th>
                    <th>notes</th>
                    <th>Special_order</th>
                    <th>client Name</th>
                    <th>payment</th>
                    <th>state</th>
                    <th>control</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)




                  <tr>
                    <td>{{  $order->id}}</td>
                    <td>{{  $order->total_price}}</td>
                    <td>{{  isset($order->notes)? $order->notes : "--"}}</td>
                    <td>{{ isset($order->Special_order)? $order->Special_order : "--"}}</td>
                    <td> {{  $order->client->name }}</td>
                    <td> {{  $order->payment->name }}</td>
                    <td> {{  $order->state }}</td>
                    <td class="td-actions ">
                        @if($order->state == "pending")

                        <a href="{{ route('Admin.Orders.accepted',$order->id) }}">
                            <button type="button" rel="tooltip" title="" class="btn btn-success" data-original-title="accepted order">
                                <i class="material-icons">accepted</i>
                              </button>
                        </a>
                        @endif

                        @if($order->state != "delivered")
                        <a href="{{ route('Admin.Orders.delivered',$order->id) }}">
                            <button type="button" rel="tooltip" title="" class="btn btn-dark" data-original-title="delivered order">
                                <i class="material-icons">delivered</i>
                              </button>
                        </a>
                        @endif

                    <a href="{{ route('Admin.Orders.show',$order->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="show order">
                            <i class="material-icons">show</i>
                          </button>
                    </a>
                        {{-- <form action="{{ route('Admin.order_reguest.destroy',$order->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-danger" data-original-title="Remove order">
                          <i class="material-icons">Delete</i>
                        </button>
                        </form> --}}


                      </td>

                  </tr>
                  @endforeach
                </tbody>

              </table>
              <div class="text-center">
              {{ $orders->links() }}
              </div>

            </div>

            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
      </div>

</div>

  @endsection
