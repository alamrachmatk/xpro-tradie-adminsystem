<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>XPRO Tradie | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('template/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('template/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('template/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('template/dist/css/AdminLTE.min.css')}}">
  <!-- Material Design -->
  <link rel="stylesheet" href="{{url('template/dist/css/bootstrap-material-design.min.css')}}">
  <link rel="stylesheet" href="{{url('template/dist/css/ripples.min.css')}}">
  <link rel="stylesheet" href="{{url('template/dist/css/MaterialAdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('template/dist/css/skins/all-md-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{url('template/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('template/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{url('template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('template/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{url('template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('layouts.header')

    @include('layouts.sidebar')
    
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.footer')

  </div>
<!-- jQuery 3 -->
<script src="{{url('template/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('template/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('template/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Material Design -->
<script src="{{url('template/dist/js/material.min.js')}}"></script>
<script src="{{url('template/dist/js/ripples.min.js')}}"></script>
<script>
    $.material.init();
</script>
<!-- Morris.js charts -->
<script src="{{url('template/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{url('template/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url('template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('template/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('template/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('template/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{url('template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{url('template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('template/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('template/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('template/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('template/dist/js/demo.js')}}"></script>
</body>
</html>
