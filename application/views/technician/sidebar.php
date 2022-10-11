            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3 class="text-center">Main Menu</h3>
                <ul class="nav side-menu">
               
                  <li><a><i class="fa fa-home"></i> HOME <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('techcont'); ?>">DASHBOARD</a></li>
                      <li><a href="<?= base_url('techcont/profile'); ?>">PROFILE</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i>MASTER DATA <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('techcont/drawing');?>">DRAWING NUMBER</a></li>
                      <li><a href="<?= base_url('techcont/user');?>">USER</a></li>

                    </ul>
                  </li>
                
                  <li><a><i class="fa fa-edit"></i> SCHEDULE PROD <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    
                       <li><a href="<?= base_url('techcont/jadwal'); ?>">SCHEDULE WEEKLY</a></li>
                       <li><a href="<?= base_url('techcont/jaddone');?>">SCHEDULE DONE</a></li>
                    </ul>
                  </li>
              
                
                  <li><a><i class="fa fa-desktop"></i>LAYOUT MACHINE<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('techcont/layout01');?>">PLANT 01</a></li>
                      <li><a href="media_gallery.html">PLANT 03</a></li>
                    </ul>
                  </li>
        
                </ul>
              </div>
              <div class="menu_section">
                <h3>REALTIME DATA</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> PROBLEM CASE <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('techcont/problem');?>">CURRENT PROBLEM</a></li>
                   
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> HISTORY CASE <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">HISTORY CASE RECORD</a></li>
                     

                    </ul>
                  </li>
              
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> REPORT PAGE <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('auth/logout'); ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
            </div>
            </div>