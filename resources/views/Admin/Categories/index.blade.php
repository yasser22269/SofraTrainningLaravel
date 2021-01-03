@extends('Admin.layouts.app')

@section('title', 'Category Home')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">التصنيفات</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item active">التصنيفات</li>
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
                  <a href="{{ route('Admin.categories.create')}}">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="Add Categories">
                        <i class="material-icons">Add Categories</i>
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
                    <th>Name</th>
                    <th>control</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Categories as $Category)




                  <tr>
                    <td>{{  $Category->id}}</td>
                    <td>{{  $Category->name}}</td>
                    <td class="td-actions ">
                    <a href="{{ route('Admin.categories.edit',$Category->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="Edit Categories">
                            <i class="material-icons">edit</i>
                          </button>
                    </a>
                        <form action="{{ route('Admin.categories.destroy',$Category->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-danger" data-original-title="Remove Category">
                          <i class="material-icons">Delete</i>
                        </button>
                        </form>


                      </td>

                  </tr>
                  @endforeach
                </tbody>

              </table>
              <div class="text-center">
              {{ $Categories->links() }}
              </div>

            </div>

            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
      </div>

</div>

  @endsection
