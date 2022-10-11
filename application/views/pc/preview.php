<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sekisui Polymatech</title>

<link href="<?= base_url('assets/bootstrap/css/');?>bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" type="text/css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" type="text/css">
<link href="<?= base_url('assets/css/');?>style.css" rel="stylesheet" >
<link href="<?= base_url('assets/plugins/datetimepicker/');?>bootstrap-datetimepicker.min.css" rel="stylesheet" >

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css" />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?= base_url('assets/bootstrap/js/');?>jquery-3.1.1.min.js"></script>
<script src="<?= base_url('assets/bootstrap/js/');?>jquery.easing.1.3.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= base_url('assets/bootstrap/js/');?>bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>	
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= base_url('assets/plugins/datetimepicker/');?>bootstrap-datetimepicker.min.js"></script>

  <style>
    a:link,
    a:visited {
      color: inherit;
      text-decoration: none;
    }

    .clearfix {
      overflow: auto;
    }

    .clickable:hover {
      background: rgba(0, 0, 0, 0.2);
    }

    .card {
      border-radius: 5px;
      padding: 1px 10px 5px 10px;
      width: 400px;
      min-height: 210px;
      background: white;
      box-shadow: 1px 2px 4px 0px rgba(0, 0, 0, 0.3);
      overflow: auto;
    }

    .f-right {
      float: right;
      margin-left: 5px !important;
    }

    table.view,
    td.view {
      border: solid 1px #BDBDBD;
      border-collapse: collapse;
    }

    td {
      padding: 2px 10px;
    }

    .btn {
      margin: 10px 0;
      padding: 8px;
      border: none;
      border-radius: 5px;
      background: #ef6c00;
      cursor: pointer;
      color: white;
    }

    .blue {
      color: white;
      background: #1565C0;
    }

    .green {
      color: white;
      background: #43A047;
    }

    .badge {
      padding: 2px 4px;
      border-radius: 4px;
      text-align: center;
      font-size: 13px;
      cursor: pointer;
    }

    .delete {
      background: #ef5350;
      color: white;
    }

    .edit {
      background: #1565C0;
      color: white;
    }

    /* Alert Style by Robert Lemon */
    /* https://codepen.io/rlemon/pen/vmIlC */
    .alert {
      width: 30vw;
    }

    .alert .inner {
      padding: 12px;
      border-radius: 3px;
      border: 1px solid rgb(180, 180, 180);
      background-color: rgb(212, 212, 212);
    }

    .alert .close {
      float: right;
      cursor: pointer;
      padding: 12px;
    }

    .alert input {
      display: none;
    }

    .alert input:checked~* {
      animation-name: dismiss, hide;
      animation-duration: 300ms;
      animation-iteration-count: 1;
      animation-timing-function: ease;
      animation-fill-mode: forwards;
      animation-delay: 0s, 100ms;
    }

    .alert.success .inner {
      border: 1px solid rgb(214, 233, 198);
      background-color: rgb(223, 240, 216);
    }

    .alert.success .inner,
    .alert.success .close {
      color: rgb(70, 136, 71);
    }


    @keyframes dismiss {
      0% {
        opacity: 1;
      }

      90%,
      100% {
        opacity: 0;
        font-size: 0.1px;
        transform: scale(0);
      }
    }

    @keyframes hide {
      100% {
        height: 0px;
        width: 0px;
        overflow: hidden;
        margin: 0px;
        padding: 0px;
        border: 0px;
      }
    }
    .jud-tab{
        padding:5px;
        
    }
  </style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a href="#home" class="navbar-brand page-scroll">Sekisui Polymatech</a>
        </div>
        

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        <ul class="nav navbar-nav">
      <!-- start MENU PC-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PC <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('prodcont/schedule');?>">Planning Production</a></li>
            <li><a href="<?= base_url('prodcont/plant01');?>">Plant 01</a></li>
          </ul>
        </li>
        <!-- ends -->
        
        <!-- start MENU TECHNICIAN-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TECHNICIAN <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('welcome/rtechnician');?>">Technician</a></li>
            <li><a href="#">Menu 2</a></li>

          </ul>
        </li>
        <!-- ends -->
        
        <!-- start MENU TECHNICIAN-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MATERIAL <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('welcome/rmaterial');?>">Material</a></li>
            <li><a href="#">Menu 2</a></li>

          </ul>
        </li>
        <!-- ends -->
        
           <!-- start MENU QUALITY-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">QUALITY <span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li><a href="<?= base_url('welcome/rquality');?>">Quality</a></li>
            <li><a href="#">Menu 2</a></li>

          </ul>
        </li>
        <!-- ends -->
        
                 <!-- start MENU PRODUCTION-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUCTION <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('welcome/rproduksi');?>">Produksi</a></li>
            <li><a href="#">Menu 2</a></li>

          </ul>
        </li>
        <!-- ends -->
        
        <!-- start MENU ADMIN-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADMIN <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('welcome/drawing');?>" class="page-scroll">Draw No</a></li>
            <li><a href="#">Menu 2</a></li>

          </ul>
        </li>
        <!-- ends -->
        <li><a href="<?= base_url('welcome/brmachine');?>" class="page-scroll">BREAKDOWN</a></li>
        <li><a href="<?= base_url('welcome/brstatus');?>" class="page-scroll">SUMMARY</a></li>
            
            
          </ul>
          <ul class="nav navbar-nav">
            <li><a href="<?= base_url('welcome');?>" class="page-scroll">PLANT 01</a></li>
            <li><a href="<?= base_url('welcome/index2');?>" class="page-scroll">PLANT 03</a></li>
            
          </ul>
        </div>

      </div>
    </nav>
    <!-- akhir navbar -->
    
