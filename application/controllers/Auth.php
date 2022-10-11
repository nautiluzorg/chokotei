<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct(){
		
		parent::__construct();
		$this->load->library('datatables');
		//$this->load->model('berita_model','authmod');
		$this->load->model('Auth_model','authmod');
	}
	 

	public function index()
	{
		//Jika session emailnya ada.
		if($this->session->userdata('email')){
			
			if($this->session->userdata('role_id') == 1){
				
					redirect('admin');
					
			}else if($this->session->userdata('role_id') == 2){
				
					redirect('pccont');
				
			}else if($this->session->userdata('role_id') == 3){
				
					redirect('prodcont');
				
			}else if($this->session->userdata('role_id') == 4){
				
					redirect('techcont');
				
			}else if($this->session->userdata('role_id') == 5){
				
					redirect('matcont');
				
			}else{
				
					redirect('quacont');
			}
			
		}
		
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');
		
		if($this->form_validation->run() == FALSE){
			
			$data['title'] = 'Login';
			
			$this->load->view('auth/login',$data);
			
			
		}else{
			
			$this->_login();
		}
		
	}
	
	private function _login()
	{
		
		$email 		= $this->input->post('email',true);
		$password 	= $this->input->post('password',true);
		
		$user = $this->db->get_where('user',['email' => $email])->row_array();
		
		if($user){
			
			//Jika usernya aktif
			if($user['is_active'] == 1){
				//cek password
				
				if(password_verify($password,$user['password'])){
					
					$data = [
					
						'email' => $user['email'],
						'role_id' => $user['role_id']
			
					];
					
					$this->session->set_userdata($data);
					
					if($user['role_id'] == 1){
						
						redirect('admin');
						
					}else if($user['role_id'] == 2){
						
						redirect('pccont');
						
					}else if($user['role_id'] == 3){
						
						redirect('prodcont');
						
					}else if($user['role_id'] == 4){
						
						redirect('techcont');
						
					}else if($user['role_id'] == 5){
						
						redirect('matcont');
						
					}else{
						
						redirect('quacont');
					}
					
						
				}else{
					
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong Password!</div>');
					redirect('auth');
					
				}
				
				
			}else{
				
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email has not been activated!</div>');
				redirect('auth');
					
			}
			
		}else{
			
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email Not registered!</div>');
			redirect('auth');
		}
		
	}
	
	public function plant01(){
		
		$data["mesin"] = $this->authmod->getAllDataMesin();
		
		$this->load->view('auth/layout01',$data);
		
	}
	
	public function getDetailMesinProd($poskode)
	{
		//$poskode 		= $this->input->post('kode');
		$data["kode"] 	= substr($poskode, 0, 3);
		$data["status"] = preg_replace("/[^a-zA-Z]/","", trim($poskode));


		if ($data["status"] == "RUN") {

			$data["title"] 		= "DETAIL LINE CURRENT RUNNING MACHINE";
			$data["mesin"] 		= $this->authmod->getDataMesin($data["kode"]);
			$data['schedules'] 	= $this->authmod->getSchedule($data["kode"]);

			$this->load->view('auth/detail', $data);
			
		} else {

			$data["title"] 		= "DETAIL LINE CURRENT STOP MACHINE";
			$data["problem"] 	= $this->authmod->getDataMesinProblem($data["kode"]);
			$data['schedules'] 	= $this->authmod->getSchedule($data["kode"]);
			
			if($data["problem"]["kasus"] == "mi"){
					
					$this->load->view('auth/detail_stop',$data);
					
			}elseif($data["problem"]["kasus"] == "mw"){
					
					$this->load->view('auth/detail_stop_mw',$data);
					
			}elseif($data["problem"]["kasus"] == "qp"){
					
					$this->load->view('auth/detail_stop_qp',$data);
					
			}elseif($data["problem"]["kasus"] == "pm"){
					
					$this->load->view('auth/detail_stop_pm',$data);
					
			}elseif($data["problem"]["kasus"] == "md"){
					
					$this->load->view('auth/detail_stop_md',$data);
					
			}elseif($data["problem"]["kasus"] == "mp"){
					
					$this->load->view('auth/detail_stop_mp',$data);
					
			}
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function logout(){
		
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You have been log out!</div>');
		redirect('auth');
		
	}
	
	

	
	
	
	
	
	
	
	
	

}
