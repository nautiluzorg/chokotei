<script type="text/javascript">
	function readOnlyCheckBox() {
				return false;
		}
	document.getElementById("running").disabled = true;
	
	//CHECKBOX UNTUK LIST YANG SUDAH MENGEERJAKAN******
    if ($('.abc:checked').length == $('.abc').length) {
       
				document.getElementById("running").disabled = false;
				
				let idproblem = $("#running").data("id");
				
				
					$.ajax({
							type: 'POST',
							data: 'kode=' + idproblem,
							url: '<?= base_url() . 'Welcome/updateStatusProblem' ?>',
							dataType: 'html',
							success: function(hasilAdd) {}
                    });	
	}else{
			
			document.getElementById("running").disabled = true;
		}
	
	
	
	$("#btnSchedule").click(function(){
		
			var mc_code = $(".posted_in").data("kode");
			let curstatus = $("#data-status").data("curstatus");
			
			//alert(curstatus);
		
		
					$.ajax({
							type: 'POST',
							data: {'kode':mc_code,'status':curstatus},
							url: '<?= base_url() . 'Welcome/tambahJadwal' ?>',
							dataType: 'html',
							success: function(hasilAdd) {
								$("#about").html(hasilAdd);

							}
                    });		
		
	});
	
	
	$("#running").click(function(){
		
			//var mc_code = $(".posted_in").data("kode");
			//let curstatus = $("#data-status").data("curstatus");
			var kode 		= $(this).data("id");
			var kodeProblem = $(".pro-img-details").data("idproblem");
			//alert(kodeProblem);
			
               //alert("No :" +machine+" "+problem+" "+drawing+" "+estimate+" "+kelas+" "+sub_status);
	
						$.ajax({
							
							type: 'POST',
                            data: { 'kode':kode,'kodeproblem':kodeProblem},
                            dataType:'json',
							url: '<?= base_url() . 'Welcome/runMachine' ?>',
							success: function(resp) {
								
                                 if (resp.status == "success")
                                    window.location.href = resp.redirect_url;
							}
						});
                    return false;
	
		
	});
</script>
<div class="container">
<div class="row">
<div class="col-md-12">
<section class="panel">
      <div class="panel-body">
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
												  <?= isset($problem['man']) ? "<span class='text-success'><strong><input type='checkbox' disabled='disabled' checked> MAN POWER DONE <br>@".$problem['man']."<br> BY PRODUCTION</strong></span>" : "<span class='text-danger'><strong><input type='checkbox' disabled='disabled'> MAN POWER ON PROGRESS BY PRODUCTION</strong></span>";?>
												</label>
										</div>
									</div>
										
										
							
										 
									</div>
						</fieldset> 
       </div>
                           
          </div>
          <div class="col-md-6">
              <h2 class="pro-d-title">
                 
                      <?= strtoupper($title." ".$kode);?>
                 
              </h2>
			  
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3" for="first-name"><span> <strong>LINE NO</strong></span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												:<span> <strong class="posted_in" data-kode="<?= $kode;?>">:<?= $kode;?></strong></span>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3" for="last-name"><span> <strong>DRAW NO </strong></span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												:<span> <strong>:<?= strtoupper($problem["draw_no"]);?></strong></span>
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3"><span><strong>STATUS</strong></span></label>
											<div class="col-md-6 col-sm-6 ">
												:<span class="posted_in" id="data-status" data-curstatus="<?= $problem["status"];?>"> <strong>:<?= strtoupper($problem["status"]);?></strong></span>
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3"><span><strong>DATE</strong></span></label>
											<div class="col-md-6 col-sm-6 ">
												:<span class="posted_in" id="data-terjadi" data-terjadi="<?= $problem["ciptakan"];?>"> <strong>:<?= strtoupper($problem["ciptakan"]);?></strong></span>
											</div>
										</div>
										
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3"><span> <strong>REASON</strong></span></label>
											<div class="col-md-6 col-sm-6 ">
												:<span class="posted_in"> <strong>:<?= strtoupper($problem["sub_status"]);?></strong></span>
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3"><span> <strong>CUSTOMER</strong></span></label>
											<div class="col-md-6 col-sm-6 ">
												:<span class="posted_in"> <strong>:<?= strtoupper($problem["customer"]);?></strong></span>
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3"><span> <strong>AREA</strong></span></label>
											<div class="col-md-6 col-sm-6 ">
												:<span class="posted_in" data-code="<?= $kode;?>"> <strong>:PLANT <?= $problem["area"];?></strong></span>
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
					<button type="button" class="btn btn-sm btn-info" id="btnSchedule" data-nomesin="<?= $problem['id_mc'];?>">Add Shcedule</button>	
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
</div>
</div>
</section>
</div>
</div>
</div>
