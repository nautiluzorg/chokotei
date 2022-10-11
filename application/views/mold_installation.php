<h2 class="pro-d-title">
<?= STRTOUPPER($title)." MACHINE "?>
</h2>
<br>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">ADD DRAW NO AND DATE</legend>

<form class="form-horizontal">
<input type="hidden" name="kodemachine" id="kodemachine" value="<?= $nomachine;?>">
<input type="hidden" name="problem" id="problem" value="<?= $problem;?>">
<input type="hidden" name="kelas" id="kelas" value="<?= $kelas;?>">
<input type="hidden" name="sub_status" id="sub_status" value="<?= $title;?>">
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Draw No</label>
    <div class="col-sm-8">
      
	  	  <select name="drawing-no" id="drawing-no" class="form-control select2bs4_daftar">
				<option></option>
				  
	      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Date Time</label>
    <div class="col-sm-6">
      <input type="text" name="estimate_time" id="estimate_time" class="form-control datetime" id="inputPassword3" placeholder="Date Time">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <div class="checkbox">
        <label>
          <input type="checkbox" class="cek"> Saya input data dengan benar.
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="button" name="submit" id="submit" class="btn btn-info">Submit</button>
   
    </div>
  </div>
</form>

</fieldset>


<script type="text/javascript">

	
    $('.select2bs4_daftar').select2({
		
            placeholder: "-Pilih Draw No-",
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
			   var drawing = $("#drawing-no").val();
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
