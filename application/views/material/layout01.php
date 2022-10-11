<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sekisui Polymatech</title>

<link href="<?= base_url('assets/bootstrap/css/');?>bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" type="text/css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" type="text/css">
<link href="<?= base_url('assets/css/');?>style.css" rel="stylesheet" >
<link href="<?= base_url('assets/plugins/datetimepicker/');?>bootstrap-datetimepicker.min.css" rel="stylesheet" >
<link href="<?= base_url('assets/template')?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css" />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?= base_url('assets/bootstrap/js/');?>jquery-3.1.1.min.js"></script>
<script src="<?= base_url('assets/bootstrap/js/');?>jquery.easing.1.3.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= base_url('assets/bootstrap/js/');?>bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>	
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= base_url('assets/plugins/datetimepicker/');?>bootstrap-datetimepicker.min.js"></script>

   <script type="text/javascript">
    $('document').ready(function() {
        $(".mesin").on('click',function() {
               //var nilai = $(this).text();
               var nilai = $(this).data("mesinstatus");
              
               
					$.ajax({
							type: 'POST',
							data: 'kode=' + nilai,
							url: '<?= base_url() . 'matcont/getDetailMesinProd' ?>',
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
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">LAYOUT MACHINE PLANT 01</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   
   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= base_url('matcont');?>"><i class="fa fa-bars"></i> Main Menu</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?= $user['name'];?> <span class="caret"></span></a>
          
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('matcont/profile');?>"><i class="fa fa-user pull-right"></i> Profile</a></li>
            <li><a href="#"><i class="fa fa-lock pull-right"></i> Password</a></li>
            <li><a href="#"><i class="fa fa-book pull-right"></i> Guidance</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= base_url('auth/logout');?>"><i class="fa fa-sign-out pull-right"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <!-- akhir navbar -->
    
    <!-- jumbotron -->

    <!-- akhir jumbotron -->


    <!-- about -->
    <section class="about" id="about">
    
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
          
            <h4 class="text-center">PLANT 01</h4>
            <hr>
          </div>
        </div>

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
                <tr class="amg"><span>AMG1</span>
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
                <tr class="amg"><span>AMG2</span>
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
                <tr class="amg"><span>AMG3</span>
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
    
    
    <!-- footer -->
    <footer>
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <p> Copyright &copy;2022  by IT SPIN</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- akhir footer -->
  </body>
</html>




