<script type="text/javascript">

    $('document').ready(function(){});

</script>
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12 col-md-12 bhoechie-tab-container">
            <div class="col-md-4 bhoechie-tab-menu">
			
			<div class="pro-img-details <?= $mesin["kelas"];?>" data-mc="<?= $mesin["id"];?>RUN">

					<h3><?= $mesin["id"];?></h3>
					<h2>MACHINE RUNNING</h2>
			</div>
			
     
            </div>
            <div class="col-md-8 bhoechie-tab">
						 <!-- dri sini -->
	
			
				    <div class="bhoechie-tab-content active">
									 		<section id="informasi">
						  <h2 class="pro-d-title">
							 
								  <?= strtoupper($title." ".$kode);?>
							 
						  </h2>
						  
						  <dl class="dl-horizontal">
								<div class="product_meta">
											<dt><span> <strong>LINE NO</strong></span></dt>
											<dd><span> <strong id="no-machine" data-machine="<?= $mesin['id'];?>">:<?= $mesin["id"];?></strong></span></dd>
								</div>
								<div class="product_meta">
											<dt><span> <strong>DRAW NO</strong></span></dt>
											<dd><span> <strong id="drawing-no" data-drawing="<?= $mesin["draw_no"];?>"><?= $mesin["draw_no"];?></strong></span></dd>
								</div>
								<div class="product_meta">
									<dt><span> <strong>STATUS</strong></span></dt>
									<dd><span class="posted_in" data-curstatus="<?= strtoupper($mesin["status"]);?>"> <strong>:<?= strtoupper($mesin['status']);?></strong></span></dd>
								</div>
									
								
								<div class="product_meta">
									<dt><span> <strong>CONDITION</strong></span></dt>
									<dd><span class="posted_in"> <strong>:<?= strtoupper($mesin['sub_status']);?></strong></span></dd>
								</div>
								
								<div class="product_meta">
									<dt><span><strong>CUSTOMER</strong></span></dt>
									<dd><span class="posted_in"> <strong>:<?= getCustomer($mesin["draw_no"]);?></strong></span></dd>
								</div>
								 <div class="product_meta">
									<dt><span><strong>AREA</strong></span></dt>
									<dd><span class="posted_in"> <strong>:PLANT <?= $mesin["area"];?></strong></span></dd>
								</div>
						  </dl>

					  <p>
						  
						  <a href="<?= base_url('quacont/layout01');?>"><button type="button" class="btn btn-primary btn-block btn-lg">OK</button></a>
					  </p>
				<div class="row">
			<div class="col-md-6">			  
			 <h4 class="text-info">SCHEDULE NEXT PRODUCTION</h4>
			</div>
			<div class="col-md-6 text-right">
						
			</div>
			</div>
			<table class="table table-sm table-striped schedule" >
				  <thead>
					<tr>
					  <th>NO</th>
					  <th width="20%">DRAW NO</th>
					  <th>CUSTOMER</th>
					  <th>DATE</th>
					  <th>ESTIMATE</th>
					  <th>QTY</th>
					  
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
												  <td><?= $row->tanggal;?>
												  <td><?= is_null($row->planning) ? 'Belum Terjadwal' : substr($row->planning,-17,-3);?></td>
												  <td><?= $row->jumlah;?></td>
												  
											
										</tr>
									
							<?php
									}
							?>
				  </tbody>
				</table>
 </section> 
					
                </div>
				
            </div>
        </div>
  </div>
  </div>


