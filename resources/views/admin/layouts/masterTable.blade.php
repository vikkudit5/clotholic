<!DOCTYPE html>
<html>

<!-- table html header -->
@include('admin.partials.tableHtmlHeader')


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 @include('admin.partials.mainheader')
  
@include('admin.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          @yield('content')

         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  @include('admin.partials.footer')


  @include('admin.partials.controlSidebar')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('admin.partials.tableScript')
</body>
</html>
