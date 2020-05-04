<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title', 'Sistem Pengelolaan Data Siswa')</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css')}}"> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('profile/vendors/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('profile/vendors/themify-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('profile/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('profile/vendors/selectFX/css/cs-skin-elastic.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  @yield('header')
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  	@include('layouts._sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

    @include('layouts._navbar')
        <!-- End of Topbar -->

       @yield('content')

        </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Agus R Siahaan 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{'admin/vendor/jquery-easing/jquery.easing.min.js'}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{'admin/js/sb-admin-2.min.js'}}"></script>

  <!-- Page level plugins -->
  <script src="{{'admin/vendor/chart.js/Chart.min.js'}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('admin/js/demo/chart-pie-demo.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script>
    @if(Session::has('sukses'))
      toastr.success("{{Session::get('sukses')}}", "Sukses");
    @endif
    @if(Session::has('hapus'))
      toastr.success("{{Session::get('hapus')}}", "Sukses");
    @endif
  </script>

  @yield('footer')

  <!-- <script src="{{asset('profile/vendors/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('profile/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('profile/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('profile/assets/js/main.js')}}"></script>
 -->
</body>

</html>