@extends('admin.main')

@section('page-title', 'Profile')

@section('body-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> 
        <li class="active">Profile</li>
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
              <h3 class="profile-username text-center">{{Auth::guard('admin')->user()->name}}</h3>

              <p class="text-muted text-center">{{ Auth::guard('admin')->user()->email }}</p>
              <p class="text-muted text-center">Admin BookShop</p>
              <div class="row">
                <div class="col-md-12">
                    <h4 class="lead"> Here are some books added by you: </h4>
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
                                      <td class="text-center" colspan="6">{{ Auth::guard('admin')->user()->name}} did not added any book yet.</td>
                                  </tr>
                              @endif
                      </tbody>
                  </table>
                  <div class="box-footer">
                      @if (count($books) != 0)
                          {!! $books->links() !!}
                      @endif
                  </div>
                </div>


                <div class="col-md-12">
                    <h4 class="lead"> Change your password here: </h4>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/change_password') }}">
                      {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('old_password') ? ' text-danger' : '' }}">
                            <label for="inputPassword" class="col-sm-2 control-label">Old Password</label>
      
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Old Password" name="old_password">
                                @if ($errors->has('old_password'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('new_password') ? ' text-danger' : '' }}">
                            <label for="inputPassword" class="col-sm-2 control-label">New Password</label>
      
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword" placeholder="New Password" name="new_password">
                                @if ($errors->has('new_password'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('new_password_confirmation') ? ' text-danger' : '' }}">
                            <label for="inputConfirmPassword" class="col-sm-2 control-label">Confirm New Password</label>
      
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Confirm New Password" name="new_password_confirmation">
                                @if ($errors->has('new_password_confirmation'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      <div class="col-sm-4 col-sm-offset-2">
      
                          <input type="submit" value="Save Changes" class="btn btn-primary btn-block">
                      </div>
                    </form>
                </div>
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
