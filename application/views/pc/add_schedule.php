<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h4><?= $title;?></h4>
<br>

<form class="form-horizontal">
<input type="hidden" name="kode" id="kode" value="<?= $kode;?>">
<input type="hidden" name="status" id="status" value="<?= $status;?>">
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Draw No</label>
    <div class="col-sm-10">
      
	  	  <select name="drawing-no" id="drawing-no" class="form-control select2bs4_daftar">
				<option></option>
				  
	      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Qty</label>
    <div class="col-sm-10">
      <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Qty">
    </div>
  </div>

  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Saya input data dengan benar.
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


</div>

</div>
</div>

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
        

    $('document').ready(function() {
		
        $("#submit").on('click',function() {
               var kode         	= $("#kode").val();
               var status         	= $("#status").val();
               var draw         	= $("#drawing-no").val();
               var qty          	= $("#quantity").val();
               
              // alert(nilai+" "+kode+" "+qty+" "+tglwkt);
               
               	$.ajax({
						
							type: 'POST',
							data: { 'kode':kode,'status':status, 'draw':draw,'qty':qty},
							url: '<?= base_url() . 'prodcont/addSchedule' ?>',
							dataType: 'html',
							success: function(hasilAdd) {
								$("#about").html(hasilAdd);
							}
						}); 
        });		 
   });	
</script>