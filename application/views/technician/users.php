<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>USER DATA</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="">
   


              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> DATA USER <small>Production System</small></h2>
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

                    <ul class="nav nav-tabs justify-content-end bar_tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">LIST USER</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false">CONTACT USER</a>
                      </li>
                    
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
					  <!-- Data list User -->
					  
									   <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
            
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                <div class="card-box table-responsive">
                 
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Lengkap</th>
                          <th>Username</th>
                          <th>Last Login</th>
                          <th>Role</th>
						  <th>Status</th>
                          <th>Created</th>
                          
                        </tr>
                      </thead>
                      <tbody>
					  
					  <?php 
					  $no = 1;
					  foreach($users as $sc){?>
						  
						<tr>
                          <td><?= $no++;?></td>
                          <td><?= $sc['name'];?></td>
                          <td><?= $sc['email'];?></td>
                          <td><?= $sc['last_login'];?></td>
                          <td><?= ucfirst(getRoleName($sc['role_id']));?></td>
                          <td><?= statusUser($sc['is_active']);?></td>
                          <td><?= $sc['date_created'];?></td>
                        
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
							
						<!-- End data list user -->	
                      </div>
                      <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
					  <!-- data contact user -->
                        
						
        <!-- page content -->
      
            <div class="row">
                
				<?php foreach($users as $sc):?>
				
                      <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i><?= strtoupper(getRoleName($sc['role_id']));?></i></h4>
                            <div class="left col-md-7 col-sm-7">
                              <h2><?= $sc['name'];?></h2>
                              <p><?= $sc['email'];?></p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-clock-o"></i> Last Login:<br> <?= $sc['last_login'];?></li>
                               
                              </ul>
							  <p class="text-succes"><strong>User <?= statusUser($sc['is_active']);?></strong></p>
                            </div>
                            <div class="right col-md-5 col-sm-5 text-center">
                              <img src="<?= base_url('assets/template/');?>images/img.jpg" alt="" class="img-circle img-fluid">
                            </div>
                          </div>
                          <div class=" profile-bottom text-center">
                            <div class=" col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                               
                              </p>
                            </div>
                            <div class=" col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-comments-o"></i> Message </button>
                              <button type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
					  
				<?php endforeach;?>
                
            </div>
     
        <!-- /page content -->
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
					<!-- end data contact user -->
                      </div>
    
                    </div>

                  </div>
                </div>
              </div>
           



			  
	

            





            

            </div>
          

     

   

      





          </div>
          <div class="clearfix"></div>
        </div>
        <!-- /page content -->