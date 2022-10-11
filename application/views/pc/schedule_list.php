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
<style>
.garis{
    
    border-bottom:1px solid #d0d0d0;
    margin-top:5px;
    
}
hr{
    color:#d0d0d0;
}


</style>
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
            <li><a href="<?= base_url('prodcont/schedule');?>">Planning Production</a></li>
            <li><a href="<?= base_url('prodcont/plant01');?>">Plant 01</a></li>
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


<section class="about" id="about">
<div class="container">
<div class="row">
<div class="col-md-12">
    <h4>Import Weekly Data</h4>
 <a href="#"><button type="button" class="btn btn-sm btn-default">DOWNLOAD FORMAT</button></a> &nbsp;|&nbsp;
 <a href="<?= base_url('prodcont');?>"><button type="button" class="btn btn-sm btn-info">PLANNING PRODUCTION</button></a>
        <br>
</div>
</div>
<div class="row garis">
<div class="col-md-12">

  <!-- Sweet Alert -->
  <?php if( $this->session->flashdata('flash') ) : ?>
  <div class="alert success">
    <input type="checkbox" id="alert0">
    <label class="close" title="close" for="alert0"> &#10006; </label>
    <p class="inner"><?= $this->session->flashdata('flash') ?></p>
  </div>
  <?php endif; ?>

  <!-- Option button -->
<br>
  
<form action="<?= base_url('prodcont/preview_import');?>" method="POST" enctype="multipart/form-data" class="form-inline">

      <div class="form-group">
        <label for="exampleInputEmail2">Masukan data</label>
        <input type="file" name="file_import" class="form-control" id="exampleInputEmail2">
      </div>
      <input type="submit" name="preview" class="btn btn-warning" value="Preview Data">
</form>
</div>
</div>

<div class="row">
<div class="col-md-12">
  <h3>PREVIEW IMPORT</h3>
  
      <?php
      
      
    // Jika user telah mengklik tombol Preview
    if (isset($_POST['preview'])) {
        $tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
        $nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';

        // Cek apakah terdapat file data.xlsx pada folder tmp
        if (is_file(base_url().'uploads/' . $nama_file_baru)) // Jika file tersebut ada
            unlink(base_url().'uploads/' . $nama_file_baru); // Hapus file tersebut

        $ext = pathinfo($_FILES['file_import']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
        $tmp_file = $_FILES['file_import']['tmp_name'];

        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
        if ($ext == "xlsx") {
            
            
            // Upload file yang dipilih ke folder tmp
            // dan rename file tersebut menjadi data{tglsekarang}.xlsx
            // {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
            // Contoh nama file setelah di rename : data20210814192500.xlsx
            move_uploaded_file($tmp_file,'uploads/' . $nama_file_baru);

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load(base_url().'uploads/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
            $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            // Buat sebuah tag form untuk proses import data ke database
            echo "<form method='post' action='import.php'>";

            // Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
            // ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
            echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";

            // Buat sebuah div untuk alert validasi kosong
            echo "<div id='kosong' style='color: red;margin-bottom: 10px;'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                </div>";

            echo "<table border='1' cellpadding='5'>
					<tr>
						<th colspan='5' class='text-center'>Preview Data</th>
					</tr>
					<tr>
						<th>NIS</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Telepon</th>
						<th>Alamat</th>
					</tr>";

            $numrow = 1;
            $kosong = 0;
            foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
                // Ambil data pada excel sesuai Kolom
                $nis = $row['A']; // Ambil data NIS
                $nama = $row['B']; // Ambil data nama
                $jenis_kelamin = $row['C']; // Ambil data jenis kelamin
                $telp = $row['D']; // Ambil data telepon
                $alamat = $row['E']; // Ambil data alamat

                // Cek jika semua data tidak diisi
                if ($nis == "" && $nama == "" && $jenis_kelamin == "" && $telp == "" && $alamat == "")
                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if ($numrow > 1) {
                    // Validasi apakah semua data telah diisi
                    $nis_td = (!empty($nis)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                    $nama_td = (!empty($nama)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $jk_td = (!empty($jenis_kelamin)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                    $telp_td = (!empty($telp)) ? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                    $alamat_td = (!empty($alamat)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

                    // Jika salah satu data ada yang kosong
                    if ($nis == "" or $nama == "" or $jenis_kelamin == "" or $telp == "" or $alamat == "") {
                        $kosong++; // Tambah 1 variabel $kosong
                    }

                    echo "<tr>";
                    echo "<td" . $nis_td . ">" . $nis . "</td>";
                    echo "<td" . $nama_td . ">" . $nama . "</td>";
                    echo "<td" . $jk_td . ">" . $jenis_kelamin . "</td>";
                    echo "<td" . $telp_td . ">" . $telp . "</td>";
                    echo "<td" . $alamat_td . ">" . $alamat . "</td>";
                    echo "</tr>";
                }

                $numrow++; // Tambah 1 setiap kali looping
            }

            echo "</table>";

            // Cek apakah variabel kosong lebih dari 0
            // Jika lebih dari 0, berarti ada data yang masih kosong
            if ($kosong > 0) {
    ?>
                <script>
                    $(document).ready(function() {
                        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                        $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                        $("#kosong").show(); // Munculkan alert validasi kosong
                    });
                </script>
    <?php
            } else { // Jika semua data sudah diisi
                echo "<hr>";

                // Buat sebuah tombol untuk mengimport data ke database
                echo "<button type='submit' name='import'>Import</button>";
            }

            echo "</form>";
        } else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
            // Munculkan pesan validasi
            echo "<div style='color: red;margin-bottom: 10px;'>
					Hanya File Excel 2007 (.xlsx) yang diperbolehkan
                </div>";
        }
    }
    ?>
  
  
  
  
  
  

</div>
</div>



</div>
</section>
<!-- /.content -->


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
		
		
		$("body").on("submit", "#form-upload-user", function(e) {
			
			//var nilai = 'SELAMAT DATANG';
               //alert(nilai);
			
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('prodcont/import') ?>",
                data: data,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function() {
                    $("#btnUpload").prop('disabled', true);
                    $(".user-loader").show();
                }, 
                success: function(result) {
                    $("#btnUpload").prop('disabled', false);
                    if($.isEmptyObject(result.error_message)) {
                        $(".result").html(result.success_message);
                    } else {
                        $(".sub-result").html(result.error_message);
                    }
                    $(".user-loader").hide();
                }
            });
			
        });	 
   });	
</script>	
</div>
</body>
</html>
