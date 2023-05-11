<!DOCTYPE html>
<html lang="es" translate="no">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TEDU EMPRENDE - SISTEMA</title>
  <meta name="csrf-token" content="{{ csrf_token()}}">  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  @yield('cabecera') 
   <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/lte/plugins/fontawesome-free-6/css/all.min.css')}}"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/lte/dist/css/adminlte.min.css')}}">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-default/default.css">

  <link rel="stylesheet" href="{{asset('css/menu_botones.css')}}">   
  <link rel="icon" href="{{asset('/images/TEDU-ICO.ico')}}">


</head>
<body class="hold-transition sidebar-mini layout-footer-fixed">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('images/tedu.png')}}" alt="Tedu" height="60" width="140">
  </div> -->
  <!--  header -->
  @include('themes/lte/header')
  <!-- /.header -->

  <!-- aside -->
  @include('themes/lte/asite')
  <!-- /.aside -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3></h3>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">@yield('titulo')</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                    @yield('contenedor')
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              Fecha de ingreso: {{date('Y-m-d')}}
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('themes/lte/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/lte/dist/js/demo.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/lte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!--HighChart  -->
<script src="{{asset('highcharts/highcharts.js')}}"></script>
<script src="{{asset('highcharts/modules/exporting.js')}}"></script>
<script src="{{asset('highcharts/modules/export-data.js')}}"></script>
<script src="{{asset('highcharts/modules/accessibility.js')}}"></script>
<script src="{{asset('highcharts/modules/networkgraph.js')}}"></script>


<!-- Page specific script -->
@yield('script-abajo')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "excel", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $("#example3").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

</body>
</html>
