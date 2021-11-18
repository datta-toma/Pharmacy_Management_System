<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <base href="{{ \URL::to('/') }}">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">

  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">



  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu"  role="button"><i class="fas fa-bars"></i></a>
      </li>

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Back</a>
        </li>

        </ol>

    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="images/hd_logo.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a  class="d-block"> PMS </a>
        </div>
      </div>

      <nav class="mt-2">

			<li>
                <a href="cashier.php"><i class="fa fa-home"></i>
                    &nbsp;Dashboard</a>
                </li>
			<li>
                <a href="payment.php"target="_top"><i class="fa fa-users"></i>
                    &nbsp;View Users</a>
                </li>
                <li>
                    <a href="payment.php"target="_top"><i class="fa fa-prescription-bottle-alt"></i>
                        &nbsp;View Prescription</a>
                    </li>
                    <li>
                        <a href="payment.php"target="_top"><i class="fa fa-pills"></i>
                            &nbsp;Manage Stock</a>
                        </li>
			<li>
                <a href="logout.php"><i class="fa fa-power-off"></i>
                    &nbsp;Logout</a>
                </li>


        </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>

        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="grid_7">


        <div class="row">
            <a href="cashier.php" class="dashboard-module">
                <img src="images/users.png" width="96" height="96" alt="edit" />
                <span> View Users </span>

            </a>
             <a href="payment.php"target="_top" class="dashboard-module">
                <img src="images/Invoice.png" width="96" height="96" alt="edit" />
                <span>View Invoices</span>
            </a>
             <a href="payment.php"target="_top" class="dashboard-module">
                <img src="images/pre.png" width="96" height="96" alt="edit" />
                <span>View Prescription</span>
            </a>
             <a href="payment.php"target="_top" class="dashboard-module">
                <img src="images/stock_icon.png" width="96" height="96" alt="edit" />
                <span>Manage Stock</span>
            </a>
            </div>
          </div>
        </div>
      </section>

  </div>

  <footer class="main-footer">

    <div class="float-right d-none d-sm-inline-block">
   </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="plugins/jquery/jquery.min.js">
</script>
<script src="plugins/jquery-ui/jquery-ui.min.js">
</script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard.js"></script>





</body>
</html>
