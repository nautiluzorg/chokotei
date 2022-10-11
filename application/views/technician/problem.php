<script type="text/javascript">

$('document').ready(function() {
    
	$('.cekMold').change(function() {
		  
        if ($(this).prop('checked')) {
			var nilai = $(this).val();
			var kode = $(this).data("id");
        
				$.ajax({
							
							type: 'POST',
                            data: { 'kode':kode, 'nilai':nilai},
                            dataType:'json',
							url: '<?= base_url() . 'techcont/updateMoldProblem' ?>',
							success: function(resp) {
								
                                 if (resp.status == "success")
                                    window.location.href = resp.redirect_url;
							}
						});
                    return false;
        
        }
    });


   	$('.cekSetting').change(function() {
		  
        if ($(this).prop('checked')) {
			var nilai = $(this).val();
			var kode = $(this).data("id");
            
			
				$.ajax({
							
							type: 'POST',
                            data: { 'kode':kode, 'nilai':nilai},
                            dataType:'json',
							url: '<?= base_url() . 'techcont/updateSettingProblem' ?>',
							success: function(resp) {
								
                                 if (resp.status == "success")
                                    window.location.href = resp.redirect_url;
							}
						});
                    return false;
        }
    });

});




</script>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>PROBLEM CASE</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
          
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>MOLD INSTALLATION<small>Table Data</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Settings 1</a>
                  <a class="dropdown-item" href="#">Settings 2</a>
                </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>CASE</th>
                        <th>DATE</th>
                        <th>MC</th>
                        <th>DRAW</th>
                        <th>MOLD PREPARE</th>
                        <th>SETTING MACHINE</th>
                        <th>CUSTOMER</th>
                        <th>DETAIL</th>
                     
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $no = 1;
                      foreach ($problems as $sc) { ?>

                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= strtoupper(printProblem($sc['kasus'])); ?></td>
						  <td><?= $sc['ciptakan']; ?></td>
                          <td><?= $sc['id_mc']; ?></td>
                          <td><?= $sc['draw_no']; ?></td>
                         
                          <td>
                          
                            	<?php
													
                                  if(is_null($sc['mold'])){ ?>
														  
																
                                        <label>
                                            
                                            <input type="checkbox" class="cekMold" data-id="<?= $sc['id'];?>" value="<?= date('Y-m-d H:i:s');?>"> DONE
                                            
                                            
                                        </label>
												
												  
                                    <?php 
                                        }
                                            else {
                                                echo 'DONE @'.$sc['mold'];
                                        }
                                    ?>
                          </td>
                          <td>
                          
                              <?php
													
                                  if(is_null($sc['sett'])){ ?>
														  
																
                                        <label>
                                            
                                            <input type="checkbox" class="cekSetting" data-id="<?= $sc['id'];?>" value="<?= date('Y-m-d H:i:s');?>"> DONE
                                            
                                            
                                        </label>
												
												  
                                    <?php 
                                        }
                                            else {
                                                echo 'DONE @'.$sc['sett'];
                                        }
                                    ?>
                            
                          </td>
                           <td><?= getCustomer($sc['draw_no']); ?></td>
                          <td><a href="<?= base_url('techcont/getViewDetailProblem/').$sc['id_mc'];?>">VIEW DETAIL</a></td>
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
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->