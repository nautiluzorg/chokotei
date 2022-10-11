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
</head>
<body>
<br><br>



<div class="container">
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
										
										<div class="col-md-6">
												<label class="checkbox-inline">
												  <?= isset($problem['mold']) ? "<span class='text-success'><input type='checkbox' disabled='disabled' checked><strong><small>DONE <br>@".$problem['mold']."<br> BY TECHNICIAN</small></strong></span>" : "<span class='text-danger'><strong><input type='checkbox' disabled='disabled'>MOLD ON PROGRESS BY TECHNICIAN</strong></span>";?>
												</label>	
										</div>
										<div class="col-md-6">
												<label class="checkbox-inline">
												  <?= isset($problem['sett']) ? "<span class='text-success'><strong><input type='checkbox' disabled='disabled' checked><small>DONE <br>@".$problem['sett']."<br> BY TECHNICIAN</small></strong></span>" : "<span class='text-danger'><strong><input type='checkbox' disabled='disabled'>SETTING MACHINE ON PROGRESS BY TECHNICIAN</strong></span>";?>
												</label>
										</div>
										
										</div>
										
										
										<div class="row"><br>
										<div class="col-md-6">
												<label class="checkbox-inline">
												  <?= isset($problem['tes']) ? "<span class='text-success'><strong><input type='checkbox' disabled='disabled' checked><small>DONE <br>@".$problem['tes']."<br> BY QUALITY</small></strong></span>" : "<span class='text-danger'><strong><input type='checkbox' disabled='disabled'>MEASURING ON PROGRESS BY QUALITY</strong></span>";?>
												</label>
										</div>
										<div class="col-md-6">
												<label class="checkbox-inline">
												  <?= isset($problem['app']) ? "<span class='text-success'><strong><input type='checkbox' disabled='disabled' checked><small>DONE <br>@".$problem['app']."<br> BY QUALITY</small></strong></span>": "<span class='text-danger'><strong><input type='checkbox' disabled='disabled'>APPROVAL ON PROGRESS BY QUALITY</strong></span>";?>
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
				  <a href="<?= base_url('auth/plant01');?>"><button type="button" class="btn btn-primary btn-block btn-lg">OK</button></a>
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