

<div class="container">
<div class="row">
<div class="col-md-12">


<form>
	<br><br>
	<span class="btn green"><a href="<?= base_url() ?>excel/import">Upload Weekly</a></span>
	<br><br>
  <table class="view" cellpadding="8" border="1">
		<!-- Header -->
   
	<tr>
		<th>LINE</th>
		<th>DRAWING NUMBER</th>
		<th>MOLD</th>
		<th>JUMLAH</th>
		<th>STATUS</th>
		<th>TANGGAL</th>
		<th>UPLOAD BY</th>
		<th>TANGGAL UPLOAD</th>
	</tr>

	<!-- coba dari sini -->
	<?php 
	      $numrow = 1;
          $kosong = 0;
            foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
                // Ambil data pada excel sesuai Kolom
                $line_machine 			= $row['A']; // Ambil data NIS
                $drawing_number 		= $row['B']; // Ambil data nama
                $mold_number	 		= $row['C']; // Ambil data nama
                $jumlah_produksi		= $row['D']; // Ambil data jenis kelamin
                $tanggal_plan 			= $row['E']; // Ambil data telepon
				
				
             

                // Cek jika semua data tidak diisi
                if ($line_machine == "" && $drawing_number == "" && $mold_number == "" && $jumlah_produksi == "" && $tanggal_plan == "")
                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if ($numrow > 1) {
                    // Validasi apakah semua data telah diisi
                    $line_machine_td 			= (!empty($line_machine)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                    $drawing_number_td 			= (!empty($drawing_number)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $mold_number_td 			= (!empty($mold_number)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                    $jumlah_produksi_td 		= (!empty($jumlah_produksi)) ? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                    $tanggal_plan_td 			= (!empty($tanggal_plan)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
               

                    // Jika salah satu data ada yang kosong
                    if ($line_machine == "" or $drawing_number == "" or $mold_number == "" or $jumlah_produksi == "" or $tanggal_plan == "") {
                        $kosong++; // Tambah 1 variabel $kosong
                    }
						echo "<tr>";
						echo "<td" . $line_machine_td . ">" . $line_machine . "</td>";
						echo "<td" . $drawing_number_td . ">" . $drawing_number . "</td>";
						echo "<td" . $mold_number_td . ">" . $mold_number . "</td>";
						echo "<td" . $jumlah_produksi_td . ">" . $jumlah_produksi . "</td>";
						echo "<td" . $tanggal_plan_td . ">" . $tanggal_plan . "</td>";
						echo "</tr>";
                }

                $numrow++; // Tambah 1 setiap kali looping
        }
	?>
	
  </table>
  <?php
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
                echo "<button type='submit' class='btn btn-sm btn-info' name='import'>Import</button>";
            }
	?>
</form>



















































</div>
</div>