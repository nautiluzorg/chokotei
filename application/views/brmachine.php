<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sekisui Polymatech</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/bootstrap/css/');?>bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/');?>style.css" rel="stylesheet" >
	<link href="<?= base_url('assets/plugins/datepicker3/css/');?>bootstrap-datepicker.min.css" rel="stylesheet">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= base_url('assets/bootstrap/js/');?>jquery-3.1.1.min.js"></script>
    <script src="<?= base_url('assets/bootstrap/js/');?>jquery.easing.1.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url('assets/bootstrap/js/');?>bootstrap.min.js"></script>
	<script src="<?= base_url('assets/plugins/datepicker3/js/');?>bootstrap-datepicker.min.js"></script>
	<script src="<?= base_url('assets/bootstrap/js/');?>custom.js"></script>
   <script type="text/javascript">
    $('document').ready(function() {
		setDatePicker()
        setDateRangePicker(".startdate", ".enddate")
        setMonthPicker()
        setYearPicker()
        setYearRangePicker(".startyear", ".endyear")
   });
   
   
   </script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>

    <!-- navbar -->
    <!-- navbar -->
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
            <li><a href="<?= base_url('welcome/schedule');?>">Planning Production</a></li>
            <li><a href="<?= base_url('welcome/pc_plant01');?>">Plant 01</a></li>
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
    <!-- akhir navbar -->
    <!-- akhir navbar -->
    
    <!-- jumbotron -->

    <!-- akhir jumbotron -->


    <!-- about -->
    <section class="draw" id="draw">
    
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
          
            <h4 class="text-center"><?= $title;?></h4>
            <hr>
          </div>
        </div>
		

		</div>
      
<div class="container">
<form class="form-inline">
  <div class="form-group">
                    <label>Period:</label>

                    <div class="input-group">
                        <input type="text" class="form-control startdate" placeholder="Start Date"/>
                        <span class="input-group-addon">To</span>
                        <input type="text" class="form-control enddate" placeholder="End Date"/>
                    </div>
                </div>

  <button type="button" name="submit" class="btn btn-info">Submit</button>
</form>
<br>
    
   <table class="table table-striped report" >      
      <thead>
	
        <tr>
          <th>MC</th>
          <th>PR</th>
          <th>Customer</th>
          <th>Draw No</th>
          <th>Estimate </th>
          <th>Actual</th>
          <th>Mold</th>
          <th>Setting</th>
          <th>Material</th>
          <th>Measurement</th>
          <th>Approve</th>
          <th>Man Power</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody >
						<?php   
						$no=1;
								foreach ($nomor as $row) {?>
								
								     <tr>
											<th scope="row"><?= $row->id_mc;?></th>
											  <td><?= strtoupper($row->kasus);?></td>
											  <td><?= $row->customer;?></td>
											  <td><?= $row->draw_no;?></td>
											  <td><?= $row->estimate;?></td>
											  <td><?= $row->actual;?></td>
											  <td><?= $row->mold;?></td>
											  <td><?= $row->sett;?></td>
											  <td><?= $row->mat;?></td>
											  <td><?= $row->tes;?></td>
											  <td><?= $row->app;?></td>
											  <td><?= $row->man;?></td>
											  <td><?= $row->status;?></td>
									</tr>
								
						<?php
								}
						?>
      </tbody>
    </table>
  
</div>
    </section>
    <!-- akhir about -->
    
    <!-- footer -->
    <footer>
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <p> Copyright &copy;2022  by IT SPIN</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- akhir footer -->
  </body>
</html>