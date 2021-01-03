@extends('Admin.layouts.app')

@section('title', 'donation Home')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">التبرعات</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item active">التبرعات</li>
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
                    <th>Name</th>
                    <th>Phone</th>
                    <th>age</th>
                    <th>hospital_address</th>
                    <th>notes</th>
                    <th>bags_num</th>
                    <th>Client Name</th>
                    <th>blood Type</th>
                    <th>city</th>
                    <th>control</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($donations as $donation)




                  <tr>
                    <td>{{  $donation->id}}</td>
                    <td>{{  $donation->name}}</td>
                    <td>{{  $donation->phone}}</td>
                    <td>{{  $donation->age}}</td>
                    <td>
                        {{ $donation->hospital_address}}

                    </td>
                    <td> {{  $donation->notes }}</td>
                    <td> {{  $donation->bags_num }}</td>
                    <td> {{  $donation->client->name }}</td>
                    <td> {{  $donation->blood_type->name }}</td>
                    <td> {{  $donation->city->name }}</td>
                    <td class="td-actions ">
                    <a href="{{ route('Admin.donation_reguest.show',$donation->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="show User">
                            <i class="material-icons">show</i>
                          </button>
                    </a>
                        {{-- <form action="{{ route('Admin.donation_reguest.destroy',$donation->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-danger" data-original-title="Remove User">
                          <i class="material-icons">Delete</i>
                        </button>
                        </form> --}}


                      </td>

                  </tr>
                  @endforeach
                </tbody>

              </table>
              <div class="text-center">
              {{ $donations->links() }}
              </div>

            </div>

            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
      </div>

</div>

  @endsection
