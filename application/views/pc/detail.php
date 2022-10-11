<script type="text/javascript">

    $('document').ready(function() {
		
	
	$("#btnSchedule").click(function(){
		
			var mc_code = $(this).data("nomesin");
			let curstatus = $(".posted_in").data("curstatus");
			
					$.ajax({
							type: 'POST',
							data: {'kode':mc_code,'status':curstatus},
							url: '<?= base_url() . 'prodcont/tambahJadwal' ?>',
							dataType: 'html',
							success: function(hasilAdd) {
								
								$("div.bhoechie-tab").html(hasilAdd);

							}
                    });		
			
	});
	
	$("div.bhoechie-tab-menu>div.pro-img-details").on('click',function() {
	  
	   var kode = $(this).data("mc");
	   
			$.ajax({
					type: 'POST',
					data: 'kode=' + kode,
					url: '<?= base_url() . 'prodcont/getDetailMesinPc' ?>',
					dataType: 'html',
					success: function(hasilAdd) {
						$("#about").html(hasilAdd);

					}
			}); 
		
		  
	 });
	
	
		

		
				
   });
	
</script>


	<div class="container">
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
						  
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3" for="first-name"><span> <strong>LINE NO</strong></span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												:<span> <strong id="no-machine" data-machine="<?= $mesin['id'];?>"><?= $mesin["id"];?></strong></span>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3" for="last-name"><span> <strong>DRAW NO </strong></span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												:<span> <strong id="drawing-no" data-drawing="<?= $mesin["draw_no"];?>"><?= $mesin["draw_no"];?></strong></span>
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3"><span><strong>STATUS</strong></span></label>
											<div class="col-md-6 col-sm-6 ">
												:<span class="posted_in" data-curstatus="<?= strtoupper($mesin["status"]);?>"> <strong><?= strtoupper($mesin['status']);?></strong></span>
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3"><span> <strong>CONDITION</strong></span></label>
											<div class="col-md-6 col-sm-6 ">
												:<span class="posted_in"> <strong><?= strtoupper($mesin['sub_status']);?></strong></span>
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3"><span> <strong>CUSTOMER</strong></span></label>
											<div class="col-md-6 col-sm-6 ">
												:<span class="posted_in"> <strong><?= getCustomer($mesin["draw_no"]);?></strong></span>
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3"><span> <strong>AREA</strong></span></label>
											<div class="col-md-6 col-sm-6 ">
												:<span class="posted_in"> <strong> PLANT <?= $mesin["area"];?></strong></span>
											</div>
										</div>

					  <p>
						  
						  <a href="<?= base_url('pccont/layout1');?>"><button type="button" class="btn btn-primary btn-block btn-lg">OK</button></a>
					  </p>
				<div class="row">
			<div class="col-md-6">			  
			 <h4 class="text-info">Schedule Production</h4>
			</div>
			<div class="col-md-6 text-right">
						<button type="button" class="btn btn-sm btn-info" id="btnSchedule" data-nomesin="<?= $mesin['id'];?>">Add Shcedule</button>	
			</div>
			</div>
			<table class="table table-striped schedule" >
				  <thead>
					<tr>
					  <th>No</th>
					  <th>Draw No</th>
					  <th>Customer</th>
					  <th>Run Date</th>
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
												   <td><?= is_null($row->tanggal) ? 'Belum Terjadwal' : $row->tanggal;?></td>
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
