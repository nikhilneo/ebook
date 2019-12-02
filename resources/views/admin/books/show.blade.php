@extends('admin.main')

@section('page-title', 'Home')

@section('body-content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Books
        <small>Add New Book</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Books</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">

                        <h3 class="box-title">{{$book->name}}
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="tab-pane col-md-10 col-md-offset-1">
                    <div class="row">
                      <h3>Details:</h3>
                        <div class="col-md-10 col-md-offset-1">
                            <dl class="">
                              <dt>Author</dt>
                              <dd>{{$book->author}}</dd>
                            </dl>
                            <dl>
                              <dt>Publisher</dt>
                              <dd>{{ ($book->publisher === "Unknown")? "" : $book->publisher }}</dd>
                            </dl>
                            <dl>
                              <dt>Publice Date</dt>
                              <dd>{{date('d/m/Y', strtotime($book->publish_date))}}</dd>
                            </dl>
                            <dl>
                              <dt>Price</dt>
                              <dd>{{number_format($book->price, 2)}}</dd>
                            </dl>
                            <dl>
                              <dt>Current Quantity</dt>
                              <dd>{{number_format($book->quantity,0)}}</dd>
                            </dl>
                            <dl>
                              <dt>Total Quantity</dt>
                              <dd>{{number_format($book->total,0)}}</dd>
                              </dl>
                            <dl>
                              <dt>Added By</dt>
                              <dd>{{ ($book->admin_id === Auth::guard('admin')->user()->id)? "You" : $book->admin->name }}</dd>
                            </dl>
                            <dl>
                              <dt>Added On</dt>
                              <dd>{{date('d/m/Y h:i:s a', strtotime($book->created_at))}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
              <a href="{{url('admin/books')}}" class="btn btn-primary">Books List</a>
            </div>
        </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('javascripts')

<!-- jQuery 3 -->
<script src="{{asset('admin-assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin-assets/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('admin-assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('admin-assets/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin-assets/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin-assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('admin-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('admin-assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin-assets/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin-assets/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('admin-assets/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('admin-assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('admin-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('admin-assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('admin-assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin-assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin-assets/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin-assets/dist/js/demo.js')}}"></script>
<script src="{{asset('admin-assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    $(function(){
        //Date picker
        $('#publish_date').datepicker({
            autoclose: true
        });
    });
</script>

@endsection