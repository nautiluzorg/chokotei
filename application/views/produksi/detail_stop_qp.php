<script type="text/javascript">
$('document').ready(function() {
	
	
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
							url: '<?= base_url() . 'Prodcont/runMachine' ?>',
							success: function(resp) {
								
                                 if (resp.status == "success")
                                    window.location.href = resp.redirect_url;
							}
						});
                    return false;
	
		
	});
	
		//UPDATE DATETIME FOR INSTALLATION MOLD********
		  $(".update-time").on('click',function() {
				  
				var kodePlan 	= $(this).data("waktu");
				var kodeMesin 	= $(".posted_in").data("kode");
				var kodeStatus 	= $("#data-status").data("curstatus");
				
				//alert(kodeMesin+' '+kodePlan+' '+kodeStatus);
                       
			
					$.ajax({
						
							type: 'POST',
							data: { 'kodePlan':kodePlan,'kodeMesin':kodeMesin,'kodeStatus':kodeStatus},
							url: '<?= base_url() . 'Welcome/tambahWaktu' ?>',
							dataType: 'html',
							success: function(hasilAdd) {
								$("div.bhoechie-tab").html(hasilAdd);
							}
						}); 
          });
	
});
	
</script>
<div class="container">
<div class="row">

          <div class="col-md-6">
              <div class="pro-img-details <?= $problem["kelas"];?>" data-idproblem="<?= $problem["id"];?>">
                  <h3><?= strtoupper($problem["sub_status"]);?></h3>
                  
              </div>
              <div class="pro-img-list">
				                    
						<fieldset class="scheduler-border">
							<legend class="scheduler-border text-danger"><?= strtoupper('CURRENT ACTIVITY');?></legend>
								<div class="control-group">
										
										<div class="row">
										
										<div class="col-md-6">
												<label class="checkbox-inline">
												  <input type="checkbox" id="cek1" class="abc" value="option1" onClick="return readOnlyCheckBox()" <?= isset($problem['mold']) ? 'checked' : '';?>> MOLD PREPARE
												</label>	
										</div>
										<div class="col-md-6">
												<label class="checkbox-inline">
												  <input type="checkbox" id="cek2" class="abc" value="option2" onClick="return readOnlyCheckBox()" <?= isset($problem['sett']) ? 'checked' : '';?>> SETUP MACHINE
												</label>
										</div>
										
										</div>
										
										<div class="row">
										
										<div class="col-md-6">
												<label class="checkbox-inline">
												  <input type="checkbox" id="cek4" class="abc" value="option4" onClick="return readOnlyCheckBox()" <?= isset($problem['tes']) ? 'checked' : '';?>> MEASURING 
												</label>
										</div>
										
										<div class="col-md-6">
												<label class="checkbox-inline">
												  <input type="checkbox" id="cek5" class="abc" value="option5" onClick="return readOnlyCheckBox()" <?= isset($problem['app']) ? 'checked' : '';?>>APPROVAL
												</label>
										</div>
								
										
									
										</div>
										 
									</div>
						</fieldset>         
				</div>
            
		  <div class="pro-img-list">

		   <button type="button" name="running" class="btn btn-block btn-lg btn-success" id="running" data-id="<?= $kode;?>">START</button>
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
				  <a href="<?= base_url('prodcont/layout1');?>"><button type="button" class="btn btn-primary btn-block btn-lg">OK</button></a>
              </p>
			  
				<div class="row">
				<div class="col-md-6">			  
					<h4 class="text-info">Schedule Production</h4>
				</div>
				<div class="col-md-6 text-right">
						
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
						  <th>Aksi</th>
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
													  <td><a href="javascript:void(0);" data-waktu="<?= $row->id;?>" class="update-time">
															<button type="button" class="btn btn-info btn-sm">
																	<span class="glyphicon glyphicon-time" aria-hidden="true"></span>Update
															</button>
														  </a>
													  </td>
											</tr>
										
								<?php
										}
								?>
					  </tbody>
				</table>
</div>

</div>
</div>
