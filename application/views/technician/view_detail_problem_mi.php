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
<link href="<?= base_url('assets/template')?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
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
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">LAYOUT MACHINE PLANT 01</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   
   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= base_url('techcont');?>"><i class="fa fa-bars"></i> Main Menu</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?= $user['name'];?> <span class="caret"></span></a>
          
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('prodcont/profile');?>"><i class="fa fa-user pull-right"></i> Profile</a></li>
            <li><a href="#"><i class="fa fa-lock pull-right"></i> Password</a></li>
            <li><a href="#"><i class="fa fa-book pull-right"></i> Guidance</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= base_url('auth/logout');?>"><i class="fa fa-sign-out pull-right"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <!-- akhir navbar -->
    
    <!-- jumbotron -->

    <!-- akhir jumbotron -->


    <!-- about -->
<section class="about" id="about">


<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 bhoechie-tab-container">

          <div class="col-md-6">
              <div class="pro-img-details <?= $problem["kelas"];?>" data-idproblem="<?= $problem["id"];?>">
                  <h3><?= strtoupper($problem["sub_status"]);?></h3>
                  
              </div>
              <div class="pro-img-list">
				                    
						<fieldset class="scheduler-border">
							<legend class="scheduler-border text-info"><?= strtoupper('current activity');?></legend>
								<div class="control-group">
										
									<div class="row">
										
										<div class="col-md-4">
												<label class="checkbox-inline">
												  <?= isset($problem['mold']) ? "<span class='text-success'><input type='checkbox' disabled='disabled' checked><strong><small>DONE <br>@".$problem['mold']."<br> BY TECHNICIAN</small></strong></span>" : "<span class='text-danger'><strong><input type='checkbox' disabled='disabled'>MOLD ON PROGRESS BY TECHNICIAN</strong></span>";?>
												</label>	
										</div>
										<div class="col-md-4">
												<label class="checkbox-inline">
												  <?= isset($problem['sett']) ? "<span class='text-success'><strong><input type='checkbox' disabled='disabled' checked><small>DONE <br>@".$problem['sett']."<br> BY TECHNICIAN</small></strong></span>" : "<span class='text-danger'><strong><input type='checkbox' disabled='disabled'>SETTING MACHINE ON PROGRESS BY TECHNICIAN</strong></span>";?>
												</label>
										</div>
										<div class="col-md-4">
												<label class="checkbox-inline">
												  <?= isset($problem['mat']) ? "<span class='text-success'><strong><input type='checkbox' disabled='disabled' checked><small>DONE <br>@".$problem['mat']."<br> BY MATERIAL</small></strong></span>" : "<span class='text-danger'><strong><input type='checkbox' disabled='disabled'>MATERIAL ON PROGRESS BY MATERIAL</strong></span>";?>
												</label>
										</div>
										</div>
										
										
										<div class="row"><br>
										<div class="col-md-4">
												<label class="checkbox-inline">
												  <?= isset($problem['tes']) ? "<span class='text-success'><strong><input type='checkbox' disabled='disabled' checked><small>DONE <br>@".$problem['tes']."<br> BY QUALITY</small></strong></span>" : "<span class='text-danger'><strong><input type='checkbox' disabled='disabled'>MEASURING ON PROGRESS BY QUALITY</strong></span>";?>
												</label>
										</div>
										<div class="col-md-4">
												<label class="checkbox-inline">
												  <?= isset($problem['app']) ? "<span class='text-success'><strong><input type='checkbox' disabled='disabled' checked><small>DONE <br>@".$problem['app']."<br> BY QUALITY</small></strong></span>": "<span class='text-danger'><strong><input type='checkbox' disabled='disabled'>APPROVAL ON PROGRESS BY QUALITY</strong></span>";?>
												</label>
										</div>
										<div class="col-md-4">
												<label class="checkbox-inline">
												   <?= isset($problem['man']) ? "<span class='text-success'><strong><input type='checkbox' disabled='disabled' checked><small>DONE <br>@".$problem['man']."<br> BY PRODUCTION</small></strong></span>" : "<span class='text-danger'><strong><input type='checkbox' disabled='disabled'>OPERATOR ON PROGRESS PRODUCTION</strong></span>";?>
												</label>
										</div>
							
									</div>
										 
									</div>
						</fieldset>         
				</div>
          </div>
          <div class="col-md-6 bhoechie-tab">
              <h2 class="pro-d-title">
                 
                      <?= strtoupper($title." ".$kode);?>
                 
              </h2>
			  <dl class="dl-horizontal">
			  
					 <div class="product_meta">
						<dt><span> <strong>LINE</strong></span></dt>
						<dd><span> <strong class="posted_in" data-kode="<?= $kode;?>">:<?= $kode;?></strong></span></dd>
					</div>
					 <div class="product_meta">
						<dt><span> <strong>DRAW NO</strong></span></dt>
						<dd><span> <strong>:<?= strtoupper($problem["draw_no"]);?></strong></span></dd>
					</div>
					
					 <div class="product_meta">
						<dt><span> <strong>STATUS</strong></span></dt>
						<dd><span class="posted_in" id="data-status" data-curstatus="<?= $problem["status"];?>"> <strong>:<?= strtoupper($problem["status"]);?></strong></span></dd>
					</div>
					
					<div class="product_meta">
						<dt><span> <strong>PROBLEM DATE</strong></span></dt>
						<dd><span class="posted_in"> <strong>:<?= strtoupper($problem["ciptakan"]);?></strong></span></dd>
					</div>
					 <div class="product_meta">
						<dt><span> <strong>STOP REASON</strong></span></dt>
						<dd><span class="posted_in"> <strong>:<?= strtoupper($problem["sub_status"]);?></strong></span></dd>
					</div>
					
					 <div class="product_meta">
						<dt><span><strong>CUSTOMER</strong></span></dt>
						<dd><span class="posted_in"> <strong>:<?= strtoupper($problem["customer"]);?></strong></span></dd>
					</div>
					 <div class="product_meta">
						<dt><span><strong>AREA</strong></span></dt>
						<dd><span class="posted_in" data-code="<?= $kode;?>"> <strong>:PLANT <?= $problem["area"];?></strong></span></dd>
					</div>
			  </dl>

              <p>
				  <a href="<?= base_url('techcont/problem');?>"><button type="button" class="btn btn-primary btn-block btn-lg">OK</button></a>
              </p>
			  
				<div class="row">
					<div class="col-md-6">			  
						<h4 class="text-info">SCHEDULE NEXT PRODUCTION</h4>
					</div>
					<div class="col-md-6">
							
					</div>
				</div>

				<table class="table table-striped schedule" >
					  <thead>
						<tr>
						  <th>No</th>
						  <th>Draw No</th>
						  <th>Customer</th>
						  <th>Running Time</th>
						  <th>Qty</th>
						  
						</tr>
					  </thead>
					  <tbody >
								<?php   
								$no=1;
											foreach ($schedules as $row) {?>
										
											 <tr>
													<td><?= $no++;?></td>
													<td><?= $row->draw_no;?></td>
													  <td><?= getCustomer($row->draw_no);?></td>
													  <td><?= is_null($row->tanggal) ? 'Belum Terjadwal' : $row->tanggal;?>
													  </td>
													  <td><?= $row->jumlah;?></td>
													
											</tr>
										
								<?php
										}
								?>
					  </tbody>
				</table>
</div>

</div>
</div>
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




