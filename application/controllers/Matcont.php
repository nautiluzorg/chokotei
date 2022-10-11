<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');



class Matcont extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
		$this->load->model('Matcont_model', 'matmod');
		$this->ip_address    	= $_SERVER['REMOTE_ADDR'];
		$this->datetime 	    = date("Y-m-d H:i:s");
	}

	public function index()
	{

		$data['title'] = 'User Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('material/sidebar', $data);
		$this->load->view('material/topbar', $data);
		$this->load->view('material/index', $data);
		$this->load->view('template/footer', $data);
	}

	public function user()
	{

		$data['title'] = 'Users Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['users'] = $this->db->get('user')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('material/sidebar', $data);
		$this->load->view('material/topbar', $data);
		$this->load->view('material/users', $data);
		$this->load->view('template/footer', $data);
	}
	public function drawing()
	{

		$data['title'] = 'Drawing Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['draws'] = $this->db->get('drawing')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('material/sidebar', $data);
		$this->load->view('material/topbar', $data);
		$this->load->view('material/draw', $data);
		$this->load->view('template/footer', $data);
	}

	public function profile()
	{

		$data['title'] = 'User Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('material/sidebar', $data);
		$this->load->view('material/topbar', $data);
		$this->load->view('material/profile', $data);
		$this->load->view('template/footer', $data);
	}

	public function jadwal()
	{
		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['schedules'] = $this->db->get_where('jadwal', array('status' => 'planning'))->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('material/sidebar', $data);
		$this->load->view('material/topbar', $data);
		$this->load->view('material/weekly', $data);
		$this->load->view('template/footer', $data);
	}

	public function jaddone()
	{

		$data['title'] = 'Production Done';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		//$data['schedules'] = $this->db->get('jadwal')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('material/sidebar', $data);
		$this->load->view('material/topbar', $data);
		$this->load->view('material/schedule_done', $data);
		$this->load->view('template/footer', $data);
	}


	public function getDetailMesinProd()
	{
		$poskode 		= $this->input->post('kode');
		$data["kode"] 	= substr($poskode, 0, 3);
		$data["status"] = preg_replace("/[^a-zA-Z]/", "", trim($poskode));


		if ($data["status"] == "RUN") {

			$data["title"] 		= "DETAIL LINE CURRENT RUNNING MACHINE";
			$data["mesin"] 		= $this->matmod->getDataMesin($data["kode"]);
			$data['schedules'] 	= $this->matmod->getSchedule($data["kode"]);

			$this->load->view('material/detail', $data);
		} else {

			$data["title"] 		= "DETAIL LINE CURRENT STOP MACHINE";
			$data["problem"] 	= $this->matmod->getDataMesinProblem($data["kode"]);
			$data['schedules'] 	= $this->matmod->getSchedule($data["kode"]);


			//$this->load->view('technician/detail_stop', $data);

			if ($data["problem"]["kasus"] == "mi") {

				$this->load->view('material/detail_stop', $data);
			} elseif ($data["problem"]["kasus"] == "mw") {

				$this->load->view('material/detail_stop_mw', $data);
			} elseif ($data["problem"]["kasus"] == "qp") {

				$this->load->view('material/detail_stop_qp', $data);
			} elseif ($data["problem"]["kasus"] == "pm") {

				$this->load->view('material/detail_stop_pm', $data);
			} elseif ($data["problem"]["kasus"] == "md") {

				$this->load->view('material/detail_stop_md', $data);
			} elseif ($data["problem"]["kasus"] == "mp") {

				$this->load->view('material/detail_stop_mp', $data);
			}
		}
	}

	public function layout01()
	{

		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data["mesin"] = $this->matmod->getAllDataMesin();

		$this->load->view('material/layout01', $data);
	}

	public function getDetailMesinmaterial()
	{
		$poskode = $this->input->post('kode');
		$data["kode"] = substr($poskode, 0, 3);
		$data["status"] = preg_replace("/[^a-zA-Z]/", "", trim($poskode));


		if ($data["status"] == "RUN") {

			$data["title"] = "Detail Line Running";
			$data["mesin"] = $this->materialmod->getDataMesin($data["kode"]);
			$data['schedules'] = $this->materialmod->getSchedule($data["kode"]);

			$this->load->view('material/detail', $data);
		} else {

			$data["title"] = "Detail Line Stop";
			$data["problem"] = $this->materialmod->getDataMesinProblem($data["kode"]);
			$data['schedules'] = $this->materialmod->getSchedule($data["kode"]);

			$this->load->view('material/detail_stop', $data);
		}
	}

	public function problem()
	{

		$data['title'] 		= 'Weekly Production';
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['problems'] 	= $this->matmod->getMaterialProblem();


		$this->load->view('template/header', $data);
		$this->load->view('material/sidebar', $data);
		$this->load->view('material/topbar', $data);
		$this->load->view('material/problem', $data);
		$this->load->view('template/footer', $data);
	}

	public function updateMaterialProblem()
	{
		$kode 	 	= $this->input->post('kode');
		$nilai	 	= $this->input->post('nilai');



		$this->matmod->updateMaterial($kode, $nilai);

		$result['status'] = 'success';
		$result['redirect_url'] = base_url('matcont/problem');


		$string = json_encode($result);

		echo $string;
	}

	public function getViewDetailProblem($nomesin)
	{

		$data["title"] 		= "DETAIL LINE CURRENT STOP MACHINE";
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data["problem"] 	= $this->matmod->getDataMesinProblem($nomesin);
		$data['schedules'] 	= $this->matmod->getSchedule($nomesin);
		$data['kode']    	= $nomesin;


		if ($data["problem"]["kasus"] == "mi") {

			$this->load->view('material/view_detail_problem_mi', $data);
		} elseif ($data["problem"]["kasus"] == "md") {

			$this->load->view('material/view_detail_problem_md', $data);
		}
	}

	public function listMachine()
	{

		if ($this->input->get('searchTerm', TRUE)) {

			$data = $this->materialmod->getAllMachine_like($this->input->get('searchTerm', TRUE));
		} else {

			$data = $this->materialmod->getAllMachine();
		}

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($data));

		//echo json_encode($data);
	}

	public function daftarDrawingNumber()
	{

		if ($this->input->get('searchTerm', TRUE)) {

			$data = $this->materialmod->getAllDraw_like($this->input->get('searchTerm', TRUE));
		} else {

			$data = $this->materialmod->getAllDraw();
		}

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($data));

		//echo json_encode($data);
	}
}
