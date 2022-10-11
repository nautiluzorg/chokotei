<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Sekisui Polymatech</title>

  <!-- Bootstrap -->

<link href="<?= base_url('assets/bootstrap/css/');?>bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" type="text/css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" type="text/css">
<link href="<?= base_url('assets/css/');?>style.css" rel="stylesheet" >
<link href="<?= base_url('assets/plugins/datetimepicker/');?>bootstrap-datetimepicker.min.css" rel="stylesheet" >

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css" />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>	
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= base_url('assets/plugins/datetimepicker/');?>bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    
    					   		// Setup datatables
	$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
      {
          return {
              "iStart": oSettings._iDisplayStart,
              "iEnd": oSettings.fnDisplayEnd(),
              "iLength": oSettings._iDisplayLength,
              "iTotal": oSettings.fnRecordsTotal(),
              "iFilteredTotal": oSettings.fnRecordsDisplay(),
              "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
              "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
      };

      var table = $("#mytable").dataTable({
		  
          initComplete: function() {
              var api = this.api();
              $('#mytable_filter input')
                  .off('.DT')
                  .on('input.DT', function() {
                      api.search(this.value).draw();
              });
          },
              oLanguage: {
              sProcessing: "loading..."
          },
              "processing": true,
              "serverSide": true,
			  "order":[],
              "ajax": {"url": "<?= base_url('welcome/get_json_planning')?>", "type": "POST"},
                	"columns": [
												{"data": "id"},
												{"data": "no_mc"},
												{"data": "draw_no"},
												{"data": "jumlah"},
												{"data": "status"},
												{"data": "view"}
                  ],
          		"order": [[1, 'asc']],
				"columnDefs":[
				{"searchable":true,"orderable":true,"targets":[0,1]},
				],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          }
		});
        
        $('.selectMachine').select2({
            placeholder: "-Machine-",
            theme: 'bootstrap4',
            ajax: {
                dataType: 'json',
                delay: 250,
				url: '<?= base_url() . 'Welcome/listMachine' ?>',
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
            placeholder: "-Draw No-",
            theme: 'bootstrap4',
            ajax: {
                dataType: 'json',
                delay: 250,
				url: '<?= base_url() . 'Welcome/daftarDrawingNumber' ?>',
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


});

   

    $("#submit").on('click',function() {
               var nilai = $("#drawing-no").val();
               alert(nilai);
             });
        
             
             
             
             
    
</script>	
</head>
<body>
    <!-- navbar -->
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

<section class="about" id="about">
<div class="container-fluid">
	<h4 class="text-center"><?= $title;?></h4><hr>
	<div class="card">
	<div class="card-body p-2">
	<div class="row">
<div class="col-md-5">

<form class="form-horizontal" name="formPlanning" method="post" action="<?= base_url('welcome/addPlanning');?>">
  
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label"></label>
    <div class="col-sm-9">
        <a href="<?= base_url('prodcont');?>"><button class="btn btn-sm btn-success" type="button">IMPORT WEEKLY</button></a>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">MC No</label>
    <div class="col-sm-9">
	  <select name="no-machine" id="selectMachine" class="form-control selectMachine" required>
            <option></option>
                 
	  </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Draw No</label>
    <div class="col-sm-9">
      
	  	  <select name="drawing-no" id="drawing-no" class="form-control select2bs4_daftar" required>
				<option></option>
				  
	      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Qty</label>
    <div class="col-sm-9">
      <input type="text"  name="quantity" class="form-control" id="inputPassword3" placeholder="Qty" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Pastikan data benar.
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" name="submit" id="submit" class="btn btn-info">Submit</button>
    </div>
  </div>
</form>
</div>

	<div class="col-md-7">
		<!-- disini di isi konten -->
	<table class="table table-sm" id="mytable">
			<thead>
				<tr>
                
					<th width="2%">ID</th>
					<th width="2%">MC</th>
					<th width="25%">DRAW NO</th>
					<th width="5%">QTY</th>
                    <th width="10%">STATUS</th>
					<th width="2%">ACTION</th>
				</tr>
			</thead>
	</table>
	</div>
	</div>
	</div>
	</div>
</div>
</section>
<script type="text/javascript">

	
  
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
</script>	
</div>
</body>
</html>