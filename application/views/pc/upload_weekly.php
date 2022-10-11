
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Upload Weekly Schedule</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<?= date('Y-m-d');?>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2><a href="<?= base_url('pccont/jadwal');?>"><button type="submit" name="submit" class="btn btn-info">LIST WEEKLY SCHEDULE</button></a> <small></small></h2>
									
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									
									<form action="<?= base_url('pccont/form');?>" method="post" enctype="multipart/form-data">
									
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-2 col-sm-2 label-align">UPLOAD EXCEL</label>
											<div class="col-md-6 col-sm-6">
											  <input type="file" name="file_import" id="file_import" class="form-control" placeholder="Weekly Data">
												
											</div>
											<label for="middle-name" class="col-form-label col-md-4 col-sm-4 label-align">
											
												<input type="submit" name="preview" class="btn btn-info" value="PREVIEW">
												
											</label>
										</div>
									</form>
									
																	
	<?php
	
	if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
	
		if(isset($upload_error)){ // Jika proses upload gagal
			echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
			die; // stop skrip
		}

		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".base_url("pccont/import")."'>";

		// Buat sebuah div untuk alert validasi kosong
		echo "<div style='color: green;font-weight:300;' id='kosong'>
		SEMUA DATA CELL EXCEL HARUS DI ISI<span id='jumlah_kosong'></span>.
		</div>";
		
		echo "<h3>Preview Data</h3>";
		echo "<table class='table table-sm table-striped'>
		<thead>
			<tr class='class='head-table'>
				<th>No MC</th>
				<th>Draw No</th>
				<th>Mold</th>
				<th>Jumlah</th>
				<th>Tanggal</th>
				<th>Status</th>
				<th>Input By</th>
			</tr>
		<thead>";
		
		echo"<tbody>";

		$numrow = 1;
		$kosong = 0;

		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){
			
			// Ambil data pada excel sesuai Kolom
			
			$nomc 		= $row['A']; // Ambil data NIS
			$drawno 	= $row['B']; // Ambil data nama
			$mold	 	= $row['C'];
			$jumlah 	= $row['D']; // Ambil data jenis kelamin
			$tgl 		= $row['E']; // Ambil data alamat
		
			
			// Cek jika semua data tidak diisi
			if($nomc == "" && $drawno == "" && $mold == "" && $jumlah == "" && $tgl == ""){
				
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			}
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				
				// Validasi apakah semua data telah diisi
				$nomc_td 		= ( ! empty($nomc))? "" : " style='background:#E07171;'"; // Jika NIS kosong, beri warna merah
				$drawno_td 		= ( ! empty($drawno))? "" : " style='background:#E07171;'"; // Jika Nama kosong, beri warna merah
				$mold_td 		= ( ! empty($mold))? "" : " style='background:#E07171;'"; // Jika Nama kosong, beri warna merah
				$jumlah_td 		= ( ! empty($jumlah))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$tgl_td 		= ( ! empty($tgl))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

						// Jika salah satu data ada yang kosong
						if($nomc == "" or $drawno == "" or $mold == "" or $jumlah == "" or $tgl == ""){
							
							$kosong++; // Tambah 1 variabel $kosong
						}

				echo "<tr>";
				echo "<td".$nomc_td.">".$nomc."</td>";
				echo "<td".$drawno_td.">".$drawno."</td>";
				echo "<td".$mold_td.">".$mold."</td>";
				echo "<td".$jumlah_td.">".format_angka($jumlah)."</td>";
				echo "<td".$tgl_td.">".$tgl."</td>";
				echo "<td>Planning</td>";
				echo "<td>".$user['name']."</td>";
				echo "</tr>";
				
			}

			$numrow++; // Tambah 1 setiap kali looping
		}

		echo "</tbody>";
		echo "</table>";
		

		// Cek apakah variabel kosong lebih dari 0
		// Jika lebih dari 0, berarti ada data yang masih kosong
		if($kosong > 0){
		?>
			<script>
			$(document).ready(function(){
				
				// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
				$("#jumlah_kosong").html('<?php echo $kosong; ?>');

				$("#kosong").show(); // Munculkan alert validasi kosong
			});
			</script>
		<?php
		}else{ // Jika semua data sudah diisi
			echo "<hr>";

			// Buat sebuah tombol untuk mengimport data ke database
			echo "<button type='submit' name='import' class='btn btn-primary'>Import Data</button>";
		}

		echo "</form>";
	}
	?>
			</div>
								
<!-- Dari sini -->

		<!-- sampe sini -->
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->