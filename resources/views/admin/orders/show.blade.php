@extends('admin.main')

@section('page-title', 'Order Data')

@section('body-content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order
        <small>Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin/orders')}}"><i class="fa fa-dashboard"></i> Orders List</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
          
            <div class="box-header with-border">
                <h3 class="box-title">Avilable Order Data</h3>
            </div>
            <div class="box-body">
                @if(Session::has('success'))

                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('success')}}
                  </div>
                @endif
                <div class="lead text-center">
                  <strong>Orderd by {{$order->user->name}}</strong>
                  <small> on {{date('d/m/Y h:i:s a', strtotime($order->created_at))}}</small>
                  <form class="pull-right form-horizontal" action="{{ url('admin/orders/update').'/'.$order->id }}" method="POST" id="change-order-status">
                    {{method_field('PUT')}}
                    {{csrf_field('')}}
                    <select name="status" class="form-control" id="status">
                        <option value="Placed" {{($order->status === "Placed") ? "selected" : ""}}>Placed</option>
                        <option value="Confirmed" {{($order->status === "Confirmed") ? "selected" : ""}}>Confirmed</option>
                        <option value="Delivered" {{($order->status === "Delivered") ? "selected" : ""}}>Delivered</option>
                        <option value="Canceled" {{($order->status === "Canceled") ? "selected" : ""}}>Canceled</option>
                    </select>
                </form>
                <small class="pull-right">Change Order Status: &nbsp;</small> 
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price <small> (in Rs.)</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->books as $order_data)
                        
                            <tr>
                                <th>{{$order_data->name}}</th>
                                <td class="text-right">{{number_format($order_data->price, 2)}}</td>
                                <td class="text-right">{{number_format($order_data->pivot->quantity, 0)}}</td>
                                <td class="text-right">{{($order_data->pivot->quantity)}} x {{number_format($order_data->price, 2)}} = {{number_format(($order_data->pivot->quantity) * (number_format($order_data->price, 2)),2)}}</td>
                            </tr>
                        @endforeach  
                        <tr> <th colspan="3" class="text-right"> Total Payable Ammount </th> <th class="text-right">{{number_format($order->grand_total,2)}}</th></tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <strong>Order Status: </strong>{{$order->status}}
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
<script>
    $('#status').on('change', function() {
        $('#change-order-status').submit();
    });
</script>
@endsection