@extends('Admin.layouts.app')

@section('title', 'contact Home')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
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
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>message</th>
                    <th>type_massage</th>
                    <th>control</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)

                  <tr>
                    <td>{{  $contact->id}}</td>
                    <td>{{  $contact->name}}</td>
                    <td>{{  $contact->email}}</td>
                    <td>{{  $contact->phone}}</td>
                    <td>{{  Str::limit($contact->message, 30)  }}</td>
                    <td class="btn btn-danger">{{ $contact->type_massage }}</td>




                    <td class="td-actions ">
                    <a href="{{ route('Admin.contacts.show',$contact->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="show contacts">
                            <i class="material-icons">show</i>
                          </button>
                    </a>
                        <form action="{{ route('Admin.contacts.destroy',$contact->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-danger" data-original-title="Remove contact">
                          <i class="material-icons">Delete</i>
                        </button>
                        </form>


                      </td>

                  </tr>
                  @endforeach
                </tbody>

              </table>
              <div class="text-center">
              {{ $contacts->links() }}
              </div>

            </div>

            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
      </div>

</div>

  @endsection
