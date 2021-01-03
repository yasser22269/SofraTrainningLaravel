@extends('Admin.layouts.app')

@section('title', 'User Home')

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
          <li class="breadcrumb-item active">الاعضاء</li>
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
                  <a href="{{ route('Admin.users.create')}}">
                    <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="Add User">
                        <i class="material-icons">Add User</i>
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
                    <th>Phone</th>
                    <th>Email</th>
                    <th>blood_type interested</th>
                    <th>city</th>
                    <th>control</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)




                  <tr>
                    <td>{{  $client->id}}</td>
                    <td>{{  $client->name}}</td>
                    <td>{{  $client->phone}}</td>
                    <td>{{  $client->email}}</td>
                    <td>
                        @foreach($client->blood_type as $blood_type)
                       ( {{ $blood_type->name}})
                          @endforeach
                    </td>
                        {{-- <td>
                            {{ $client->blood_type->name}}
                        </td> --}}
                    <td> {{  $client->city->governorate->name }}--{{  $client->city->name}}</td>
                    <td class="td-actions ">
                    <a href="{{ route('Admin.users.edit',$client->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="Edit User">
                            <i class="material-icons">edit</i>
                          </button>
                    </a>
                        <form action="{{ route('Admin.users.destroy',$client->id) }}" method="post" style="display: inline-block;">
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
              {{ $clients->links() }}
              </div>

            </div>

            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
      </div>

</div>

  @endsection
