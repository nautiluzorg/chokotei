 
           <form method='post' action='<?= base_url('prodcont/import');?>'>
            <input type='hidden' name='namafile' value='" . $nama_file_baru . "'>

          
            <div id='kosong' style='color: red;margin-bottom: 10px;'>
					<h5>Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.</h5>
                </div>

            <table border='1' cellpadding='5'>
					<tr>
						<th colspan='5' class='text-center'>Preview Data</th>
					</tr>
					<tr>
						<th>No MC</th>
						<th>Draw No</th>
						<th>Mold</th>
						<th>Jumlah</th>
						<th>Tanggal</th>
					</tr>
		<?php 
            $numrow = 1;
            $kosong = 0;
            foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
                // Ambil data pada excel sesuai Kolom
                $nomc 		= $row['A']; // Ambil data NIS
                $drawno 	= $row['B']; // Ambil data nama
                $mold 		= $row['C']; // Ambil data jenis kelamin
                $jumlah 	= $row['D']; // Ambil data telepon
                $tanggal 	= $row['E']; // Ambil data alamat

                // Cek jika semua data tidak diisi
                if ($nomc == "" && $drawno == "" && $mold == "" && $jumlah == "" && $tanggal == "")
                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if ($numrow > 1) {
                    // Validasi apakah semua data telah diisi
                    $nomc_td 		= (!empty($nomc)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                    $drawno_td 		= (!empty($drawno)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                    $mold_td 		= (!empty($mold)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                    $jumlah_td 		= (!empty($jumlah)) ? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                    $tanggal_td 	= (!empty($tanggal)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

                    // Jika salah satu data ada yang kosong
                    if ($nomc == "" or $drawno == "" or $mold == "" or $jumlah == "" or $tanggal == "") {
                        $kosong++; // Tambah 1 variabel $kosong
                    }
						echo "<tr>";
						echo "<td" . $nomc_td . ">" . $nomc . "</td>";
						echo "<td" . $drawno_td . ">" . $drawno . "</td>";
						echo "<td" . $mold_td . ">" . $mold . "</td>";
						echo "<td" . $jumlah_td . ">" . $jumlah . "</td>";
						echo "<td" . $tanggal_td . ">" . $tanggal . "</td>";
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
                echo "<button type='submit' class='btn btn-sm btn-info' name='import'>Import</button>";
            }

    echo "</form>";