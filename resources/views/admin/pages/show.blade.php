@extends('admin.main')

@section('page-title', 'Admin Detail')

@section('body-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Detail
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> 
        <li class="active">Admin Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                @if(Session::has('success'))

                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      {{ Session::get('success')}}
                    </div>
                @endif
              {{-- <img class="profile-user-img img-responsive img-circle" src="{{asset('admin-assets/dist/img/user4-128x128.jpg')}}" alt="User profile picture"> --}}
              <div class="text-center">
                <i class="fa fa-user-circle fa-5x"></i>
              </div>
              <h3 class="profile-username text-center">{{$admin->name}}</h3>

              <p class="text-muted text-center">{{ $admin->email }}</p>
              <p class="text-muted text-center">Admin BookShop</p>
              <h4 class="lead"> Here are some books added by {{$admin->name}}: </h4>
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book Name</th>
                        <th>Added On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    
                        <tr>
                            <th>{{$book->id}}</th>
                            <td>{{$book->name}}</td>
                            <td>{{date('d/m/Y h:i:s a', strtotime($book->created_at))}}</td>
                        </tr>
                        @endforeach
                        @if (count($books) == 0)
                            <tr>
                                <td class="text-center" colspan="6">{{ $admin->name}} did not added any book yet.</td>
                            </tr>
                        @endif
                </tbody>
            </table>
            <div class="box-footer">
                @if (count($books) != 0)
                    {!! $books->links() !!}
                @endif
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('javascripts')
  <!-- jQuery 3 -->
  <script src="{{asset('admin-assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('admin-assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('admin-assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('admin-assets/dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('admin-assets/dist/js/demo.js')}}"></script>
@endsection
