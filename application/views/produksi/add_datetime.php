<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h4><?= $title; ?></h4>
      <br>
      <form class="form-horizontal">
        <input type="hidden" name="kodePlan" id="kodePlan" value="<?= $kodePlan; ?>">
        <input type="hidden" name="kodeMesin" id="kodeMesin" value="<?= $kodeMesin; ?>">
        <input type="hidden" name="kodeStatus" id="kodeStatus" value="<?= $kodeStatus; ?>">

        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label"> Add Date Time</label>
          <div class="col-sm-9">
            <input type="text" name="dateRun" id="dateRun" class="form-control datetime" placeholder="Date Time">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cek"> Saya input data dengan benar.
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="button" name="UpTime" id="UpTime" class="btn btn-info">Submit</button>
          </div>
        </div>
      </form>


    </div>

  </div>
</div>

<script type="text/javascript">
  $('.datetime').datetimepicker({
    autoclose: 1, //language:  'fr',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1
  });

  $('document').ready(function() {

    $('#UpTime').prop('disabled', true);

    //KETIKA TOMBOL CHECKED DI CENTANG****
    $(".cek").on("click", function() {

      if ($(".cek:checked").length > 0) {
        $('#UpTime').prop('disabled', false);
      } else {

        $('#UpTime').prop('disabled', true);
      }
    });

    $("#UpTime").on('click', function() {
      var kodeMesin     = $("#kodeMesin").val();
      var status        = $("#kodeStatus").val();
      var kodePlan      = $("#kodePlan").val();
      var tglwkt        = $("#dateRun").val();

      //alert(kodeMesin+" "+kodePlan+" "+status+" "+tglwkt);

      $.ajax({

        type: 'POST',
        data: {
          'kodeMesin': kodeMesin,
          'status': status,
          'kodePlan': kodePlan,
          'tglwkt': tglwkt
        },
        url: '<?= base_url() . 'Prodcont/addWaktu' ?>',
        dataType: 'html',
        success: function(hasilAdd) {
          $("#about").html(hasilAdd);
        }
      });

    });



  });
</script>