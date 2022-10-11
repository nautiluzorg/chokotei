<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title>Production System </title>

  <!-- Bootstrap -->
  <link href="<?= base_url('assets/template') ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('assets/template') ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('assets/template') ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?= base_url('assets/template') ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?= base_url('assets/template') ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?= base_url('assets/template') ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?= base_url('assets/template') ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  
  <link href="<?= base_url('assets/plugins/datetimepicker/');?>bootstrap-datetimepicker.min.css" rel="stylesheet" >

  <link href="<?= base_url('assets/template') ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/template') ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/template') ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/template') ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/template') ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/template') ?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/template') ?>/vendors/select2/dist/css/select2-bootstrap4.min.css" rel="stylesheet">
  
  <link href="<?= base_url('assets/template') ?>/build/css/custom.min.css" rel="stylesheet">
  
  
  <!-- jQuery -->
 
 
  <script src="<?= base_url('assets/bootstrap/js/');?>jquery-3.1.1.min.js"></script>
  <script src="<?= base_url('assets/bootstrap/js/');?>jquery.easing.1.3.js"></script>
  <script src="<?= base_url('assets/template'); ?>/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/plugins/datetimepicker/'); ?>bootstrap-datetimepicker.min.js"></script>
  <script>
    $("document").ready(function() {
        

        $("#changepassword").on('click', function() {

            alert('Hallo apa kabar?');

        });
        
        $(".tglwaktu").datetimepicker();
    });
</script>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <h6>SEKISUI</h6>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?= base_url('assets/template/'); ?>images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Selamat Datang</span>
              <h2><?= strtoupper($user['name']); ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />