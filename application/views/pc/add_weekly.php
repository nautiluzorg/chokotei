
<script type="text/javascript">
$(document).ready(function(){
           
        $('.selectMachine').select2({
            placeholder: "Machine",
            theme: 'bootstrap4',
            ajax: {
                dataType: 'json',
                delay: 250,
				url: '<?= base_url() . 'pccont/listMachine' ?>',
                data: function(params) {
                    return {
                        searchTerm: params.term
                    }
                },
                processResults: function(data) {
					
                    return {
                        results: $.map(data, function(obj) {
                            return {
                                id: obj.id,
                                text: obj.id,
                            };
                        })
					
                    };
                }
            }
        });	
        
	   $('.select2bs4_daftar').select2({
            placeholder: "Draw No",
            theme: 'bootstrap4',
            ajax: {
                dataType: 'json',
                delay: 250,
				url: '<?= base_url() . 'pccont/daftarDrawingNumber' ?>',
                data: function(params) {
                    return {
                        searchTerm: params.term
                    }
                },
                processResults: function(data) {
					
                    return {
                        results: $.map(data, function(obj) {
                            return {
                                id: obj.draw_no,
                                text: obj.draw_no,
                            };
                        })
					
                    };
                }
            }
        });

   $('.selectMold').select2({
            placeholder: "Mold No",
            theme: 'bootstrap4'
          
        });

});
			
</script>
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Add Weekly Schedule</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<?= date('Y-m-d');?>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2><a href="<?= base_url('pccont/form');?>"><button type="submit" name="submit" class="btn btn-info">UPLOAD WEEKLY</button></a><small>Weekly Schedule</small></h2>
									
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form name="addWeekly" method="post" action="<?= base_url('pccont/addPlanning');?>" id="addWeekly" data-parsley-validate class="form-horizontal form-label-left">

									
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">MC No</label>
											<div class="col-md-6 col-sm-6 ">
											  <select name="machine-no" id="machine-no" class="form-control selectMachine" required>
													<option></option>
                 
											  </select>
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Draw No</label>
											<div class="col-md-6 col-sm-6 ">
													<select name="drawing-no" id="drawing-no" class="form-control select2bs4_daftar" required>
															<option></option>
				  
													</select>
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mold No</label>
											<div class="col-md-6 col-sm-6 ">
													<select name="mold-no" id="mold-no" class="form-control selectMold" required>
															<option></option>
															<option value="01">01</option>
															<option value="02">02</option>
															<option value="03">03</option>
															<option value="04">04</option>
															<option value="05">05</option>
															<option value="06">06</option>
															<option value="07">07</option>
															<option value="08">08</option>
															<option value="09">09</option>
															<option value="10">10</option>
				  
													</select>
											</div>
										</div>
										
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Qty</label>
											<div class="col-md-6 col-sm-6 ">
												<input name="quantity" id="quantity" class="form-control" type="text" placeholder="Qty">
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Date <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input name="tanggal" id="tanggal" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
											
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" name="submit" class="btn btn-success">Submit</button>
												<button class="btn btn-primary" type="button">Cancel</button>
												
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->