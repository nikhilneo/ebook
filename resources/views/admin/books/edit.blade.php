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
                <div class="tab-pane col-md-10 col-md-offset-1">
                    <form role="form" method="POST" action="{{ route('books.update', $book->id) }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class=""> Book Title: </label>
                            <input type="text" class="form-control" name="name" value="{{(old('name') === null || old('name') === "") ? $book->name : old('name')}}"  id="name" >
                            
                            @if ($errors->has('name'))
                                <p class="text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </p>
                            @endif
                        </div>
                        <!-- /.form-group -->
                
                        <div class="form-group">
                            <label class=""> Publisher: </label>
                            <input type="text" class="form-control" name="publisher" value="{{(old('publisher') === null || old('publisher') === "") ? $book->publisher : old('publisher')}}"  id="publisher" >

                            @if ($errors->has('publisher'))
                                <p class="text-danger">
                                    <strong>{{ $errors->first('publisher') }}</strong>
                                </p>
                            @endif
                        </div>
                        <!-- /.form-group -->
                
                        <div class="form-group">
                            <label class=""> Author: </label>
                            <input type="text" class="form-control" name="author" value="{{(old('author') === null || old('author') === "") ? $book->author : old('author')}}"  id="author" >
                            
                            @if ($errors->has('author'))
                                <p class="text-danger">
                                    <strong>{{ $errors->first('author') }}</strong>
                                </p>
                            @endif
                        </div>
                        <!-- /.form-group -->
                
                        <div class="form-group">
                            <label class=""> Eddition: </label>
                            <input type="text" class="form-control" name="eddition" value="{{(old('eddition') === null || old('eddition') === "") ? $book->eddition : old('eddition')}}"  id="eddition" >
                            
                            @if ($errors->has('eddition'))
                                <p class="text-danger">
                                    <strong>{{ $errors->first('eddition') }}</strong>
                                </p>
                            @endif
                        </div>
                        <!-- /.form-group -->
                
                        <div class="form-group">
                            <label class=""> Publish Date: </label>
                            <input type="text" class="form-control" name="publish_date" value="{{(old('publish_date') === null || old('publish_date') === "") ? $book->publish_date : old('publish_date')}}"  id="publish_date" >
                            
                            @if ($errors->has('publish_date'))
                                <p class="text-danger">
                                    <strong>{{ $errors->first('publish_date') }}</strong>
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class=""> Price: </label>
                            <input type="text" class="form-control" name="price" value="{{(old('price') === null || old('price') === "") ? $book->price  : old('price')}}"  id="price" >
                            
                            @if ($errors->has('price'))
                                <p class="text-danger">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class=""> Quantity: </label>
                            <input type="text" class="form-control" name="quantity" value="{{ (old('quantity') === null || old('quantity') === "") ? $book->quantity : old('quantity')}}"  id="quantity" >
                            
                            @if ($errors->has('quantity'))
                                <p class="text-danger">
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                </p>
                            @endif
                        </div>
                        <input type="hidden" name="admin_id" value="{{ $book->admin->id }}">
                        <div class="form-group">
                           
                            <input type="submit" value="Save Changes" class="btn btn-primary">
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
            </div>
            <div class="box-footer">
              
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