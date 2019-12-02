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
                <h3 class="box-title">Add New Book</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" role="form" id="create-book" method="POST" action="{{ url('/admin/books') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' text-danger' : '' }}">
                        <label class="col-sm-2 control-label"> Book Title: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" >
                        
                            @if ($errors->has('name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <!-- /.form-group -->
            
                    <div class="form-group{{ $errors->has('publisher') ? ' text-danger' : '' }}">
                        <label class="col-sm-2 control-label"> Publisher: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="publisher" value="{{old('publisher')}}" id="publisher" >

                            @if ($errors->has('publisher'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('publisher') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <!-- /.form-group -->
            
                    <div class="form-group{{ $errors->has('author') ? ' text-danger' : '' }}">
                        <label class="col-sm-2 control-label"> Author: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author" value="{{old('author')}}" id="author" >
                        
                            @if ($errors->has('author'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('author') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <!-- /.form-group -->
            
                    <div class="form-group{{ $errors->has('eddition') ? ' text-danger' : '' }}">
                        <label class="col-sm-2 control-label"> Eddition: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="eddition" value="{{old('eddition')}}" id="eddition" >
                        
                            @if ($errors->has('eddition'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('eddition') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <!-- /.form-group -->
            
                    <div class="form-group{{ $errors->has('publish_date') ? ' text-danger' : '' }}">
                        <label class="col-sm-2 control-label"> Publish Date: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="publish_date" value="{{old('publish_date')}}" id="publish_date" >
                        
                            @if ($errors->has('publish_date'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('publish_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('price') ? ' text-danger' : '' }}">
                        <label class="col-sm-2 control-label"> Price: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="price" value="{{old('price')}}" id="price" >
                        
                            @if ($errors->has('price'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('quantity') ? ' text-danger' : '' }}">
                        <label class="col-sm-2 control-label"> Quantity: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="quantity" value="{{old('quantity')}}" id="quantity" >
                        
                            @if ($errors->has('quantity'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <div class="col-sm-4 col-sm-offset-2">

                    <input type="submit"form="create-book" value="Save" class="btn btn-primary btn-block">
                </div>
            </div>
        </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('javascripts')

{{-- <!-- jQuery 3 -->
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
<script src="{{asset('admin-assets/dist/js/demo.js')}}"></script> --}}

<script src="{{asset('admin-assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('admin-assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('admin-assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('admin-assets/dist/js/adminlte.min.js')}}"></script>
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