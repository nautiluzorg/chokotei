<script type="text/javascript">

    $('document').ready(function() {
		
	$('.add_problem').prop('disabled', true);
	$('#mold_washing').prop('disabled', true);
	$('#quality_problem').prop('disabled', true);
	$('#machine_problem').prop('disabled', true);
	$('#material_delay').prop('disabled', true);
	$('#man_power').prop('disabled', true);

    //KETIKA TOMBOL CHECKED DI CENTANG****
	  $(".cek").on("click", function() {

		if ($(".cek:checked").length > 0) {
			
		  $('.add_problem').prop('disabled', false);
		  $('#mold_washing').prop('disabled', false);
		  $('#quality_problem').prop('disabled', false);
		  $('#machine_problem').prop('disabled', false);
		  $('#material_delay').prop('disabled', false);
		  $('#man_power').prop('disabled', false);
		  
		} else {

		  $('.add_problem').prop('disabled', true);
		  $('#mold_washing').prop('disabled', true);
		  $('#quality_problem').prop('disabled', true);
		  $('#machine_problem').prop('disabled', true);
		  $('#material_delay').prop('disabled', true);
		  $('#man_power').prop('disabled', true);
		  
		}
	  });
		
		
    //ACTION UNTUK MOLD INSTALLATION******
	$(".add_problem").on('click',function() {
			
               var machine 		= $("#kodemachine").val();
               var problem 		= $("#problem").val();
			   var drawing 		= $("#drawNumb").val();
			   var kelas 		= $("#kelas").val();
			   var sub_status 	= $("#sub_status").val();
			   var remark	 	= 'Mold Installation';
			   
					$.ajax({
							
							type: 'POST',
                            data: { 'kode':machine, 'problem':problem,'drawing':drawing,'kelas':kelas,'sub_status':sub_status,'remark':remark},
                            dataType:'json',
							url: '<?= base_url() . 'Prodcont/insertProblem' ?>',
							success: function(resp) {
								
                                 if (resp.status == "success")
                                    window.location.href = resp.redirect_url;
							}
						});
						
                    return false;
			    
    });
	
	//ACTION UNTUK MOLD WASHING******
	$("#mold_washing").on('click',function() {
			
               var machine 		= $("#kodemachinemw").val();
               var problem 		= $("#problemmw").val();
			   var drawing 		= $("#drawNumbmw").val();
			   var kelas 		= $("#kelasmw").val();
			   var sub_status 	= $("#sub_statusmw").val();
			   var remark	 	= $("#remarkmw").val();
			   
			   //alert(machine+' '+problem+' '+drawing+' '+kelas+' '+sub_status+' '+remark);
			   
			   
					$.ajax({
							
							type: 'POST',
                            data: { 'kode':machine, 'problem':problem,'drawing':drawing,'kelas':kelas,'sub_status':sub_status,'remark':remark},
                            dataType:'json',
							url: '<?= base_url() . 'Prodcont/insertProblem' ?>',
							success: function(resp) {
								
                                 if (resp.status == "success")
                                    window.location.href = resp.redirect_url;
							}
						});
						
                    return false;
			    
    });
	
	//ACTION UNTUK QUALITY PROBLEM******
	$("#quality_problem").on('click',function() {
			
               var machine 		= $("#kodemachineqp").val();
               var problem 		= $("#problemqp").val();
			   var drawing 		= $("#drawNumbqp").val();
			   var kelas 		= $("#kelasqp").val();
			   var sub_status 	= $("#sub_statusqp").val();
			   var remark	 	= $("#remarkqp").val();
			   
			   //alert(machine+' '+problem+' '+drawing+' '+kelas+' '+sub_status+' '+remark);
			   
					$.ajax({
							
							type: 'POST',
                            data: {'kode':machine, 'problem':problem,'drawing':drawing,'kelas':kelas,'sub_status':sub_status,'remark':remark},
                            dataType:'json',
							url: '<?= base_url() . 'Prodcont/insertProblem' ?>',
							success: function(resp) {
								
                                 if (resp.status == "success")
                                    window.location.href = resp.redirect_url;
							}
						});
						
                    return false;
			    
    });
	
	//ACTION UNTUK MACHINE PROBLEM******
	$("#machine_problem").on('click',function() {
			
               var machine 		= $("#kodemachinepm").val();
               var problem 		= $("#problempm").val();
			   var drawing 		= $("#drawNumbpm").val();
			   var kelas 		= $("#kelaspm").val();
			   var sub_status 	= $("#sub_statuspm").val();
			   var remark	 	= $("#remarkpm").val();
			   
			   
					$.ajax({
							
							type: 'POST',
                            data: {'kode':machine, 'problem':problem,'drawing':drawing,'kelas':kelas,'sub_status':sub_status,'remark':remark},
                            dataType:'json',
							url: '<?= base_url() . 'Prodcont/insertProblem' ?>',
							success: function(resp) {
								
                                 if (resp.status == "success")
                                    window.location.href = resp.redirect_url;
							}
						});
						
                    return false;
			    
    });
	
	//ACTION UNTUK MATERIAL DELAY******
	$("#material_delay").on('click',function() {
			
               var machine 		= $("#kodemachinemd").val();
               var problem 		= $("#problemmd").val();
			   var drawing 		= $("#drawNumbmd").val();
			   var kelas 		= $("#kelasmd").val();
			   var sub_status 	= $("#sub_statusmd").val();
			   var remark	 	= $("#remarkmd").val();
			   
			   
					$.ajax({
							
							type: 'POST',
                            data: {'kode':machine, 'problem':problem,'drawing':drawing,'kelas':kelas,'sub_status':sub_status,'remark':remark},
                            dataType:'json',
							url: '<?= base_url() . 'Prodcont/insertProblem' ?>',
							success: function(resp) {
								
                                 if (resp.status == "success")
                                    window.location.href = resp.redirect_url;
							}
						});
						
                    return false;
			    
    });
	
		//ACTION UNTUK MAN POWER******
	$("#man_power").on('click',function() {
			
               var machine 		= $("#kodemachinemp").val();
               var problem 		= $("#problemmp").val();
			   var drawing 		= $("#drawNumbmp").val();
			   var kelas 		= $("#kelasmp").val();
			   var sub_status 	= $("#sub_statusmp").val();
			   var remark	 	= $("#remarkmp").val();
			   
					$.ajax({
							
							type: 'POST',
                            data: {'kode':machine, 'problem':problem,'drawing':drawing,'kelas':kelas,'sub_status':sub_status,'remark':remark},
                            dataType:'json',
							url: '<?= base_url() . 'Prodcont/insertProblem' ?>',
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
				var kodeMesin 	= $("#no-machine").data("machine");
				var kodeStatus 	= $(".posted_in").data("curstatus");
				
				//alert(kodeMesin+' '+kodePlan+' '+kodeStatus);
                		 
				   
					$.ajax({
						
							type: 'POST',
							data: { 'kodePlan':kodePlan,'kodeMesin':kodeMesin,'kodeStatus':kodeStatus},
							url: '<?= base_url() . 'Prodcont/tambahWaktu' ?>',
							dataType: 'html',
							success: function(hasilAdd) {
								$("div.bhoechie-tab").html(hasilAdd);
							}
						}); 
				
          });
						
   });

	
	$('.datetime').datetimepicker({
		
		  autoclose: 1,        //language:  'fr',
		  weekStart: 1,
		  todayBtn:  1,
		  autoclose: 1,
		  todayHighlight: 1,
		  startView: 2,
		  forceParse: 0,
		  showMeridian: 1
        
    });
	
		
	//Tabss Menu
	
		
		$(function() {
			
			$("div.bhoechie-tab-menu>div.list-group>a.list-group-item").click(function(e) {
				
				
					e.preventDefault();
					$(this).siblings('a.active').removeClass("active");
					$(this).addClass("active");
					var index = $(this).index();
					$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
					$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
				
			});
		});
		
		$("div.bhoechie-tab-menu>div.pro-img-details").on('click',function() {
              
               var kode = $(this).data("mc");
               
					$.ajax({
							type: 'POST',
							data: 'kode=' + kode,
							url: '<?= base_url() . 'Prodcont/getDetailMesinProd' ?>',
							dataType: 'html',
							success: function(hasilAdd) {
								$("#about").html(hasilAdd);

							}
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
			<h4 class="text-center">SELECT PROBLEM</h4>
              <div class="list-group">
				 <a href="javascript:void(0);" class="list-group-item text-center">
                  <h3></h3>
                </a>
			  
                <a href="javascript:void(0);" class="list-group-item text-left" data-nilai="mi">
                  <h3>MOLD INSTALLATION</h3>
                </a>
                <a href="javascript:void(0);" class="list-group-item text-left" data-nilai="mw">
                  <h3>MOLD WASHING</h3>
                </a>
                <a href="javascript:void(0);" class="list-group-item text-left" data-nilai="qp">
                  <h3>QUALITY PROBLEM</h3>
                </a>
                <a href="javascript:void(0);" class="list-group-item text-left" data-nilai="pm">
                  <h3>MACHINE PROBLEM</h3>
                </a>
                <a href="javascript:void(0);" class="list-group-item text-left" data-nilai="md">
                  <h3>MATERIAL DELAY</h3>
                </a>
				
				<a href="javascript:void(0);" class="list-group-item text-left" data-nilai="mp">
                  <h3>MAN POWER</h3>
                </a>
				
				
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
						  
						  <a href="<?= base_url('prodcont/layout1');?>"><button type="button" class="btn btn-primary btn-block btn-lg">OK</button></a>
					  </p>
				<div class="row">
			<div class="col-md-6">			  
			 <h4 class="text-info">Schedule Production</h4>
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
					  <th>AKSI</th>
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
												  
												  <td><a href="javascript:void(0);" data-waktu="<?= $row->id;?>" class="update-time">
														<button type="button" class="btn btn-info btn-sm">
																<small><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Update</small>
														</button>
													  </a>
													  <a href="javascript:void(0);" data-done="<?= $row->id;?>">
														<button type="button" class="btn btn-success btn-sm">
																<small><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Done</small>
														</button>
													  </a>
													  
													  
													  
												  </td>
										</tr>
									
							<?php
									}
							?>
				  </tbody>
				</table>
 </section> 
					
                </div>
                <!-- flight section -->
                <div class="bhoechie-tab-content">
                    <h2 class="pro-d-title" style="color:#55518a">MOLD INSTALLATION</h2><br>
					
					<fieldset class="scheduler-border">
						<legend class="scheduler-border">MOLD INSTALLATION</legend>
					
											<form class="form-horizontal">
												<input type="hidden" name="kodemachine" id="kodemachine" value="<?= $mesin['id'];?>">
												<input type="hidden" name="problem" id="problem" value="mi">
												<input type="hidden" name="kelas" id="kelas" value="btn-mold-installation">
												<input type="hidden" name="sub_status" id="sub_status" value="mold installation">
												  <div class="form-group">
													<label for="inputPassword3" class="col-md-3 control-label text-right" style="text-align:left;font-size:14px;color:#55518a">INSTALL MOLD</label>
													<div class="col-md-9">
													
														
															  <select name="drawNumb" id="drawNumb" class="form-control" required>
																<option value="" readonly selected>-Draw No-</option>
																<?php foreach ($schedules as $sch) {?>
																
																		<option value="<?= $sch->draw_no;?>"><?= $sch->draw_no;?></option>
																
																<?php } ?>
																  
																</select>  
													</div>
												  </div>
												    
												  <div class="form-group">
													<div class="col-md-offset-3 col-md-9">
													  <div class="checkbox">
														<label>
														  <input type="checkbox" class="cek"> PASTIKAN DATA BENAR.
														</label>
													  </div>
													</div>
												  </div>
												  <div class="form-group">
													<div class="col-md-offset-3 col-md-9">
													  <button type="button" name="submit" id="submit" class="btn btn-info add_problem">Submit</button>
												   
													</div>
												  </div>
											</form>
					</fieldset>
					
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content">
					<h2 class="pro-d-title" style="color:#55518a">MOLD WASHING</h2><br>
					
					<fieldset class="scheduler-border">
						<legend class="scheduler-border">INPUT DATA FOR MOLD WASHING</legend>
					
											<form class="form-horizontal">
												<input type="hidden" name="kodemachinemw" id="kodemachinemw" value="<?= $mesin['id'];?>">
												<input type="hidden" name="problemmw" id="problemmw" value="mw">
												<input type="hidden" name="kelasmw" id="kelasmw" value="btn-mold-washing">
												<input type="hidden" name="sub_statusmw" id="sub_statusmw" value="mold washing">
												<input type="hidden" name="drawNumbmw" id="drawNumbmw" value="<?= $mesin['draw_no'];?>">
												
												  
												  <div class="form-group">
													<label for="inputPassword3" class="col-md-2 control-label" style="text-align:left;font-size:14px;color:#55518a">REMARK :</label>
													<div class="col-md-10">
													 
													  <textarea name="remarkmw" id="remarkmw" class="form-control" rows="3" placeholder="Remark Washing Mold"></textarea>
													</div>
												  </div>
												  
												  <div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
													  <div class="checkbox">
														<label>
														  <input type="checkbox" class="cek"> PASTIKAN MASUKAN DATA BENAR.
														</label>
													  </div>
													</div>
												  </div>
												  <div class="form-group">
													<div class="col-md-offset-2 col-md-10">
													  <button type="button" name="mold_washing" id="mold_washing" class="btn btn-info">Submit</button>
												   
													</div>
												  </div>
												</form>
					</fieldset>
                </div>
    
                <!-- hotel search -->
                <div class="bhoechie-tab-content">
				
					<h2 class="pro-d-title" style="color:#55518a">QUALITY PROBLEM</h2><br>
				
					
					<fieldset class="scheduler-border">
						<legend class="scheduler-border">INPUT DATA FOR QUALITY PROBLEM</legend>
					
											<form class="form-horizontal">
												<input type="hidden" name="kodemachineqp" id="kodemachineqp" value="<?= $mesin['id'];?>">
												<input type="hidden" name="problemqp" id="problemqp" value="qp">
												<input type="hidden" name="kelasqp" id="kelasqp" value="btn-quality-problem">
												<input type="hidden" name="sub_statusqp" id="sub_statusqp" value="quality problem">
												<input type="hidden" name="drawNumbqp" id="drawNumbqp" value="<?= $mesin['draw_no'];?>">
											
												  
												 
												  <div class="form-group">
													<label for="inputPassword3" class="col-md-2 control-label" style="text-align:left;font-size:14px;color:#55518a">REMARK</label>
													<div class="col-md-10">
														<textarea class="form-control" name="remarkqp" id="remarkqp" rows="3" placeholder="Remark Quality Problem"></textarea>
													</div>
												  </div>
												  
												  <div class="form-group">
													<div class="col-md-offset-2 col-md-10">
													  <div class="checkbox">
														<label>
														  <input type="checkbox" class="cek"> PASTIKAN MASUKAN DATA BENAR.
														</label>
													  </div>
													</div>
												  </div>
												  <div class="form-group">
													<div class="col-md-offset-2 col-md-10">
													  <button type="button" name="quality_problem" id="quality_problem" class="btn btn-info">Submit</button>
												   
													</div>
												  </div>
												</form>
					</fieldset>
						
						
                </div>
                <div class="bhoechie-tab-content">
                                 <h2 class="pro-d-title" style="color:#55518a">MACHINE PROBLEM</h2><br>
					
										<fieldset class="scheduler-border">
						<legend class="scheduler-border">INPUT DATA FOR MACHINE PROBLEM</legend>
					
											<form class="form-horizontal">
												<input type="hidden" name="kodemachinepm" id="kodemachinepm" value="<?= $mesin['id'];?>">
												<input type="hidden" name="problempm" id="problempm" value="pm">
												<input type="hidden" name="kelaspm" id="kelaspm" value="btn-machine-problem">
												<input type="hidden" name="sub_statuspm" id="sub_statuspm" value="machine problem">
												<input type="hidden" name="drawNumbpm" id="drawNumbpm" value="<?= $mesin['draw_no'];?>">
											
												  
												
												  <div class="form-group">
													<label for="inputPassword3" class="col-md-2 control-label" style="text-align:left;font-size:14px;color:#55518a">REMARK</label>
													<div class="col-md-10">
														<textarea class="form-control" name="remarkpm" id="remarkpm" rows="3" placeholder="Remark Machine Problem"></textarea>
													</div>
												  </div>
												  
												  
												  <div class="form-group">
													<div class="col-md-offset-2 col-md-10">
													  <div class="checkbox">
														<label>
														  <input type="checkbox" class="cek"> PASTIKAN MASUKAN DATA BENAR.
														</label>
													  </div>
													</div>
												  </div>
												  <div class="form-group">
													<div class="col-md-offset-2 col-md-10">
													  <button type="button" name="machine_problem" id="machine_problem" class="btn btn-info">Submit</button>
												   
													</div>
												  </div>
												</form>
					</fieldset>
                </div>
                <div class="bhoechie-tab-content">
                   					<h2 class="pro-d-title" style="color:#55518a">MATERIAL DELAY</h2><br>
					
					<fieldset class="scheduler-border">
						<legend class="scheduler-border">INPUT DATA FOR MATERIAL DELAY</legend>
					
											<form class="form-horizontal">
												<input type="hidden" name="kodemachinemd" id="kodemachinemd" value="<?= $mesin['id'];?>">
												<input type="hidden" name="problemmd" id="problemmd" value="md">
												<input type="hidden" name="kelasmd" id="kelasmd" value="btn-material-delay">
												<input type="hidden" name="sub_statusmd" id="sub_statusmd" value="material delay">
												<input type="hidden" name="drawNumbmd" id="drawNumbmd" value="<?= $mesin['draw_no'];?>">
												
												  
												    <div class="form-group">
													<label for="inputPassword3" class="col-md-2 control-label" style="text-align:left;font-size:14px;color:#55518a">REMARK</label>
													<div class="col-md-10">
														<textarea class="form-control" name="remarkmd" id="remarkmd" rows="3" placeholder="Remark Material Delay"></textarea>
													</div>
												  </div>
												  
												  <div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
													  <div class="checkbox">
														<label>
														  <input type="checkbox" class="cek"> PASTIKAN MASUKAN DATA BENAR.
														</label>
													  </div>
													</div>
												  </div>
												  <div class="form-group">
													<div class="col-md-offset-2 col-md-10">
													  <button type="button" name="material_delay" id="material_delay" class="btn btn-info">Submit</button>
												   
													</div>
												  </div>
												</form>
					</fieldset>
                </div>
				
				                <div class="bhoechie-tab-content">
                   					<h2 class="pro-d-title" style="color:#55518a">MAN POWER</h2><br>
					
					<fieldset class="scheduler-border">
						<legend class="scheduler-border">INPUT DATA FOR MAN POWER PROBLEM</legend>
					
											<form class="form-horizontal">
												<input type="hidden" name="kodemachinemp" id="kodemachinemp" value="<?= $mesin['id'];?>">
												<input type="hidden" name="problemmp" id="problemmp" value="mp">
												<input type="hidden" name="kelasmp" id="kelasmp" value="btn-man-power">
												<input type="hidden" name="sub_statusmp" id="sub_statusmp" value="man power">
												<input type="hidden" name="drawNumbmp" id="drawNumbmp" value="<?= $mesin['draw_no'];?>">
												
												    <div class="form-group">
													<label for="inputPassword3" class="col-md-2 control-label" style="text-align:left;font-size:14px;color:#55518a">REMARK</label>
													<div class="col-md-10">
														<textarea class="form-control" name="remarkmp" id="remarkmp" rows="3" placeholder="Remark Man Power"></textarea>
													</div>
												  </div>
												
												  
												  <div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
													  <div class="checkbox">
														<label>
														  <input type="checkbox" class="cek"> PASTIKAN MASUKAN DATA BENAR.
														</label>
													  </div>
													</div>
												  </div>
												  <div class="form-group">
													<div class="col-md-offset-2 col-md-10">
													  <button type="button" name="man_power" id="man_power" class="btn btn-info">Submit</button>
												   
											</div>
										</div>
								</form>
					</fieldset>
                </div>
            </div>
        </div>
  </div>
  </div>


<style type="text/css">


	
/*  bhoechie tab */
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 10px;
  margin-left: 50px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
  padding:0 0 0 10px;
}
div.bhoechie-tab-menu div.list-group>a h3{
  font-size:14px;
  font-weight:600;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #5A55A3;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
  padding:0 0 0 10px;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
  padding:0 0 0 10px;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #5A55A3;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -5px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #5A55A3;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 25px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}



	
</style>