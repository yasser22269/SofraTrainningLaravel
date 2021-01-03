@extends('Admin.layouts.app')

@section('title', 'Products Home')

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
          <li class="breadcrumb-item active">المنتاجات</li>
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
            <div class="card-header">

              <div class="card-tools">
                  <a href="{{ route('Admin.Products.create')}}">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="Add User">
                        <i class="material-icons">Add Products</i>
                      </button>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>image</th>
                   <th>body</th>
                   <th>Price</th>
                   <th>price_offer</th>
                   <th>Processing_time</th>
                   <th>restaurant_id</th>

                    <th>control</th>
                  </tr>
                </thead>
                <tbody>
                     @foreach ($Products as $Product)


                  <tr>
                    <td>{{  $Product->id}}</td>
                    <td>{{  $Product->title}}</td>
                    <td> <img src="{{ asset('Photos/Product/'.$Product->Photo) }}"style='width:100px'class='img-thumbnail' alt=""></td>
                   <td>{{  Str::limit($Product->content, 30)  }}</td>
                   <td>{{  $Product->price  }}</td>
                   <td>{{  $Product->price_offer  }}</td>
                   <td>{{  $Product->Processing_time }} دقيقة</td>
                   <td>{{  $Product->restaurant->name  }}</td>

                    <td class="td-actions ">
                    <a href="{{ route('Admin.Products.edit',$Product->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="Edit User">
                            <i class="material-icons">edit</i>
                          </button>
                    </a>
                        <form action="{{ route('Admin.Products.destroy',$Product->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-danger" data-original-title="Remove User">
                          <i class="material-icons">Delete</i>
                        </button>
                        </form>


                      </td>

                  </tr>
                  @endforeach
                </tbody>

              </table>
              <div class="text-center">
              {{ $Products->links() }}
              </div>

            </div>

            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
      </div>

</div>

  @endsection
