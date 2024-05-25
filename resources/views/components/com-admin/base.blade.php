<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN || SIAMPLANG </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public') }}/lte/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('public') }}/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('public') }}/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('public') }}/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('public') }}/lte/plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{ asset('resources/node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ url('public') }}/lte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('resources/css/output.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <x-com-admin.navbar />
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <x-com-admin.sidebar />

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   {{ $slot }}
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('public') }}/lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public') }}/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ url('public') }}/lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('public') }}/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('public') }}/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('public') }}/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('public') }}/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

<!-- Summernote -->
<script src="{{ url('public') }}/lte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('public') }}/lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('public') }}/lte/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,

    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#summernote').summernote()
  });
</script>
@stack('js')

</body>
</html>
