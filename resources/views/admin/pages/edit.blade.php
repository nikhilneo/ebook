@extends('admin.main')

@section('page-title', 'Edit Admin')

@section('body-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Admin Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> 
        <li class="active">Edit Admin Details</li>
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

                <h4 class="lead"> Edit <strong>{{ $admin->name}}'s  </strong> Details here: </h4>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.update',$admin->id) }}">
                    {{ method_field('PUT')}}
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' text-danger' : '' }}">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{ (old('name') != "" || old('name') != null) ? old('name') : $admin->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' text-danger' : '' }}">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{ (old('email') != "" || old('email') != null) ? old('email') : $admin->email }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                  <div class="col-sm-4 col-sm-offset-2">

                      <input type="submit" value="Save Changes" class="btn btn-primary btn-block">
                  </div>
                </form>

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
