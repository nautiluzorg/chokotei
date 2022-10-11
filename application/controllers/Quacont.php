<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');



class Quacont extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
		$this->load->model('Quacont_model', 'quamod');
		$this->ip_address    	= $_SERVER['REMOTE_ADDR'];
		$this->datetime 	    = date("Y-m-d H:i:s");
		
	}
	
	public function index(){
		
		$data['title'] = 'User Profile';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('quality/sidebar',$data);
		$this->load->view('quality/topbar',$data);
		$this->load->view('quality/index',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function user(){
		
		$data['title'] = 'Users Data';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data['users'] = $this->db->get('user')->result_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('quality/sidebar',$data);
		$this->load->view('quality/topbar',$data);
		$this->load->view('quality/users',$data);
		$this->load->view('template/footer',$data);
	}
	public function drawing(){
		
		$data['title'] = 'Drawing Data';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data['draws'] = $this->db->get('drawing')->result_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('quality/sidebar',$data);
		$this->load->view('quality/topbar',$data);
		$this->load->view('quality/draw',$data);
		$this->load->view('template/footer',$data);
	}

	public function profile(){
		
		$data['title'] = 'User Profile';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('quality/sidebar',$data);
		$this->load->view('quality/topbar',$data);
		$this->load->view('quality/profile',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function jadwal(){
		
		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data['schedules'] = $this->db->get_where('jadwal', array('status' => 'planning'))->result_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('quality/sidebar',$data);
		$this->load->view('quality/topbar',$data);
		$this->load->view('quality/weekly',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function jaddone(){
		
		$data['title'] = 'Production Done';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		//$data['schedules'] = $this->db->get('jadwal')->result_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('quality/sidebar',$data);
		$this->load->view('quality/topbar',$data);
		$this->load->view('quality/schedule_done',$data);
		$this->load->view('template/footer',$data);
	}
	
	
	
	
	
	
	
	
	
	public function plant01(){
		
		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data['schedules'] = $this->db->get('jadwal')->result_array();
		
		$this->load->view('template/header',$data);
		$this->load->view('quality/sidebar',$data);
		$this->load->view('quality/topbar',$data);
		$this->load->view('quality/weekly',$data);
		$this->load->view('template/footer',$data);
	}
	public function layout01(){
		
		$data['title'] = 'Weekly Production';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')]) ->row_array();
		$data["mesin"] = $this->quamod->getAllDataMesin();
		
		$this->load->view('quality/layout01',$data);
		
	}
	
	public function problem()
	{

		$data['title'] 		= 'Weekly Production';
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['problems'] 	= $this->quamod->getQualityProblem();
		

		$this->load->view('template/header', $data);
		$this->load->view('quality/sidebar', $data);
		$this->load->view('quality/topbar', $data);
		$this->load->view('quality/problem', $data);
		$this->load->view('template/footer', $data);
	}
	
	public function updateTesProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $nilai	 	= $this->input->post('nilai');
 
		
		
		$this->quamod->updateTes($kode,$nilai);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('quacont/problem');
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	public function updateAppProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $nilai	 	= $this->input->post('nilai');
 
		
		
		$this->quamod->updateApp($kode,$nilai);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('quacont/problem');
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	public function getViewDetailProblem($nomesin){
		
			$data["title"] 		= "DETAIL LINE CURRENT STOP MACHINE";
			$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			
			$data["problem"] 	= $this->quamod->getDataMesinProblem($nomesin);
			$data['schedules'] 	= $this->quamod->getSchedule($nomesin);
			$data['kode']    	= $nomesin;

		
			if($data["problem"]["kasus"] == "mi"){
				
				$this->load->view('quality/view_detail_problem_mi', $data);
				
				
			}elseif($data["problem"]["kasus"] == "mw"){
				
				$this->load->view('quality/view_detail_problem_mw', $data);
				
				
			}elseif($data["problem"]["kasus"] == "qp"){
				
				
				$this->load->view('quality/view_detail_problem_qp', $data);
				
				
			}elseif($data["problem"]["kasus"] == "pm"){
		
				
				$this->load->view('quality/view_detail_problem_pm', $data);
				
				
			}
			
			
			
		
	}
	
	public function getDetailMesinProd()
	{
		$poskode 		= $this->input->post('kode');
		$data["kode"] 	= substr($poskode, 0, 3);
		$data["status"] = preg_replace("/[^a-zA-Z]/","", trim($poskode));


		if ($data["status"] == "RUN") {

			$data["title"] 		= "DETAIL LINE CURRENT RUNNING MACHINE";
			$data["mesin"] 		= $this->quamod->getDataMesin($data["kode"]);
			$data['schedules'] 	= $this->quamod->getSchedule($data["kode"]);

			$this->load->view('quality/detail', $data);
			
		} else {

			$data["title"] 		= "DETAIL LINE CURRENT STOP MACHINE";
			$data["problem"] 	= $this->quamod->getDataMesinProblem($data["kode"]);
			$data['schedules'] 	= $this->quamod->getSchedule($data["kode"]);
			

			//$this->load->view('technician/detail_stop', $data);
			
			if($data["problem"]["kasus"] == "mi"){
					
					$this->load->view('quality/detail_stop',$data);
					
			}elseif($data["problem"]["kasus"] == "mw"){
					
					$this->load->view('quality/detail_stop_mw',$data);
					
			}elseif($data["problem"]["kasus"] == "qp"){
					
					$this->load->view('quality/detail_stop_qp',$data);
					
			}elseif($data["problem"]["kasus"] == "pm"){
					
					$this->load->view('quality/detail_stop_pm',$data);
					
			}elseif($data["problem"]["kasus"] == "md"){
					
					$this->load->view('quality/detail_stop_md',$data);
					
			}elseif($data["problem"]["kasus"] == "mp"){
					
					$this->load->view('quality/detail_stop_mp',$data);
					
				}
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	public function getDetailMesinquality()
    {
        $poskode = $this->input->post('kode');
		$data["kode"] = substr($poskode,0,3);
		$data["status"] = preg_replace("/[^a-zA-Z]/", "", trim($poskode));
		
			
			if($data["status"] == "RUN"){
				
				$data["title"] = "Detail Line Running";
				$data["mesin"] = $this->qualitymod->getDataMesin($data["kode"]);
				$data['schedules'] = $this->qualitymod->getSchedule($data["kode"]);
				
				$this->load->view('quality/detail',$data);
				
			}else{
				
				$data["title"] = "Detail Line Stop";
				$data["problem"] = $this->qualitymod->getDataMesinProblem($data["kode"]);
				$data['schedules'] = $this->qualitymod->getSchedule($data["kode"]);
				
				$this->load->view('quality/detail_stop',$data);
			}
			
    }
	

	
	public function listMachine()
	{

		if ($this->input->get('searchTerm', TRUE)) {
			
			$data = $this->qualitymod->getAllMachine_like($this->input->get('searchTerm', TRUE));
			
		} else {
			
			$data = $this->qualitymod->getAllMachine();
			
		}

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($data));
		
		//echo json_encode($data);
	}
	
	public function daftarDrawingNumber()
	{

		if ($this->input->get('searchTerm', TRUE)) {
			
			$data = $this->qualitymod->getAllDraw_like($this->input->get('searchTerm', TRUE));
			
		} else {
			
			$data = $this->qualitymod->getAllDraw();
			
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
		
		$success = $this->qualitymod->addJadwal($data);
		if($success){
			
			redirect(base_url('qualitycont/jadwal'));
		}
		
	}
	
		

	
	
	
}