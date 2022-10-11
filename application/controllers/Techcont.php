<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');



class Techcont extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
		$this->load->model('Techcont_model', 'techmod');
		$this->ip_address    	= $_SERVER['REMOTE_ADDR'];
		$this->datetime 	    = date("Y-m-d H:i:s");
		
	}
	
	public function index(){
		
		$data['title'] = 'User Profile';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('technician/sidebar',$data);
		$this->load->view('technician/topbar',$data);
		$this->load->view('technician/index',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function user(){
		
		$data['title'] = 'Users Data';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data['users'] = $this->db->get('user')->result_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('technician/sidebar',$data);
		$this->load->view('technician/topbar',$data);
		$this->load->view('technician/users',$data);
		$this->load->view('template/footer',$data);
	}
	public function drawing(){
		
		$data['title'] = 'Drawing Data';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data['draws'] = $this->db->get('drawing')->result_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('technician/sidebar',$data);
		$this->load->view('technician/topbar',$data);
		$this->load->view('technician/draw',$data);
		$this->load->view('template/footer',$data);
	}

	public function profile(){
		
		$data['title'] = 'User Profile';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('technician/sidebar',$data);
		$this->load->view('technician/topbar',$data);
		$this->load->view('technician/profile',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function jadwal(){
		
		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data['schedules'] = $this->db->get_where('jadwal', array('status' => 'planning'))->result_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('technician/sidebar',$data);
		$this->load->view('technician/topbar',$data);
		$this->load->view('technician/weekly',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function jaddone(){
		
		$data['title'] = 'Production Done';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		//$data['schedules'] = $this->db->get('jadwal')->result_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('technician/sidebar',$data);
		$this->load->view('technician/topbar',$data);
		$this->load->view('technician/schedule_done',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function layout01(){
		
		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data["mesin"] = $this->techmod->getAllDataMesin();
		
		$this->load->view('technician/layout01',$data);
		
	}
	
	public function getDetailMesinProd()
	{
		$poskode 		= $this->input->post('kode');
		$data["kode"] 	= substr($poskode, 0, 3);
		$data["status"] = preg_replace("/[^a-zA-Z]/","", trim($poskode));


		if ($data["status"] == "RUN") {

			$data["title"] 		= "DETAIL LINE CURRENT RUNNING MACHINE";
			$data["mesin"] 		= $this->techmod->getDataMesin($data["kode"]);
			$data['schedules'] 	= $this->techmod->getSchedule($data["kode"]);

			$this->load->view('technician/detail', $data);
			
		} else {

			$data["title"] 		= "DETAIL LINE CURRENT STOP MACHINE";
			$data["problem"] 	= $this->techmod->getDataMesinProblem($data["kode"]);
			$data['schedules'] 	= $this->techmod->getSchedule($data["kode"]);
			

			//$this->load->view('technician/detail_stop', $data);
			
			if($data["problem"]["kasus"] == "mi"){
					
					$this->load->view('technician/detail_stop',$data);
					
			}elseif($data["problem"]["kasus"] == "mw"){
					
					$this->load->view('technician/detail_stop_mw',$data);
					
			}elseif($data["problem"]["kasus"] == "qp"){
					
					$this->load->view('technician/detail_stop_qp',$data);
					
			}elseif($data["problem"]["kasus"] == "pm"){
					
					$this->load->view('technician/detail_stop_pm',$data);
					
			}elseif($data["problem"]["kasus"] == "md"){
					
					$this->load->view('technician/detail_stop_md',$data);
					
			}elseif($data["problem"]["kasus"] == "mp"){
					
					$this->load->view('technician/detail_stop_mp',$data);
					
				}
		}
	}
	
	public function problem()
	{

		$data['title'] 		= 'Weekly Production';
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['problems'] 	= $this->techmod->getTechnicianProblem();
		

		$this->load->view('template/header', $data);
		$this->load->view('technician/sidebar', $data);
		$this->load->view('technician/topbar', $data);
		$this->load->view('technician/problem', $data);
		$this->load->view('template/footer', $data);
	}
	
	
	public function getViewDetailProblem($nomesin){
		
			$data["title"] 		= "DETAIL LINE CURRENT STOP MACHINE";
			$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			
			$data["problem"] 	= $this->techmod->getDataMesinProblem($nomesin);
			$data['schedules'] 	= $this->techmod->getSchedule($nomesin);
			$data['kode']    	= $nomesin;

		
			if($data["problem"]["kasus"] == "mi"){
				
				$this->load->view('technician/view_detail_problem_mi', $data);
				
				
			}elseif($data["problem"]["kasus"] == "mw"){
				
				$this->load->view('technician/view_detail_problem_mw', $data);
				
				
			}elseif($data["problem"]["kasus"] == "qp"){
				
				
				$this->load->view('technician/view_detail_problem_qp', $data);
				
				
			}elseif($data["problem"]["kasus"] == "pm"){
		
				
				$this->load->view('technician/view_detail_problem_pm', $data);
				
				
			}
			
			
			
		
	}
	
	
	
	
	
	public function updateMoldProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $nilai	 	= $this->input->post('nilai');
 
		
		
		$this->techmod->updateMoldProblem($kode,$nilai);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('techcont/problem');
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	public function updateSettingProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $nilai	 	= $this->input->post('nilai');
 
		
		
		$this->techmod->updateSettingProblem($kode,$nilai);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('techcont/problem');
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function plant01(){
		
		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data['schedules'] = $this->db->get('jadwal')->result_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('technician/sidebar',$data);
		$this->load->view('technician/topbar',$data);
		$this->load->view('technician/weekly',$data);
		$this->load->view('template/footer',$data);
	}
	public function layout1(){
		
		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data["mesin"] = $this->technicianmod->getAllDataMesin();
		
		$this->load->view('technician/lay_plant01',$data);
		
	}
	
	public function getDetailMesintechnician()
    {
        $poskode = $this->input->post('kode');
		$data["kode"] = substr($poskode,0,3);
		$data["status"] = preg_replace("/[^a-zA-Z]/", "", trim($poskode));
		
			
			if($data["status"] == "RUN"){
				
				$data["title"] = "Detail Line Running";
				$data["mesin"] = $this->technicianmod->getDataMesin($data["kode"]);
				$data['schedules'] = $this->technicianmod->getSchedule($data["kode"]);
				
				$this->load->view('technician/detail',$data);
				
			}else{
				
				$data["title"] = "Detail Line Stop";
				$data["problem"] = $this->technicianmod->getDataMesinProblem($data["kode"]);
				$data['schedules'] = $this->technicianmod->getSchedule($data["kode"]);
				
				$this->load->view('technician/detail_stop',$data);
			}
			
    }
	
	public function add_weekly(){
		
		$data['title'] 	= 'Add Weekly';
		$data['user'] 	= $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data['nomor'] 	= $this->technicianmod->getAllNoMachine();
		$data['draw'] 	= $this->technicianmod->getAllDraw();
		
		
		$this->load->view('template/header',$data);
		$this->load->view('technician/sidebar',$data);
		$this->load->view('technician/topbar',$data);
		$this->load->view('technician/add_weekly',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function listMachine()
	{

		if ($this->input->get('searchTerm', TRUE)) {
			
			$data = $this->technicianmod->getAllMachine_like($this->input->get('searchTerm', TRUE));
			
		} else {
			
			$data = $this->technicianmod->getAllMachine();
			
		}

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($data));
		
		//echo json_encode($data);
	}
	
	public function daftarDrawingNumber()
	{

		if ($this->input->get('searchTerm', TRUE)) {
			
			$data = $this->technicianmod->getAllDraw_like($this->input->get('searchTerm', TRUE));
			
		} else {
			
			$data = $this->technicianmod->getAllDraw();
			
		}

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($data));
		
		//echo json_encode($data);
	}
	
	public function addPlanning(){
		
		$data['title'] 	= 'Add Weekly';
		$data['user'] 	= $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		
		$kodeMachine 			= $this->input->post('machine-no');
		$drawingNumber 			= $this->input->post('drawing-no');
		$moldno		 			= $this->input->post('mold-no');
        $quantity		  		= $this->input->post('quantity');
        $tanggal		  		= $this->input->post('tanggal');
		
		$data = [
					'no_mc' => $kodeMachine,'draw_no' => $drawingNumber,'mold' => $moldno,'jumlah' => $quantity,
					'status' => 'planning','tanggal' => $tanggal,'created_by' => $data['user']['email']
		
		];
		
		$success = $this->technicianmod->addJadwal($data);
		if($success){
			
			redirect(base_url('techniciancont/jadwal'));
		}
		
	}
	
		

	
	
	
}
