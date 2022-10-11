
<div class="container-fluid">
<div class="row">
<div class="col-md-6">
<fieldset class="scheduler-border">
    <legend class="scheduler-border"><h4><?= ucwords($title)." Machine ".$nomachine;?></h4></legend>



<form class="form-horizontal">
<input type="hidden" name="kodemachine" id="kodemachine" value="<?= $nomachine;?>">
<input type="hidden" name="problem" id="problem" value="<?= $problem;?>">
<input type="hidden" name="kelas" id="kelas" value="<?= $kelas;?>">
<input type="hidden" name="sub_status" id="sub_status" value="<?= $title;?>">
<input type="hidden" name="draw_no" id="draw_no" value="<?= $drawing;?>">

  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Date Time</label>
    <div class="col-sm-10">
      <input type="text" name="estimate_time" id="estimate_time" class="form-control datetime" id="inputPassword3" placeholder="Date Time">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" class="cek"> Saya input data dengan benar.
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" name="submit" id="submit" class="btn btn-info">Submit</button>
   
    </div>
  </div>
</form>
</fieldset>
</div>
<div class="col-md-6">

</div>
</div>
</div>
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


    $('document').ready(function() {
		
		$('#submit').prop('disabled', true);
		
        $("#submit").on('click',function() {
			
               var machine = $("#kodemachine").val();
               var problem = $("#problem").val();
			   var drawing = $("#draw_no").val();
			   var estimate = $("#estimate_time").val();
			   var kelas = $("#kelas").val();
			   var sub_status = $("#sub_status").val();
			   
               //alert("No :" +machine+" "+problem+" "+drawing+" "+estimate+" "+kelas+" "+sub_status);
			   
		
						$.ajax({
							
							type: 'POST',
                            data: { 'kode':machine, 'problem':problem,'drawing':drawing,'estimate':estimate,'kelas':kelas,'sub_status':sub_status},
                            dataType:'json',
							url: '<?= base_url() . 'Welcome/insertProblem' ?>',
							success: function(resp) {
								
                                 if (resp.status == "success")
                                    window.location.href = resp.redirect_url;
							}
						});
                    return false;
			    
        }); 
		
		
		$( ".cek" ).on( "click", function() {
			
			if($( ".cek:checked" ).length > 0)
				{
					$('#submit').prop('disabled', false);
			}
			else{
				
					$('#submit').prop('disabled', true);
			}
		});	
   });
</script>	
