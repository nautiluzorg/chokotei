<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class Prodcont extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
		$this->load->model('Prodcont_model', 'promod');
		$this->ip_address    	= $_SERVER['REMOTE_ADDR'];
		$this->datetime 	    = date("Y-m-d H:i:s");
	}


	public function index()
	{

		$data['title'] = 'User Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('produksi/sidebar', $data);
		$this->load->view('produksi/topbar', $data);
		$this->load->view('produksi/index_original', $data);
		$this->load->view('template/footer', $data);
	}

	public function user()
	{

		$data['title'] = 'Users Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['users'] = $this->db->get('user')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('produksi/sidebar', $data);
		$this->load->view('produksi/topbar', $data);
		$this->load->view('produksi/users', $data);
		$this->load->view('template/footer', $data);
	}
	public function drawing()
	{

		$data['title'] = 'Drawing Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['draws'] = $this->db->get('drawing')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('produksi/sidebar', $data);
		$this->load->view('produksi/topbar', $data);
		$this->load->view('produksi/draw', $data);
		$this->load->view('template/footer', $data);
		
	}

	public function profile()
	{

		$data['title'] = 'User Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('produksi/sidebar', $data);
		$this->load->view('produksi/topbar', $data);
		$this->load->view('produksi/profile', $data);
		$this->load->view('template/footer', $data);
	}

	public function jadwal()
	{

		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['schedules'] = $this->db->get_where('jadwal', array('status' => 'planning'))->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('produksi/sidebar', $data);
		$this->load->view('produksi/topbar', $data);
		$this->load->view('produksi/weekly', $data);
		$this->load->view('template/footer', $data);
	}

	public function jaddone()
	{

		$data['title'] = 'Production Done';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		//$data['schedules'] = $this->db->get('jadwal')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('produksi/sidebar', $data);
		$this->load->view('produksi/topbar', $data);
		$this->load->view('produksi/schedule_done', $data);
		$this->load->view('template/footer', $data);
	}
	
	public function layout1(){
		
		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data["mesin"] = $this->promod->getAllDataMesin();
		
		$this->load->view('produksi/index',$data);
		
	}
	
	
	
	
	
	
	
	
	
	
	public function getDetailMesinProd()
	{
		$poskode 		= $this->input->post('kode');
		$data["kode"] 	= substr($poskode, 0, 3);
		$data["status"] = preg_replace("/[^a-zA-Z]/","", trim($poskode));


		if ($data["status"] == "RUN") {

			$data["title"] 		= "Detail Line Running";
			$data["mesin"] 		= $this->promod->getDataMesin($data["kode"]);
			$data['schedules'] 	= $this->promod->getSchedule($data["kode"]);

			$this->load->view('produksi/detail', $data);
			
		} else {

			$data["title"] 		= "Detail Line Stop";
			$data["problem"] 	= $this->promod->getDataMesinProblem($data["kode"]);
			$data['schedules'] 	= $this->promod->getSchedule($data["kode"]);

			//$this->load->view('produksi/detail_stop', $data);
			
			if($data["problem"]["kasus"] == "mi"){
					
					$this->load->view('produksi/detail_stop_mi',$data);
					
			}elseif($data["problem"]["kasus"] == "mw"){
					
					$this->load->view('produksi/detail_stop_mw',$data);
					
			}elseif($data["problem"]["kasus"] == "qp"){
					
					$this->load->view('produksi/detail_stop_qp',$data);
					
			}elseif($data["problem"]["kasus"] == "pm"){
					
					$this->load->view('produksi/detail_stop_pm',$data);
					
			}elseif($data["problem"]["kasus"] == "md"){
					
					$this->load->view('produksi/detail_stop_md',$data);
					
			}elseif($data["problem"]["kasus"] == "mp"){
					
					$this->load->view('produksi/detail_stop_mp',$data);
					
			}
			
			
		}
	}

	public function insertProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $problem 	= $this->input->post('problem');
        $drawing 	= $this->input->post('drawing');
        $kelas 		= $this->input->post('kelas');
        $sub_status = $this->input->post('sub_status');
        $remark		= $this->input->post('remark');
		$customer   = getCustomer($drawing);
		
		
		$this->promod->upDateMesin($drawing,$kode,$sub_status,$kelas);
		$this->promod->insertProblemMc($kode,$problem,$drawing,$customer,$remark);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('prodcont/layout1');
		
		
		$string = json_encode($result);
		
		echo $string;
		
    }

	
	public function tambahWaktu()
    {
        $data["kodePlan"] 	= $this->input->post('kodePlan');
        $data["kodeMesin"] 	= $this->input->post('kodeMesin');
        $data["kodeStatus"] 	= $this->input->post('kodeStatus');
        
		$data["title"] = "Update Running Time ";
	
		$this->load->view('produksi/add_datetime',$data);
				
			
			
    }

		
	public function addWaktu(){
		
		$kodeMesin 			= $this->input->post('kodeMesin');
		$kodePlan 			= $this->input->post('kodePlan');
		$status 			= $this->input->post('status');
        $tglwkt	    		= $this->input->post('tglwkt');
		
			if($status == "RUN"){
				
				$data["title"] 	= "Detail Line Running";
				$data["kode"] 	= $kodeMesin;
				$this->promod->updateWaktu($kodePlan,$tglwkt);
				$data["mesin"] 	= $this->promod->getDataMesin($kodeMesin);
				$data['schedules'] = $this->promod->getSchedule($data["kode"]);
				
				
				$this->load->view('produksi/detail',$data);
				
			}else{
				
				$data["title"] = "Detail Line Stop";
				$data["kode"] = $kodeMesin;
				$this->promod->updateWaktu($kodePlan,$tglwkt);
				$data["problem"] = $this->promod->getDataMesinProblem($kodeMesin);
				$data['schedules'] = $this->promod->getSchedule($data["kode"]);
				
				
				$this->load->view('produksi/detail_stop',$data);
			}
	}
	
	public function problem()
	{

		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['problems'] 	= $this->promod->getProduksiProblem();

		$this->load->view('template/header', $data);
		$this->load->view('produksi/sidebar', $data);
		$this->load->view('produksi/topbar', $data);
		$this->load->view('produksi/problem', $data);
		$this->load->view('template/footer', $data);
	}
	
	public function status()
	{

		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['problems'] = $this->db->get_where('problem', array('status' => 'stop'))->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('produksi/sidebar', $data);
		$this->load->view('produksi/topbar', $data);
		$this->load->view('produksi/status', $data);
		$this->load->view('template/footer', $data);
	}

	public function getViewDetailProblem($nomesin){
		
			$data["title"] 		= "DETAIL LINE CURRENT STOP MACHINE";
			$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			
			$data["problem"] 	= $this->promod->getDataMesinProblem($nomesin);
			$data['schedules'] 	= $this->promod->getSchedule($nomesin);
			$data['kode']    	= $nomesin;

		
			if($data["problem"]["kasus"] == "mp"){
				
				$this->load->view('produksi/view_detail_problem_mp', $data);
				
				
			}
			
			
			
		
	}

	public function updateProduksiProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $nilai	 	= $this->input->post('nilai');
 
		
		
		$this->promod->updateProduksi($kode,$nilai);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('prodcont/problem');
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	
	public function runMachine()
    {
        $kode 	 		= $this->input->post('kode');
		$kodeProblem	= $this->input->post('kodeproblem');
		
		
		
		$this->promod->runMesinProduction($kode);
		$this->promod->doneProblem($kodeProblem);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('prodcont/layout1');
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }










	public function index2()
	{
		$data['title'] = 'preview data';

		$data['datas'] = $this->promod->getAll()->result_array();
		$data['fields'] = $this->promod->getFields();
		$data['numCol'] = $this->promod->getCol();


		$this->load->view('pc/preview', $data);
	}

	public function generateChar($num)
	{
		$numeric = ($num - 1) % 26;
		$letter = chr(65 + $numeric);
		$div = ($num - 1) / 26;
		$num2 = (int)$div;
		if ($num2 > 0) {
			return $this->generateChar($num2) . $letter;
		} else {
			return $letter;
		}
	}

	public function getLetters($num_col)
	{
		// initialize array to hold coloumn character
		$letters = [];

		// generate char based on coloumn in db
		for ($i = 1; $i <= $num_col; $i++) {
			$char = $this->generateChar($i);
			array_push($letters, $char);
		}

		return $letters;
	}

	public function check_import()
	{
		// load upload library
		$this->load->library('upload');
		$data['title'] = 'import data from excel';

		// get fieldsname & number of coloumn
		$data['fields'] = $this->promod->getFields();
		$num_col = $this->promod->getCol();

		// get letters array
		$alphabet = $this->getLetters($num_col);

		//$this->load->view('header', $data);
		$this->load->view('pc/schedule_list');

		// check if preview button was clicked
		if (isset($_POST['preview'])) {

			// set config for uploaded file
			$config['upload_path']          	= './uploads/';
			$config['allowed_types']        	= 'xlsx';
			$config['file_name']			  	= 'import_data';
			$config['overwrite']			  	= TRUE;

			// load upload library config
			$this->upload->initialize($config);

			// if uploaded
			if ($this->upload->do_upload('file_import')) {
				// read file that has been uploaded using specific reader
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				$spreadsheet = $reader->load('./uploads/' . $this->upload->data('file_name'));

				// get all retrieved data from cell to array
				$data['sheet'] = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
				$data['letters'] = $alphabet;

				$this->load->view('pc/import_preview', $data);
			}
			// if failed upload
			else {
				$this->session->set_flashdata('flash', 'File failed to upload :(');
				redirect('prodcont/check_import');
			}
		}
	}

	public function import()
	{
		// get number of coloumn
		$fields = $this->promod->getFields();
		$num_col = $this->promod->getCol();

		// get letters array
		$alphabet = $this->getLetters($num_col);

		// read file that has been uploaded using specific reader
		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$spreadsheet = $reader->load('./uploads/import_data.xlsx');

		// retieve all data in excel then convert into array
		$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

		// initialize array to hold inserted data 
		$data = [];

		// variable for initialize row
		$n = 0;
		foreach ($sheet as $row) {
			// looping each coloumn in each row
			for ($i = 0; $i < $num_col; $i++) {
				$data[$n][$fields[$i]] = $row[$alphabet[$i]];
			}
			// when all coloumn done, move to next row
			$n++;
		}

		// remove the first data (row header)
		array_shift($data);

		// post all data in batch to database
		$this->promod->post_batch($data);
		$this->session->set_flashdata('flash', 'Import data has been inserted');
		redirect('prodcont');
	}

	public function preview_import()
	{

		$this->load->library('upload');
		$data['title'] = 'import data from excel';

		//$this->load->view('header', $data);
		$this->load->view('pc/schedule_list');
	}

	public function display()
	{
		$data 	= [];
		$data["result"] = $this->user->get_all();
		$this->load->view("index");
	}

	public function pratampil()
	{


		$tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
		$nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';

		// Cek apakah terdapat file data.xlsx pada folder tmp
		if (is_file(base_url('assets/tmp/') . $nama_file_baru)) // Jika file tersebut ada
			unlink(base_url('assets/tmp/') . $nama_file_baru); // Hapus file tersebut

		$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
		$tmp_file = $_FILES['file']['tmp_name'];

		// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
		if ($ext == "xlsx") {
			// Upload file yang dipilih ke folder tmp
			// dan rename file tersebut menjadi data{tglsekarang}.xlsx
			// {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
			// Contoh nama file setelah di rename : data20210814192500.xlsx
			move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);

			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			$spreadsheet = $reader->load('tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
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






	// import function
	public function import2()
	{

		//file type
		$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['file']['name']); //get file
			$extension = end($arr_file); //get file extension

			// select spreadsheet reader depends on file extension
			if ('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else if ('xlsx') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}

			//'Data' Table
			$dataList = array();
			$dataListArray = array();

			$reader->setReadDataOnly(true);

			//Get filename
			$objPHPExcel = $reader->load($_FILES['file']['tmp_name']);

			//Get sheet by name
			$worksheet = $objPHPExcel->getSheetByName('City');

			/*
            * Get sheet by index
            * Get the second sheet in the workbook
            * Note that sheets are indexed from 0
            */
			// $spreadsheet->getSheet(1);

			/*
            * Get current active sheet
            */
			//$spreadsheet->getActiveSheet();

			$highestRow = $worksheet->getHighestRow(); // e.g. 12
			$highestColumn = $worksheet->getHighestColumn(); // e.g M'

			$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 7
			//Ignoring first row (As it contains column name)
			for ($row = 2; $row <= $highestRow; ++$row) {
				//A row selected
				for ($col = 1; $col <= $highestColumnIndex; ++$col) {
					// values till $cityList['1'] till $cityList['last_column_no'] 
					$dataList[$col] = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
				}
				array_push($dataListArray, $dataList);
				//next row, from top
			}

			if ($this->promod->import($dataListArray) == TRUE) {
				// what to do if import successfull

				redirect(base_url() . 'prodcont', refresh);
			} else {
				// what to do if import failed
				redirect('notok');
			}
		}
	}

	//AREA PC//
	public function plant01()
	{


		$data["mesin"] = $this->promod->getAllDataMesin();
		$this->load->view('pc/plant01', $data);
	}



	public function tambahJadwal()
	{
		$data["kode"] 	= $this->input->post('kode');
		$data["status"] = $this->input->post('status');
		$data["title"] 	= "Add Schedule Machine " . $data["kode"];

		$this->load->view('pc/add_schedule', $data);
	}

	public function addSchedule()
	{

		$kode 			= $this->input->post('kode');
		$status 		= $this->input->post('status');
		$draw    		= $this->input->post('draw');
		$qty	    	= $this->input->post('qty');



		if ($status == "RUN") {

			$data["title"] = "Detail Line Running";
			$data["kode"] = $kode;
			$this->promod->insertJadwal($kode, $draw, $qty);
			$data["mesin"] = $this->promod->getDataMesin($kode);
			$data['schedules'] = $this->promod->getSchedule($data["kode"]);


			$this->load->view('pc/detail', $data);
		} else {

			$data["title"] = "Detail Line Stop";
			$data["kode"] = $kode;
			$this->promod->insertJadwal($kode, $draw, $qty);
			$data["problem"] = $this->promod->getDataMesinProblem($data["kode"]);
			$data['schedule'] = $this->promod->getSchedule($data["kode"]);


			$this->load->view('pc/detail_stop', $data);
		}
	}

	public function schedule()
	{

		$data['title'] = "Schedule Production";

		$data['nomor'] = $this->promod->getAllNoMachine();
		$data['draw']  = $this->promod->getAllDraw();


		$this->load->view('pc/schedule', $data);
	}

	public function get_json_planning()
	{ //data data produk by JSON object


		header('Content-Type: application/json');
		echo $this->promod->get_all_planning();
	}





	public function upload_config($path)
	{
		if (!is_dir($path))
			mkdir($path, 0777, TRUE);
		$config['upload_path'] 		= './' . $path;
		$config['allowed_types'] 	= 'csv|CSV|xlsx|XLSX|xls|XLS';
		$config['max_filename']	 	= '255';
		$config['encrypt_name'] 	= TRUE;
		$config['max_size'] 		= 4096;
		$this->load->library('upload', $config);
	}

	public function addPlanning()
	{

		$kodeMachine 			= $this->input->post('no-machine');
		$drawingNumber 			= $this->input->post('drawing-no');
		$moldno		 			= $this->input->post('mold-no');
		$quantity		  		= $this->input->post('quantity');

		$success = $this->promod->addJadwal($kodeMachine, $drawingNumber, $moldno, $quantity);
		if ($success) {

			redirect(base_url('prodcont/schedule'));
		}
	}
}
