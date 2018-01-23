<!DOCTYPE html>
<html>
@include('admin.partials.htmlHeader')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('admin.partials.mainheader')
  
@include('admin.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  @include('admin.partials.footer')


  @include('admin.partials.controlSidebar')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('admin.partials.script')
</body>
</html>
