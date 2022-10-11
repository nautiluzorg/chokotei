<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sekisui Polymatech</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/bootstrap/css/');?>bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/');?>style.css" rel="stylesheet" >
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= base_url('assets/bootstrap/js/');?>jquery-3.1.1.min.js"></script>
    <script src="<?= base_url('assets/bootstrap/js/');?>jquery.easing.1.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url('assets/bootstrap/js/');?>bootstrap.min.js"></script>
   <script>
    $('document').ready(function() {
	/*
        $(".mesin").on('click',function() {
               var nilai = $(this).text();
               //alert(nilai);
			   
			   
					$.ajax({
							type: 'POST',
							data: 'kode=' + nilai,
							url: '<?= base_url() . 'Welcome/getDetailMesin' ?>',
							dataType: 'html',
							success: function(hasilAdd) {
								$("#about").html(hasilAdd);

								
							}
						}); 
			   
		
			   
			      
             });
	*/		

$('.btn-running-machine').tooltip();






    
			 
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

    <!-- navbar -->
    <!-- navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a href="#home" class="navbar-brand page-scroll">Sekisui Polymatech</a>
        </div>
        

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        <ul class="nav navbar-nav">
      <!-- start MENU PC-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PC <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('welcome/schedule');?>">Planning Production</a></li>
            <li><a href="<?= base_url('welcome/pc_plant01');?>">Plant 01</a></li>
          </ul>
        </li>
        <!-- ends -->
        
        <!-- start MENU TECHNICIAN-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TECHNICIAN <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('welcome/rtechnician');?>">Technician</a></li>
            <li><a href="#">Menu 2</a></li>

          </ul>
        </li>
        <!-- ends -->
        
        <!-- start MENU TECHNICIAN-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MATERIAL <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('welcome/rmaterial');?>">Material</a></li>
            <li><a href="#">Menu 2</a></li>

          </ul>
        </li>
        <!-- ends -->
        
           <!-- start MENU QUALITY-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">QUALITY <span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li><a href="<?= base_url('welcome/rquality');?>">Quality</a></li>
            <li><a href="#">Menu 2</a></li>

          </ul>
        </li>
        <!-- ends -->
        
                 <!-- start MENU PRODUCTION-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUCTION <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('welcome/rproduksi');?>">Produksi</a></li>
            <li><a href="#">Menu 2</a></li>

          </ul>
        </li>
        <!-- ends -->
        
        <!-- start MENU ADMIN-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADMIN <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('welcome/drawing');?>" class="page-scroll">Draw No</a></li>
            <li><a href="#">Menu 2</a></li>

          </ul>
        </li>
        <!-- ends -->
        <li><a href="<?= base_url('welcome/brmachine');?>" class="page-scroll">BREAKDOWN</a></li>
        <li><a href="<?= base_url('welcome/brstatus');?>" class="page-scroll">SUMMARY</a></li>
            
            
          </ul>
          <ul class="nav navbar-nav">
            <li><a href="<?= base_url('welcome');?>" class="page-scroll">PLANT 01</a></li>
            <li><a href="<?= base_url('welcome/index2');?>" class="page-scroll">PLANT 03</a></li>
            
          </ul>
        </div>

      </div>
    </nav>
    <!-- akhir navbar -->
    <!-- akhir navbar -->
    <!-- akhir navbar -->
    
    <!-- jumbotron -->

    <!-- akhir jumbotron -->


    <!-- about -->
    <section class="about" id="about">
    
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
          
            <h4 class="text-center">PLANT 03</h4>
            <hr>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
          
                <table>
                <tbody>
                <tr>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">073</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">074</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">075</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">076</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">077</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">078</a></td>
            
                </tr>
                </tbody>
                </table>
            
          </div>
          <div class="col-sm-6">
                    <table>
                    <tbody>
                        <tr>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">079</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">080</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">081</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">082</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">083</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">084</a></td>
            
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
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">085</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">086</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">087</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">088</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">089</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">090</a></td>
            
                </tr>
                </tbody>
                </table>
            
          </div>
          <div class="col-sm-6">
                    <table>
                    <tbody>
                        <tr>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">091</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">092</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">093</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">094</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">095</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">096</a></td>
            
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
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">077</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">098</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">099</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">100</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">101</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">102</a></td>
            
                </tr>
                </tbody>
                </table>
            
          </div>
          <div class="col-sm-6">
                    <table>
                    <tbody>
                        <tr>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">103</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">104</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">105</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">106</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">107</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">108</a></td>
            
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
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">109</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">110</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">111</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">112</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">113</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">114</a></td>
                </tr>
                </tbody>
                </table>
            
          </div>
          <div class="col-sm-6">
                    <table height="21">
                    <tbody>
                    <tr>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">115</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">116</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">117</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">118</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">119</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">120</a></td>
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
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">121</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">122</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">123</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">124</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">125</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">126</a></td>
                </tr>
                </tbody>
                </table>
            
          </div>
          <div class="col-sm-6">
                    <table height="21">
                    <tbody>
                    <tr>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">127</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">128</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">129</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">130</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">131</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">132</a></td>
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
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">133</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">134</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">135</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">136</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">137</a></td>
                <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">138</a></td>
                </tr>
                </tbody>
                </table>
            
          </div>
          <div class="col-sm-6">
                    <table height="21">
                    <tbody>
                    <tr>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">139</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">140</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">141</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">142</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">143</a></td>
                    <td class="mesin"><a href="javascript: void(0)" class="btn btn-running-machine">144</a></td>
                    </tr>
                    </tbody>
                    </table>
          </div>
        </div>
      </div>
      
        <div class="container">
        <div class="row keterangan">
        <div class="col-md-12">
         <p class="note">NOTE:</p>
            <button class="btn btn-sm btn-running-machine" data-toggle="tooltip" data-placement="top" data-custom-class="tooltip-primary" title="INI ADALAH TOOL TIP">RUNNING MACHINE</button>
            <button class="btn btn-sm btn-mold-installation">MOLD INSTALLATION</button>
            <button class="btn btn-sm btn-mold-washing">MOLD WASHING</button>
            <button class="btn btn-sm btn-quality-problem">QUALITY PROBLEM</button>
            <button class="btn btn-sm btn-machine-problem">MACHINE PROBLEM</button>
            <button class="btn btn-sm btn-material-delay">MATERIAL DELAY</button>
            <button class="btn btn-sm btn-man-power">MAN POWER</button>
            <button class="btn btn-sm btn-broken-machine">BROKEN MACHINE</button><br>
        
         </div>
        </div>
      </div>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    </section>
    <!-- akhir about -->



    <!-- portfolio -->

    <!-- akhir portfolio -->


    <!-- contact -->
    <section class="contact" id="contact">

    </section>
    <!-- akhir contact -->

    
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




