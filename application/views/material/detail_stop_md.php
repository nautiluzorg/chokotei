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
										
									
									
										<div class="col-md-12">
												<label class="checkbox-inline">
												  <?= isset($problem['mat']) ? "<span class='text-success'><strong><input type='checkbox' disabled='disabled' checked><small>DONE <br>@".$problem['mat']."<br> BY MATERIAL</small></strong></span>" : "<span class='text-danger'><strong><input type='checkbox' disabled='disabled'>MATERIAL ON PROGRESS BY MATERIAL</strong></span>";?>
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
				  <a href="<?= base_url('matcont/layout01');?>"><button type="button" class="btn btn-primary btn-block btn-lg">OK</button></a>
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