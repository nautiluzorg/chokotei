<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>PRODUCTION SPIN</title>

    <!-- Bootstrap -->
 <link href="<?= base_url('assets/template')?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
  <link href="<?= base_url('assets/template')?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
  <link href="<?= base_url('assets/css/');?>style.css" rel="stylesheet" >
  <link href="<?= base_url('assets/template')?>/build/css/custom.min.css" rel="stylesheet">
    
    <!-- jQuery -->
  <script src="<?= base_url('assets/template')?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
  <script src="<?= base_url('assets/template')?>/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
    $('document').ready(function() {
        
        $(".mesin").on('click',function() {
               
               var nilai = $(this).data("mesinstatus");
               
					$.ajax({
							type: 'POST',
							data: 'kode=' + nilai,
							url: '<?= base_url() . 'prodcont/getDetailMesinProd' ?>',
							dataType: 'html',
							success: function(hasilAdd) {
								$("#about").html(hasilAdd);

							}
                    }); 
        });
             
       $(".btn-mold-installation").tooltip({
          placement : 'top'
        });
        
       $(".btn-mold-washing").tooltip({
          placement : 'top'
        });
            
       $(".btn-quality-problem").tooltip({
          placement : 'top'
        });
       $(".btn-machine-problem").tooltip({
          placement : 'top'
        });
        $(".btn-material-delay").tooltip({
          placement : 'top'
        });
        $(".btn-man-power").tooltip({
          placement : 'top'
        });
       $(".btn-running-machine").tooltip({
          placement : 'top'
        });
   });
   
   
   </script>
  </head>

  <body>
    <div class="container">
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
             
            <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?= base_url('assets/template/');?>images/img.jpg" alt=""><?= $user['name'];?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="<?= base_url('prodcont/profile');?>"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                    </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                  <a class="dropdown-item"  href="<?= base_url('auth/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
  
                <li role="presentation" class="nav-item" style="padding-left: 15px;">
                  <a href="<?= base_url('prodcont');?>" class="info-number">
                    <i class="fa fa-bars"></i> Main Menu
                    
                  </a>
   
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        
 
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>PLANT 01 <small>MACHINE AREA</small></h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="fa fa-calendar"></i>
                      <span><?= date('Y-m-d');?></span> <b class="caret"></b>
                    </div>
                  </div>
                </div>
                
                     <!--start -->
      <section class="about" id="about">
        <div class="row">
          <div class="col-sm-6">
          
                <table>
                <tbody>
                <tr>

                
                <?php
                $x=0;
                while($x < count($mesin)) {
                    
                      if ($x == 6) {
                        break;
                      }
                      ?>
                      <td class="mesin" data-mesinstatus="<?= $mesin[$x]['id'].strtoupper($mesin[$x]['status']);?>"><a href="javascript: void(0)" class="btn <?= $mesin[$x]['kelas'];?>"  data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="<?= $mesin[$x]['draw_no'];?> <?= getCustomer($mesin[$x]['draw_no']);?>"><?= $mesin[$x]['id'];?><br><span class="status"><?= strtoupper($mesin[$x]['status']);?></span></a></td>
                      <?php 
                      
                      $x++;
                    }
                ?>
                </tr>
                </tbody>
                </table>
            
          </div>
          <div class="col-sm-6">
                    <table>
                    <tbody>
                        <tr>
                        
                       <?php
                $xj=6;
                while($xj < count($mesin)) {
                    
                      if ($xj == 12) {
                        break;
                      }
                      ?>
                      <td class="mesin" data-mesinstatus="<?= $mesin[$xj]['id'].strtoupper($mesin[$xj]['status']);?>"><a href="javascript: void(0)" class="btn <?= $mesin[$xj]['kelas'];?>"  data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="<?= $mesin[$xj]['draw_no'];?> <?= getCustomer($mesin[$xj]['draw_no']);?>"><?= $mesin[$xj]['id'];?><br><span class="status"><?= strtoupper($mesin[$xj]['status']);?></span></a></td>
                      <?php 
                      
                      $xj++;
                    }
                ?>   
                </tr>
                    </tbody>
                    </table>
          </div>
        
      </div>
      
      <div class="container">
        <div class="row jarak">
        
        <div class="col-sm-6">
          
                <table>
                <tbody>
                <tr>
                <?php
                $ax=12;
                while($ax < count($mesin)) {
                    
                      if ($ax == 18) {
                        break;
                      }
                      ?>
                      <td class="mesin" data-mesinstatus="<?= $mesin[$ax]['id'].strtoupper($mesin[$ax]['status']);?>"><a href="javascript: void(0)" class="btn <?= $mesin[$ax]['kelas'];?>"  data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="<?= $mesin[$ax]['draw_no'];?> <?= getCustomer($mesin[$ax]['draw_no']);?>"><?= $mesin[$ax]['id'];?><br><span class="status"><?= strtoupper($mesin[$ax]['status']);?></span></a></td>
                      <?php 
                      
                      $ax++;
                    }
                ?> 
            
                </tr>
                </tbody>
                </table>
            
          </div>
          <div class="col-sm-6">
                    <table>
                    <tbody>
                        <tr>
                <?php
                $bx=18;
                while($bx < count($mesin)) {
                    
                      if ($bx == 24) {
                        break;
                      }
                      ?>
                      <td class="mesin" data-mesinstatus="<?= $mesin[$bx]['id'].strtoupper($mesin[$bx]['status']);?>"><a href="javascript: void(0)" class="btn <?= $mesin[$bx]['kelas'];?>"  data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="<?= $mesin[$bx]['draw_no'];?> <?= getCustomer($mesin[$bx]['draw_no']);?>"><?= $mesin[$bx]['id'];?><br><span class="status"><?= strtoupper($mesin[$bx]['status']);?></span></a></td>
                      <?php 
                      
                      $bx++;
                    }
                ?> 
            
                        </tr>
                    </tbody>
                    </table>
          </div>
        </div>
      </div>

      
      
      <div class="container">

        <div class="row gang">
                      <div class="col-sm-6">
          
                <table>
                <tbody>
                <tr>
                <?php
                $cx=24;
                while($cx < count($mesin)) {
                    
                      if ($cx == 30) {
                        break;
                      }
                      ?>
                      <td class="mesin" data-mesinstatus="<?= $mesin[$cx]['id'].strtoupper($mesin[$cx]['status']);?>"><a href="javascript: void(0)" class="btn <?= $mesin[$cx]['kelas'];?>"  data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="<?= $mesin[$cx]['draw_no'];?> <?= getCustomer($mesin[$cx]['draw_no']);?>"><?= $mesin[$cx]['id'];?><br><span class="status"><?= strtoupper($mesin[$cx]['status']);?></span></a></td>
                      <?php 
                      
                      $cx++;
                    }
                ?> 
            
                </tr>
                </tbody>
                </table>
            
          </div>
          <div class="col-sm-6">
                    <table>
                    <tbody>
                        <tr>
                    
                             <?php
                            $dx=30;
                            while($dx < count($mesin)) {
                                
                                  if ($dx == 36) {
                                    break;
                                  }
                                  ?>
                                  <td class="mesin" data-mesinstatus="<?= $mesin[$dx]['id'].strtoupper($mesin[$dx]['status']);?>"><a href="javascript: void(0)" class="btn <?= $mesin[$dx]['kelas'];?>"  data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="<?= $mesin[$dx]['draw_no'];?> <?= getCustomer($mesin[$dx]['draw_no']);?>"><?= $mesin[$dx]['id'];?><br><span class="status"><?= strtoupper($mesin[$dx]['status']);?></span></a></td>
                                  <?php 
                                  
                                  $dx++;
                                }
                            ?> 
                                
                    
                        </tr>
                    </tbody>
                    </table>
          </div>
        </div>
      </div>
      
      <div class="container">
        <div class="row jarak">
          <div class="col-sm-6">
          
                <table height="21">
                <tbody>
                <tr>
                             <?php
                                $ex=36;
                                while($ex < count($mesin)) {
                                    
                                      if ($ex == 42) {
                                        break;
                                      }
                                      ?>
                                      <td class="mesin" data-mesinstatus="<?= $mesin[$ex]['id'].strtoupper($mesin[$ex]['status']);?>"><a href="javascript: void(0)" class="btn <?= $mesin[$ex]['kelas'];?>"  data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="<?= $mesin[$ex]['draw_no'];?> <?= getCustomer($mesin[$ex]['draw_no']);?>"><?= $mesin[$ex]['id'];?><br><span class="status"><?= strtoupper($mesin[$ex]['status']);?></span></a></td>
                                      <?php 
                                      
                                      $ex++;
                                    }
                            ?> 
                </tr>
                </tbody>
                </table>
            
          </div>
          <div class="col-sm-6">
                    <table height="21">
                    <tbody>
                    <tr>
                        
                             <?php
                                $fx=42;
                                while($fx < count($mesin)) {
                                    
                                      if ($fx == 48) {
                                        break;
                                      }
                                      ?>
                                      <td class="mesin" data-mesinstatus="<?= $mesin[$fx]['id'].strtoupper($mesin[$fx]['status']);?>"><a href="javascript: void(0)" class="btn <?= $mesin[$fx]['kelas'];?>"  data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="<?= $mesin[$fx]['draw_no'];?> <?= getCustomer($mesin[$fx]['draw_no']);?>"><?= $mesin[$fx]['id'];?><br><span class="status"><?= strtoupper($mesin[$fx]['status']);?></span></a></td>
                                      <?php 
                                      
                                      $fx++;
                                    }
                            ?> 
                    </tr>
                    </tbody>
                    </table>
          </div>
        </div>
      </div>
      
      
    <div class="container">

        <div class="row gang">
          <div class="col-sm-6">
          
                <table height="21">
                <tbody>
                <tr>
                            <?php
                                $gx=48;
                                while($gx < count($mesin)) {
                                    
                                      if ($gx == 54) {
                                        break;
                                      }
                                      ?>
                                      <td class="mesin" data-mesinstatus="<?= $mesin[$gx]['id'].strtoupper($mesin[$gx]['status']);?>"><a href="javascript: void(0)" class="btn <?= $mesin[$gx]['kelas'];?>"  data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="<?= $mesin[$gx]['draw_no'];?> <?= getCustomer($mesin[$gx]['draw_no']);?>"><?= $mesin[$gx]['id'];?><br><span class="status"><?= strtoupper($mesin[$gx]['status']);?></span></a></td>
                                      <?php 
                                      
                                      $gx++;
                                    }
                            ?> 
                </tr>
                </tbody>
                </table>
            
          </div>
          <div class="col-sm-6">
                    <table height="21">
                    <tbody>
                    <tr>
                            <?php
                                $hx=54;
                                while($hx < count($mesin)) {
                                    
                                      if ($hx == 60) {
                                        break;
                                      }
                                      ?>
                                      <td class="mesin" data-mesinstatus="<?= $mesin[$hx]['id'].strtoupper($mesin[$hx]['status']);?>"><a href="javascript: void(0)" class="btn <?= $mesin[$hx]['kelas'];?>"  data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="<?= $mesin[$hx]['draw_no'];?> <?= getCustomer($mesin[$hx]['draw_no']);?>"><?= $mesin[$hx]['id'];?><br><span class="status"><?= strtoupper($mesin[$hx]['status']);?></span></a></td>
                                      <?php 
                                      
                                      $hx++;
                                    }
                            ?> 
                    </tr>
                    </tbody>
                    </table>
          </div>
        </div>
    </div>
      
      <div class="container">
        <div class="row jarak">
          <div class="col-sm-6">
          
                <table height="21">
                <tbody>
                <tr class="amg">
                                <?php
                                $ix=60;
                                while($ix < count($mesin)) {
                                    
                                      if ($ix == 66) {
                                        break;
                                      }
                                      ?>
                                      <td class="mesin" data-mesinstatus="<?= $mesin[$ix]['id'].strtoupper($mesin[$ix]['status']);?>"><a href="javascript: void(0)" class="btn <?= $mesin[$ix]['kelas'];?>"  data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="<?= $mesin[$ix]['draw_no'];?> <?= getCustomer($mesin[$ix]['draw_no']);?>"><?= $mesin[$ix]['id'];?><br><span class="status"><?= strtoupper($mesin[$ix]['status']);?></span></a></td>
                                      <?php 
                                      
                                      $ix++;
                                    }
                            ?> 
                </tr>
                </tbody>
                </table>
            
          </div>
          <div class="col-sm-6">
                    <table height="21">
                    <tbody>
                    <tr>
                            <?php
                                $kx=66;
                                while($kx < count($mesin)) {
                                    
                                      if ($kx == 72) {
                                        break;
                                      }
                                      ?>
                                      <td class="mesin" data-mesinstatus="<?= $mesin[$kx]['id'].strtoupper($mesin[$kx]['status']);?>"><a href="javascript: void(0)" class="btn <?= $mesin[$kx]['kelas'];?>" data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="<?= $mesin[$kx]['draw_no'];?> <?= getCustomer($mesin[$kx]['draw_no']);?>"><?= $mesin[$kx]['id'];?><br><span class="status"><?= strtoupper($mesin[$kx]['status']);?></span></a></td>
                                      <?php 
                                      
                                      $kx++;
                                    }
                            ?> 
                    </tr>
                    </tbody>
                    </table>
          </div>
        </div>
      </div>
      
      <div class="container">
        <div class="row keterangan">
        <div class="col-md-12">
         
            <button class="btn btn-sm btn-running-machine">RUNNING MACHINE</button>
            <button class="btn btn-sm btn-mold-installation">MOLD INSTALLATION</button>
            <button class="btn btn-sm btn-mold-washing">MOLD WASHING</button>
            <button class="btn btn-sm btn-quality-problem">QUALITY PROBLEM</button>
            <button class="btn btn-sm btn-machine-problem">MACHINE PROBLEM</button>
            <button class="btn btn-sm btn-material-delay">MATERIAL DELAY</button>
            <button class="btn btn-sm btn-man-power">MAN POWER</button>
            
         </div>
        </div>
      </div>
    </section>
    <!-- akhir about --> 
  </div>
</div>
</div>
</div>
</body>
</html>
