@extends('Admin.layouts.app')

@section('title', 'city Home')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">المدن</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item active">المدن</li>
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
                  <a href="{{ route('Admin.cities.create')}}">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="Add cities">
                        <i class="material-icons">Add cities</i>
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
                    @foreach ($cities as $city)




                  <tr>
                    <td>{{  $city->id}}</td>
                    <td>{{  $city->name}}</td>
                    <td class="td-actions ">
                    <a href="{{ route('Admin.cities.edit',$city->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="Edit cities">
                            <i class="material-icons">edit</i>
                          </button>
                    </a>
                        <form action="{{ route('Admin.cities.destroy',$city->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-danger" data-original-title="Remove city">
                          <i class="material-icons">Delete</i>
                        </button>
                        </form>


                      </td>

                  </tr>
                  @endforeach
                </tbody>

              </table>
              <div class="text-center">
              {{ $cities->links() }}
              </div>

            </div>

            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
      </div>

</div>

  @endsection
