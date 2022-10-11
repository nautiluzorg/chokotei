<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;


class Pccont extends CI_Controller
{
	var $filename = "jadwal";

	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
		$this->load->model('Pccont_model', 'pcmod');
		$this->ip_address    	= $_SERVER['REMOTE_ADDR'];
		$this->datetime 	    = date("Y-m-d H:i:s");
	}

	public function index()
	{

		$data['title'] = 'User Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('pc/sidebar', $data);
		$this->load->view('pc/topbar', $data);
		$this->load->view('pc/index', $data);
		$this->load->view('template/footer', $data);
	}

	public function user()
	{

		$data['title'] = 'Users Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['users'] = $this->db->get('user')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('pc/sidebar', $data);
		$this->load->view('pc/topbar', $data);
		$this->load->view('pc/users', $data);
		$this->load->view('template/footer', $data);
	}

	public function drawing()
	{

		$data['title'] = 'Drawing Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['draws'] = $this->db->get('drawing')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('pc/sidebar', $data);
		$this->load->view('pc/topbar', $data);
		$this->load->view('pc/draw', $data);
		$this->load->view('template/footer', $data);
	}

	public function profile()
	{
		$data['title']  = 'User Profile';
		$data['user'] 	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('pc/sidebar', $data);
		$this->load->view('pc/topbar', $data);
		$this->load->view('pc/profile', $data);
		$this->load->view('template/footer', $data);
	}

	public function jadwal()
	{

		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['schedules'] = $this->db->get_where('jadwal', array('status' => 'planning'))->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('pc/sidebar', $data);
		$this->load->view('pc/topbar', $data);
		$this->load->view('pc/weekly', $data);
		$this->load->view('template/footer', $data);
	}

	public function jaddone()
	{

		$data['title'] = 'Production Done';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		//$data['schedules'] = $this->db->get('jadwal')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('pc/sidebar', $data);
		$this->load->view('pc/topbar', $data);
		$this->load->view('pc/schedule_done', $data);
		$this->load->view('template/footer', $data);
	}

	public function del_weekly($id)
	{
		$this->pcmod->delWeekly($id);
		$this->session->set_flashdata('flash', 'Data weekly telah dihapus!');
		redirect('pccont/jadwal');
	}

	public function plant01()
	{

		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['schedules'] = $this->db->get('jadwal')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('pc/sidebar', $data);
		$this->load->view('pc/topbar', $data);
		$this->load->view('pc/weekly', $data);
		$this->load->view('template/footer', $data);
	}

	public function layout1()
	{

		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data["mesin"] = $this->pcmod->getAllDataMesin();

		$this->load->view('pc/lay_plant01', $data);
	}

	public function getDetailMesinPc()
	{
		$poskode = $this->input->post('kode');
		$data["kode"] = substr($poskode, 0, 3);
		$data["status"] = preg_replace("/[^a-zA-Z]/", "", trim($poskode));


		if ($data["status"] == "RUN") {

			$data["title"] = "Detail Line Running";
			$data["mesin"] = $this->pcmod->getDataMesin($data["kode"]);
			$data['schedules'] = $this->pcmod->getSchedule($data["kode"]);

			$this->load->view('pc/detail', $data);
		} else {

			$data["title"] = "Detail Line Stop";
			$data["problem"] = $this->pcmod->getDataMesinProblem($data["kode"]);
			$data['schedules'] = $this->pcmod->getSchedule($data["kode"]);

			//$this->load->view('pc/detail_stop',$data);
			//echo $data["problem"]["kasus"];



			if ($data["problem"]["kasus"] == "mi") {

				$this->load->view('pc/detail_stop', $data);
			} elseif ($data["problem"]["kasus"] == "mw") {

				$this->load->view('pc/detail_stop_mw', $data);
			} elseif ($data["problem"]["kasus"] == "qp") {

				$this->load->view('pc/detail_stop_qp', $data);
			} elseif ($data["problem"]["kasus"] == "pm") {

				$this->load->view('pc/detail_stop_pm', $data);
			} elseif ($data["problem"]["kasus"] == "md") {

				$this->load->view('pc/detail_stop_md', $data);
			} elseif ($data["problem"]["kasus"] == "mp") {

				$this->load->view('pc/detail_stop_mp', $data);
			}
		}
	}

	public function add_weekly()
	{

		$data['title'] 	= 'Add Weekly';
		$data['user'] 	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['nomor'] 	= $this->pcmod->getAllNoMachine();
		$data['draw'] 	= $this->pcmod->getAllDraw();


		$this->load->view('template/header', $data);
		$this->load->view('pc/sidebar', $data);
		$this->load->view('pc/topbar', $data);
		$this->load->view('pc/add_weekly', $data);
		$this->load->view('template/footer', $data);
	}


	public function listMachine()
	{

		if ($this->input->get('searchTerm', TRUE)) {

			$data = $this->pcmod->getAllMachine_like($this->input->get('searchTerm', TRUE));
		} else {

			$data = $this->pcmod->getAllMachine();
		}

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($data));

		//echo json_encode($data);
	}

	public function daftarDrawingNumber()
	{

		if ($this->input->get('searchTerm', TRUE)) {

			$data = $this->pcmod->getAllDraw_like($this->input->get('searchTerm', TRUE));
		} else {

			$data = $this->pcmod->getAllDraw();
		}

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($data));

		//echo json_encode($data);
	}

	public function addPlanning()
	{

		$data['title'] 	= 'Add Weekly';
		$data['user'] 	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$kodeMachine 			= $this->input->post('machine-no');
		$drawingNumber 			= $this->input->post('drawing-no');
		$moldno		 			= $this->input->post('mold-no');
		$quantity		  		= $this->input->post('quantity');
		$tanggal		  		= $this->input->post('tanggal');

		$data = [
			'no_mc' => $kodeMachine, 'draw_no' => $drawingNumber, 'mold' => $moldno, 'jumlah' => $quantity,
			'status' => 'planning', 'tanggal' => $tanggal, 'created_by' => $data['user']['email']

		];

		$success = $this->pcmod->addJadwal($data);
		if ($success) {

			redirect(base_url('pccont/jadwal'));
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



	public function form()
	{

		$data = array(); // Buat variabel $data sebagai array
		$data['title'] 	= 'Add Weekly';
		$data['user'] 	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php

			$upload = $this->pcmod->upload_file($this->filename);

			if ($upload['result'] == "success") { // Jika proses upload sukses

			
				$reader 		= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				$spreadsheet 	= $reader->load('./uploads/' . $this->upload->data('file_name'));

				// get all retrieved data from cell to array
				$data['sheet'] 	= $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
				//$data['ext']    = pathinfo($_FILES['file_import']['name'], PATHINFO_EXTENSION);
				//$data['ext2']    = $_FILES['file_import']['tmp_name'];
				
				
				
			} else { // Jika proses upload gagal


				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan

			}
		}

		$this->load->view('template/header', $data);
		$this->load->view('pc/sidebar', $data);
		$this->load->view('pc/topbar', $data);
		$this->load->view('pc/upload_weekly', $data);
		$this->load->view('template/footer', $data);
	}


	public function import()
	{

		$data['user'] 	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// read file that has been uploaded using specific reader
		$reader 		= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		//$spreadsheet 	= $reader->load('./uploads/'.$this->upload->data('file_name'));
		$spreadsheet = $reader->load('./uploads/jadwal.xlsx');
		// retieve all data in excel then convert into array
		$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

		// initialize array to hold inserted data 
		$data_import = array();


		$numrow = 1;

		foreach ($sheet as $row) {
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if ($numrow > 1) {

				// Kita push (add) array data ke variabel data
				array_push($data_import, array(

					'no_mc'	=>	$row['A'], // Insert data nis dari kolom A di excel
					'draw_no' => $row['B'], // Insert data nama dari kolom B di excel
					'mold' => $row['C'], // Insert data nama dari kolom B di excel
					'jumlah' => $row['D'], // Insert data jenis kelamin dari kolom C di excel
					'status' => 'planning', // Insert data alamat dari kolom D di excel
					'tanggal' => $row['E'], // Insert data alamat dari kolom D di excel
					'created_by' => $data['user']['name'] // Insert data alamat dari kolom D di excel
				));
			}

			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->pcmod->insert_multiple($data_import);
		$this->session->set_flashdata('flash', 'Import data has been inserted');

		redirect("pccont/jadwal"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}
