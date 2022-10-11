<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct(){
		
		parent::__construct();
		$this->load->library('datatables');
		//$this->load->model('berita_model','authmod');
		$this->load->model('Welcome_model','welmod');
	}
	 
	public function index()
	{
		$data["mesin"] = $this->welmod->getAllDataMesin();
		$this->load->view('index',$data);
		//$this->load->view('index');
	}
	public function index2()
	{
		$this->load->view('index2');
	}
	public function layout(){
		
		$data["mesin"] = $this->welmod->getAllDataMesin();
		$this->load->view('layout/layout',$data);
		
		
	}
	
	
	public function getDetailMesin()
    {
        $poskode = $this->input->post('kode');
		$data["kode"] = substr($poskode,0,3);
		$data["status"] = preg_replace("/[^a-zA-Z]/", "", $poskode);
		
			
			if($data["status"] == "RUN"){
				
				$data["title"] = "Detail Line Running";
				$data["mesin"] = $this->welmod->getDataMesin($data["kode"]);
				$data['schedules'] = $this->welmod->getSchedule($data["kode"]);
				
				$this->load->view('detail',$data);
				
			}else{
				
				$data["title"] = "Detail Line Stop";
				$data["problem"] = $this->welmod->getDataMesinProblem($data["kode"]);
				$data['schedules'] = $this->welmod->getSchedule($data["kode"]);
				
				$this->load->view('detail_stop',$data);
			}
			
    }
	
	public function getDetailMesinPc()
    {
        $poskode = $this->input->post('kode');
		$data["kode"] = substr($poskode,0,3);
		$data["status"] = preg_replace("/[^a-zA-Z]/", "", $poskode);
		
			
			if($data["status"] == "RUN"){
				
				$data["title"] = "Detail Line Running";
				$data["mesin"] = $this->welmod->getDataMesin($data["kode"]);
				$data['schedules'] = $this->welmod->getSchedule($data["kode"]);
				
				$this->load->view('pc/detail',$data);
				
			}else{
				
				$data["title"] = "Detail Line Stop";
				$data["problem"] = $this->welmod->getDataMesinProblem($data["kode"]);
				$data['schedules'] = $this->welmod->getSchedule($data["kode"]);
				
				$this->load->view('pc/detail_stop',$data);
			}
			
    }
	
	
	public function get_json_planning() { //data data produk by JSON object
	

		header('Content-Type: application/json');
		echo $this->welmod->get_all_planning();
				
	}
	
	
	
	
	public function get_report_json() { //data data produk by JSON object
	

		header('Content-Type: application/json');
		echo $this->welmod->get_all_mold();
				
	}
	
	public function drawing(){
		
		$data['title'] = "Data Drawing";
		
		$this->load->view('drawing',$data);
		
	}
	
	public function schedule(){
		
		$data['title'] = "Schedule Production";
		
		$data['nomor'] = $this->welmod->getAllNoMachine();
		$data['draw'] = $this->welmod->getAllDraw();
	
		
		$this->load->view('schedule',$data);
	}
	
	public function insertProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $problem 	= $this->input->post('problem');
        $drawing 	= $this->input->post('drawing');
        $estimate 	= $this->input->post('estimate');
        $kelas 		= $this->input->post('kelas');
        $sub_status = $this->input->post('sub_status');
		$customer   = getCustomer($drawing);
		
		
		$this->welmod->upDateMesin($drawing,$kode,$sub_status,$kelas);
		$this->welmod->insertProblem($kode,$problem,$drawing,$customer,$estimate);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url();
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	public function updateMoldProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $nilai	 	= $this->input->post('nilai');
 
		
		
		$this->welmod->updateMoldProblem($kode,$nilai);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('welcome/rtechnician');
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	public function updateSettingProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $nilai	 	= $this->input->post('nilai');
 
		
		
		$this->welmod->updateSettingProblem($kode,$nilai);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('welcome/rtechnician');
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	public function updateMaterialProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $nilai	 	= $this->input->post('nilai');
 
		
		
		$this->welmod->updateMaterialProblem($kode,$nilai);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('welcome/rmaterial');
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	public function updateTestProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $nilai	 	= $this->input->post('nilai');
 
		
		
		$this->welmod->updateTestProblem($kode,$nilai);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('welcome/rquality');
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	public function updateAppProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $nilai	 	= $this->input->post('nilai');
 
		
		
		$this->welmod->updateAppProblem($kode,$nilai);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('welcome/rquality');
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	public function updateManProblem()
    {
        $kode 	 	= $this->input->post('kode');
        $nilai	 	= $this->input->post('nilai');
 
		
		
		$this->welmod->updateManProblem($kode,$nilai);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url('welcome/rproduksi');
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	public function listMachine()
	{

		if ($this->input->get('searchTerm', TRUE)) {
			
			$data = $this->welmod->getAllMachine_like($this->input->get('searchTerm', TRUE));
			
		} else {
			
			$data = $this->welmod->getAllMachine();
			
		}

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($data));
		
		//echo json_encode($data);
	}
	
	
	
	
	
	
	
	
	public function daftarDrawingNumber()
	{

		if ($this->input->get('searchTerm', TRUE)) {
			
			$data = $this->welmod->getAllDraw_like($this->input->get('searchTerm', TRUE));
			
		} else {
			
			$data = $this->welmod->getAllDraw();
			
		}

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($data));
		
		//echo json_encode($data);
	}
	
	public function getCustomer(){
		
		//$kode = 'K2A-0020-06';
		$kode 				= $this->input->post('kode');
		$data["customer"] 	= $this->welmod->getCustomer($kode);
		
		echo json_encode($data["customer"]);
		
	}
	
	public function brmachine(){
		
		$data['title'] = "Report Detail Mold Installation";
		//$data['nomor'] = $this->welmod->getAllNoMachine();
		//$data['nomor'] = $this->welmod->getAllProblem();
		$data['nomor'] = $this->welmod->getProblemUnsolved();
		
		$this->load->view('brmachine',$data);
		
		
	}
	public function rtechnician(){
		
		$data['title'] = "Report Detail Mold";
		//$data['nomor'] = $this->welmod->getAllProblem();
		$data['nomor'] = $this->welmod->getTechnicianProblem();
		
		$this->load->view('technician/report',$data);
		
		
	}
	
	public function rmaterial(){
		
		$data['title'] = "Report Detail Mold";
		$data['nomor'] = $this->welmod->getMaterialProblem();
		
		$this->load->view('material/report',$data);
	}
	
	public function rquality(){
		
		$data['title'] = "Report Detail Mold";
		$data['nomor'] = $this->welmod->getQualityProblem();
		
		$this->load->view('quality/report',$data);
	}
	public function rproduksi(){
		
		$data['title'] = "Report Detail Mold";
		$data['nomor'] = $this->welmod->getProduksiProblem();
		
		$this->load->view('produksi/report',$data);
	}
	
	public function brstatus(){
		
		$data['title'] = "Report Breakdown Per Status";
		
		$this->load->view('brstatus',$data);
		
		
	}
	
	public function addProblem()
    {
        $poskode 		= $this->input->post('kode');
        $kodemachine    = $this->input->post('nomachine');
        $drawing	    = $this->input->post('drawing');
		
	
			if($poskode == "mi"){
				
				$data['title'] 			= "mold installation";
				$data['problem'] 		= $poskode;
				$data['nomachine'] 		= $kodemachine;
				$data['kelas'] 			= "btn-mold-installation";
				$data['status'] 		= "stop";
        
				$this->load->view('mold_installation',$data);
				
			}elseif($poskode == "mw"){
				
				$data['drawing'] 		= $drawing;
				$data['title'] 			= "mold washing";
				$data['problem'] 		= $poskode;
				$data['nomachine'] 		= $kodemachine;
				$data['kelas'] 			= "btn-mold-washing";
				$data['status'] 		= "stop";
        
				$this->load->view('mold_washing',$data);
				
			}elseif($poskode == "qp"){
				
				$data['drawing'] 		= $drawing;
				$data['title'] 			= "quality problem";
				$data['problem'] 		= $poskode;
				$data['nomachine'] 		= $kodemachine;
				$data['kelas'] 			= "btn-quality-problem";
				$data['status'] 		= "stop";
        
				$this->load->view('quality_problem',$data);
				
			}elseif($poskode == "pm"){
				
				$data['drawing'] 		= $drawing;
				$data['title'] 			= "machine problem";
				$data['problem'] 		= $poskode;
				$data['nomachine'] 		= $kodemachine;
				$data['kelas'] 			= "btn-machine-problem";
				$data['status'] 		= "stop";
        
				$this->load->view('machine_problem',$data);
				
			}elseif($poskode == "md"){
				
				$data['drawing'] 		= $drawing;
				$data['title'] 			= "material delay";
				$data['problem'] 		= $poskode;
				$data['nomachine'] 		= $kodemachine;
				$data['kelas'] 			= "btn-material-delay";
				$data['status'] 		= "stop";
        
				$this->load->view('material_delay',$data);
				
			}else{
				
				$data['drawing'] 		= $drawing;
				$data['title'] 			= "man power";
				$data['problem'] 		= $poskode;
				$data['nomachine'] 		= $kodemachine;
				$data['kelas'] 			= "btn-man-power";
				$data['status'] 		= "stop";
        
				$this->load->view('man_power',$data);
				
			}
			
    }
	
	public function tambahJadwal()
    {
        $data["kode"] 	= $this->input->post('kode');
        $data["status"] = $this->input->post('status');
		$data["title"] 	= "Add Schedule Machine ".$data["kode"];
	
		$this->load->view('add_schedule',$data);
				
			
			
    }
	public function addSchedule(){
		
		$kode 			= $this->input->post('kode');
		$status 		= $this->input->post('status');
        $draw    		= $this->input->post('draw');
        $qty	    	= $this->input->post('qty');
        $tglwkt	    	= $this->input->post('tglwkt');
		
		
			
			if($status == "RUN"){
				
				$data["title"] = "Detail Line Running";
				$data["kode"] = $kode;
				$this->welmod->insertJadwal($kode,$draw,$qty,$tglwkt);
				$data["mesin"] = $this->welmod->getDataMesin($kode);
				$data['schedules'] = $this->welmod->getSchedule($data["kode"]);
				
				
				$this->load->view('detail',$data);
				
			}else{
				
				$data["title"] = "Detail Line Stop";
				$data["kode"] = $kode;
				$this->welmod->insertJadwal($kode,$draw,$qty,$tglwkt);
				$data["problem"] = $this->welmod->getDataMesinProblem($data["kode"]);
				$data['schedule'] = $this->welmod->getSchedule($data["kode"]);
				
				
				$this->load->view('detail_stop',$data);
			}
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
				$this->welmod->updateWaktu($kodePlan,$tglwkt);
				$data["mesin"] 	= $this->welmod->getDataMesin($kodeMesin);
				$data['schedules'] = $this->welmod->getSchedule($data["kode"]);
				
				
				$this->load->view('detail',$data);
				
			}else{
				
				$data["title"] = "Detail Line Stop";
				$data["kode"] = $kodeMesin;
				$this->welmod->updateWaktu($kodePlan,$tglwkt);
				$data["problem"] = $this->welmod->getDataMesinProblem($kodeMesin);
				$data['schedules'] = $this->welmod->getSchedule($data["kode"]);
				
				
				$this->load->view('detail_stop',$data);
			}
	}
	
	
	
	
	
	
	
	public function updateStatusProblem(){
		
		$kode = $this->input->post('kode');
		
		$this->welmod->updateStatusProblem($kode);
		
		}
	
	
	
	//AREA PRODUKSI**********
	public function runMachine()
    {
        $kode 	 		= $this->input->post('kode');
		$kodeProblem	= $this->input->post('kodeproblem');
		
		
		
		$this->welmod->runMesin($kode);
		$this->welmod->doneProblem($kodeProblem);
		
		$result['status'] = 'success';
		$result['redirect_url'] = base_url();
		
		
		$string = json_encode($result);
		
		echo $string;
		
		
    }
	
	
	public function addPlanning(){
		
		$kodeMachine 			= $this->input->post('no-machine');
		$drawingNumber 			= $this->input->post('drawing-no');
        $quantity		  		= $this->input->post('quantity');
		
		$success = $this->welmod->addJadwal($kodeMachine,$drawingNumber,$quantity);
		if($success){
			
			redirect(base_url('welcome/schedule'));
		}
		
	}
	
	public function add_time(){
		
		$data["title"] = 'Add Time Schedule';
		$this->load->view('produksi/add_time',$data);
	}

}
