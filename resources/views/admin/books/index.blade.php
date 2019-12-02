@extends('admin.main')

@section('page-title', 'Home')

@section('body-content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Books
        <small>List</small>
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
                <h3 class="box-title">Avilable Books List</h3>
            </div>
            <div class="box-body">
                @if(Session::has('success'))
    
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('success')}}
                    </div>
                @endif
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Book Name</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        
                            <tr>
                                <th>{{$book->id}}</th>
                                <td>{{$book->name}}</td>
                                <td class="text-right">{{number_format($book->quantity, 0)}}</td>
                                <td class="text-center">
                                    <a href="{{url('admin/books').'/'.$book->id}}" class="btn btn-default"><i class="fa fa-eye text-info"></i></a>
                                    <a href="{{url('admin/books').'/'.$book->id.'/edit'}}" class="btn btn-default"><i class="fa fa-edit text-success"></i></a>
                                    <a href="" class="btn btn-default"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{$book->id}}').submit();"
                                    ><i class="fa fa-trash text-danger"></i>
                                        <form id="delete-form-{{$book->id}}" action="{{route('books.destroy', $book->id)}}" method="post" style="display:none;">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <input type="submit">
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @if (count($books) == 0)
                            <tr>
                                <td class="text-center" colspan="5">No Books Found...</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                {!! $books->links() !!}
                @if (count($books) == 0)
                    <div class="row">
                        <div class="col-md-2">

                            <a href="{{url('admin/books/create')}}" class="btn btn-primary btn-block">Add New Book</a>
                        </div>
                    </div>
                @endif
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

@endsection