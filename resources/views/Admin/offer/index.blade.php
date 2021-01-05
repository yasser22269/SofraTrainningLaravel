@extends('Admin.layouts.app')

@section('title', 'offer Home')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">العروض</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item active">العروض</li>
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
                    <a href="{{ route('Admin.offers.create')}}">
                      <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="Add offer">
                          <i class="material-icons">Add Offer</i>
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
                    <th>Photo</th>
                    <th>title</th>
                    <th>body</th>
                    <th>from</th>
                    <th>to</th>
                    <th>control</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)

                  <tr>
                    <td>{{  $offer->id}}</td>
                    {{-- //Photos/Offe/ --}}
                    <td><img src="{{asset('Photos/Offer/'.$offer->Photo)}}"width="150px" alt=""></td>
                    <td>{{  isset($offer->title)? $offer->title : "--"}}</td>
                    <td>{{ isset($offer->body)? $offer->body : "--"}}</td>
                    <td> {{  $offer->from }}</td>
                    <td> {{  $offer->to }}</td>
                    <td class="td-actions ">

                    <a href="{{ route('Admin.offers.destroy',$offer->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-danger" data-original-title="delete offer">
                            <i class="material-icons">delete</i>
                          </button>
                    </a>
                        {{-- <form action="{{ route('Admin.offer_reguest.destroy',$offer->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-danger" data-original-title="Remove offer">
                          <i class="material-icons">Delete</i>
                        </button>
                        </form> --}}


                      </td>

                  </tr>
                  @endforeach
                </tbody>

              </table>
              <div class="text-center">
              {{ $offers->links() }}
              </div>

            </div>

            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
      </div>

</div>

  @endsection