<section class="about" id="about">
<div class="container">
<div class="row">
<div class="col-md-12">    

  <h4>Planning Production</h4>

  <!-- Sweet Alert -->
  <?php if( $this->session->flashdata('flash') ) : ?>
  <div class="alert success">
    <input type="checkbox" id="alert0">
    <label class="close" title="close" for="alert0"> &#10006; </label>
    <p class="inner"><?= $this->session->flashdata('flash') ?></p>
  </div>
  <?php endif; ?>

  <!-- Option button -->
  <br>
  <span class="btn blue"><a href="<?= base_url('prodcont/schedule');?>">&#10010; New Data</a></span>
  <span class="btn"><a href="<?= base_url() ?>excel/export">Export To Excel</a></span>
  <span class="btn green"><a href="<?= base_url('prodcont/check_import') ?>">Import From Excel</a></span>


  <br><br>
  <table class="view" cellpadding="8">
    <thead>
					<tr>
					  <th class="text-center jud-tab">NO</th>
					  <th class="text-center jud-tab">LINE</th>
					  <th class="text-center jud-tab">DRAW NO</th>
					  <th class="text-center jud-tab">MOLD</th>
					  <th class="text-center jud-tab">CUSTOMER</th>
					  <th class="text-center jud-tab">QTY</th>
					  <th class="text-center jud-tab">STATUS</th>
					  <th class="text-center jud-tab">RUNNING DATE</th>
					  <th class="text-center jud-tab">DELETE</th>
					</tr>
    </thead>
  
  
  

    <!-- Data -->
    <?php 
    $no=1;
    
    foreach ($datas as $data) : ?>
    <tr class="clickable">
         <td class="view">
          <a href="#"><?= $no++;?></a>
        </td>
      
        
         <td class="view">
          <a href="#"><?= $data['no_mc'] ?></a>
        </td>
        
         <td class="view">
          <a href="#"><?= $data['draw_no'] ?></a>
        </td>
        
        <td class="view">
          <a href="#"><?= $data['mold'] ?></a>
        </td>
        
         <td class="view">
          <a href="#"><?= getCustomer($data['draw_no']) ?></a>
        </td>
        
         <td class="view">
        <a href="#"><?= $data['jumlah'] ?></a>
        </td>
         <td class="view">
        <a href="#"><?= $data['status'] ?></a>
      </td>
      
       <td class="view">
        <a href="#"><?= is_null($data['tanggal']) ? 'Belum Terjadwal' : $data['tanggal'];?></a>
      </td>
      <td>
        <span class="badge delete">
          <a href="<?= base_url() ?>home/del_data/<?= $data['id'] ?>" onclick="return confirm('Yakin hapus jadwal ini?');">&#10005;</a>
        </span>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  
  
</div>
</div>
</div>
</section>
  
  
  
  
  
  
  
  
  
</body>

</html>