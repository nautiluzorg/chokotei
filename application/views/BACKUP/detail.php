<script type="text/javascript">

    $('document').ready(function() {
        
              $(".btn-problem").on('click',function() {
				  
				var nilai = $(this).data("nilai");
				var noMachine = $("#no-machine").data("machine");
				var drawing = $("#drawing-no").data("drawing");
               
			                      
					$.ajax({
						
							type: 'POST',
							data: { 'kode':nilai, 'nomachine':noMachine,'drawing':drawing},
							url: '<?= base_url() . 'Welcome/addProblem' ?>',
							dataType: 'html',
							success: function(hasilAdd) {
								//$("#about").html(hasilAdd);
								$("#informasi").html(hasilAdd);
							}
						}); 
                });
        
            //When Button Stop Click *******
            const btn = document.querySelector('#StopLine');        
            const radioButtons = document.querySelectorAll('input[name="ProblemSelected"]');
    
                btn.addEventListener("click", () => {
                    
                    let noMachine = $("#no-machine").data("machine");
                    let selectedProblem;
                    
                    for (const radioButton of radioButtons) {
                        if (radioButton.checked) {
                            selectedProblem = radioButton.value;
                            break;
                        }
                    }
					
					$.ajax({
						
							type: 'POST',
                            data: { 'kode':noMachine, 'status':selectedProblem},
                            dataType:'json',
							url: '<?= base_url() . 'Welcome/insertProblem' ?>',
							success: function(resp) {
								
                                 if (resp.status == "success")
                                    window.location.href = resp.redirect_url;
							}
						});
                    return false;
                });
				
					
   });

	$("#btnSchedule").click(function(){
		
			var mc_code = $(this).data("nomesin");
			let curstatus = $(".posted_in").data("curstatus");
			
			//alert(curstatus);
		
			
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
</script>


<div class="container">
<div class="col-md-12">
<section class="panel">
      <div class="panel-body">
<div class="col-md-6">
<div class="pro-img-details <?= $mesin["kelas"];?>">
<h1> <?= $mesin["id"];?></h1> 
<h3><?= strtoupper($mesin["status"]);?></h3>
<h2>MACHINE RUNNING</h2>
</div>
<div class="pro-img-list">
<fieldset class="scheduler-border">
    <legend class="scheduler-border">SELECT PROBLEM</legend>
	
<button type="button" class="btn btn-block btn-lg btn-mold-installation btn-problem" data-nilai="mi">Mold Installation</button>
<button type="button" class="btn btn-block btn-lg btn-mold-washing btn-problem" data-nilai="mw">Mold Washing</button>
 <button type="button" class="btn btn-block btn-lg btn-quality-problem btn-problem" data-nilai="qp">Quality Problem</button>
 <button type="button" class="btn btn-block btn-lg btn-machine-problem btn-problem" data-nilai="pm">Machine Problem</button>
 <button type="button" class="btn btn-block btn-lg btn-material-delay btn-problem" data-nilai="md">Material Delay</button>
 <button type="button" class="btn btn-block btn-lg btn-man-power btn-problem" data-nilai="mp">Man Power</button>

</fieldset>         
                    
  
</div>
            
                    
</div>
<div class="col-md-6">
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
									<dt><span> <strong>RUN START</strong></span></dt>
									<dd><span class="posted_in"> <strong>:12 JULY 2022 10:00</strong></span></dd>
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
						  
						  <a href="<?= base_url();?>"><button type="button" class="btn btn-primary btn-block btn-lg"><i class="fa fa-shopping-cart"></i>OK</button></a>
					  </p>
				<div class="row">
			<div class="col-md-6">			  
			 <h4 class="text-info">Schedule Production</h4>
			</div>
			<div class="col-md-6 text-right">
						<button type="button" class="btn btn-sm btn-info" id="btnSchedule" data-nomesin="<?= $mesin['id'];?>">Add Shcedule</button>	
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
												  <td><?= $row->tanggal;?></td>
												  <td><?= $row->jumlah;?></td>
											
										</tr>
									
							<?php
									}
							?>
				  </tbody>
				</table>
 </section>          
</div>
      </div>
  </section>
  </div>
</div>

<style type="text/css">

/*panel*/
.panel {
    border: none;
    box-shadow: none;
}

.panel-heading {
    border-color:#eff2f7 ;
    font-size: 16px;
    font-weight: 300;
}

.panel-title {
    color: #2A3542;
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 0;
    margin-top: 0;
    font-family: 'Open Sans', sans-serif;
}

/*product list*/

.prod-cat li a{
    border-bottom: 1px dashed #d9d9d9;
}

.prod-cat li a {
    color: #3b3b3b;
}

.prod-cat li ul {
    margin-left: 30px;
}

.prod-cat li ul li a{
    border-bottom:none;
}
.prod-cat li ul li a:hover,.prod-cat li ul li a:focus, .prod-cat li ul li.active a , .prod-cat li a:hover,.prod-cat li a:focus, .prod-cat li a.active{
    background: none;
    color: #ff7261;
}

.pro-lab{
    margin-right: 20px;
    font-weight: normal;
}

.pro-sort {
    padding-right: 20px;
    float: left;
}

.pro-page-list {
    margin: 5px 0 0 0;
}

.product-list img{
    width: 100%;
    border-radius: 4px 4px 0 0;
    -webkit-border-radius: 4px 4px 0 0;
}

.product-list .pro-img-box {
    position: relative;
}
.adtocart {
    background: #fc5959;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    color: #fff;
    display: inline-block;
    text-align: left;
    border: 3px solid #fff;
    left: 45%;
    bottom: -25px;
    position: absolute;
}

.pro-title {
    color: #5A5A5A;
    display: inline-block;
    margin-top: 20px;
    font-size: 16px;
}

.product-list .price {
    color:#fc5959 ;
    font-size: 15px;
}

.pro-img-details {
    margin-left: -15px;
}
.pro-img-details h2{
	text-align:center;
	font-size:40px;
	font-weight:600
}

.pro-img-details h1{
	text-align:center;
	font-size:60px;
	font-weight:700
}

.pro-img-details img {
    width: 100%;
}

.pro-d-title {
    font-size: 25px;
	font-weight:700;
    margin-top: 0;
}

.product_meta {
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    margin: 5px 0;
}
.dl-horizontal dt{
	
	text-align:left;
	
}

.product_meta span {
    display: block;
    
}
.product_meta a, .pro-price{
    color:#fc5959 ;
}

.pro-price, .amount-old {
    font-size: 18px;
    padding: 0 10px;
}

.amount-old {
    text-decoration: line-through;
}

.quantity {
    width: 120px;
}

.pro-img-list {
    margin: 10px 0 0 -15px;
    width: 100%;
    display: inline-block;
}

.pro-img-list a {
    float: left;
    margin-right: 10px;
    margin-bottom: 10px;
}

.pro-d-head {
    font-size: 18px;
    font-weight: 300;
}

fieldset.scheduler-border {
    border: 2px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
        font-size: 1.3em !important;
        font-weight: bold !important;
        text-align: center !important;
        width:auto;
        padding:0 5px;
        border-bottom:none;
    }

</style>