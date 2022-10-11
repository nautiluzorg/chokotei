<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* ZYA CBT
* Achmad Lutfi
* achmdlutfi@gmail.com
* achmadlutfi.wordpress.com
*/
class Welcome_model extends CI_Model{
	
	public $table = 'mesin';
	
	

	function __construct(){
        parent::__construct();
		
    }

    function save($data){
        $this->db->insert($this->table, $data);
    }
    
    function delete($kolom, $isi){
        $this->db->where($kolom, $isi)
                 ->delete($this->table);
    }
    
    function update($kolom, $isi, $data){
        $this->db->where($kolom, $isi)
                 ->update($this->table, $data);
    }
    
    function count_by_kolom($kolom, $isi){
        $this->db->select('COUNT(*) AS hasil')
                 ->where($kolom, $isi)
                 ->from($this->table);
        return $this->db->get();
    }
	
	function get_by_kolom($kolom, $isi){
        $this->db->select('user_id,user_grup_id,user_name,user_password,user_email,user_firstname,user_detail,user_regdate')
                 ->where($kolom, $isi)
                 ->from($this->table);
        return $this->db->get();
    }
	
	function get_by_kolom_limit($kolom, $isi, $limit){
        $this->db->select('user_id,user_grup_id,user_name,user_password,user_email,user_firstname,user_detail,user_regdate')
                 ->where($kolom, $isi)
                 ->from($this->table)
				 ->limit($limit);
        return $this->db->get();
    }

    function count_by_username_password($username, $password){
        $this->db->select('COUNT(*) AS hasil')
                 ->where('(user_name="'.$username.'" AND user_password="'.$password.'")')
                 ->from($this->table);
        return $this->db->get()->row()->hasil;  
    }
	
	function getAllDataMesin(){
		
		$this->db->select('*');
        $this->db->from($this->table);
      
        return  $this->db->get()->result_array();
	}

    function getDataMesin($kode){
     
	 
		$this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id',$kode);
        return  $this->db->get()->row_array();
	/*
		
		
	*/
    }
	
	function getDataMesinProblem($kode){
		
		$this->db->select('*'); // memilih semua field atau data
		$this->db->from('mesin'); // dari table (memilih table)
		$this->db->join('problem','problem.draw_no = mesin.draw_no'); //mengabungkan antara table A dan table B dan didalam table A terdapat id dari table B
		$this->db->where('mesin.id',$kode);
		return  $this->db->get()->row_array();
		
	}
	
	function get_data_drawing(){
		
        $this->datatables->select('id,draw_no,customer,posisi,remark');
        $this->datatables->from('drawing');
		$this->datatables->add_column('view','<a href="'.base_url('user/qrcode_employee_id').'/$1" target="_blank"><i class="fas fa-qrcode"></i></a>','id,draw_no,customer,posisi,remark');
       
		
        return $this->datatables->generate();
		
	}

      function get_all_mold() { //ambil data barang dari table barang yang akan di generate ke datatable
	  
        $this->datatables->select('id,draw_no,customer,bcode,cposisi,posisi,qtybox,boxtype,remark');
        $this->datatables->from('drawing');
        $this->datatables->add_column('view','<a href="javascript:void(0);" class="btn btn-link btn-xs" data-kode="$1">Del</a>','id,draw_no,customer,bcode,cposisi,posisi,qtybox,boxtype,remark');
		
        return $this->datatables->generate();
	 }
	 
	function get_all_planning() { //ambil data barang dari table barang yang akan di generate ke datatable
	  
        $this->datatables->select('id,no_mc,draw_no,jumlah,status');
        $this->datatables->from('jadwal');
        $this->datatables->add_column('view','<a href="javascript:void(0);" class="text-danger" data-kode="$1"><span class="glyphicon glyphicon-trash"></span></a>','id,no_mc,draw_no,jumlah,status');
		
        return $this->datatables->generate();
	 }
	 
	 
	 function upDateMesin($draw_no,$kode,$status,$btnKls){
		 
		$data = ['draw_no' => $draw_no,'kelas' => $btnKls,'status' =>'stop','sub_status' => $status];
        $this->db->where('id', $kode);
        $this->db->update('mesin', $data);
		  
	 }
	 
	 function updateWaktu($kodePlan,$tglwkt){
		 
		$data = ['tanggal' => $tglwkt];
        $this->db->where('id', $kodePlan);
        $this->db->update('jadwal', $data);
		 
		 
		 
	 }
	 
	 //UPDATE PROBLEM TABLE ******************
	 function updateMoldProblem($kode,$nilai){
		 
		$data = ['mold' => $nilai];
        $this->db->where('id', $kode);
        $this->db->update('problem', $data);
		  
	 }
	 
	  function updateSettingProblem($kode,$nilai){
		 
		$data = ['sett' => $nilai];
        $this->db->where('id', $kode);
        $this->db->update('problem', $data);
		  
	 }
	 
	function updateMaterialProblem($kode,$nilai){
		 
		$data = ['mat' => $nilai];
        $this->db->where('id', $kode);
        $this->db->update('problem', $data);
		  
	 }
	 
	function updateTestProblem($kode,$nilai){
		 
		$data = ['tes' => $nilai];
        $this->db->where('id', $kode);
        $this->db->update('problem', $data);
		  
	 }
	 
	function updateAppProblem($kode,$nilai){
		 
		$data = ['app' => $nilai];
        $this->db->where('id', $kode);
        $this->db->update('problem', $data);
		  
	 }
	 
	function updateManProblem($kode,$nilai){
		 
		$data = ['man' => $nilai];
        $this->db->where('id', $kode);
        $this->db->update('problem', $data);
		  
	 }
	 
	 
	  function updateStatusProblem($kode){
		 
		$data = ['status' => 'ready'];
        $this->db->where('id', $kode);
        $this->db->update('problem', $data);
		  
	 }
	 
	 
	 
	 
	 
	 function insertProblem($kode,$problem,$drawing,$customer,$estimate){
		 
		 $data = ['id_mc' => $kode,'kasus' => $problem,'draw_no' => $drawing,'customer' => $customer,'estimate' => $estimate,'status' => 'stop'];
		 $this->db->insert('problem', $data);
		 
	 }
  
	function getAllNoMachine(){
		$query = $this->db->query('SELECT * FROM mesin');
		
        return $query->result();
	}
	
	function getAllProblem(){
		
		$query = $this->db->query('SELECT * FROM problem');
		
        return $query->result();
	}
	
	function getProblemUnsolved(){
		
		$query = $this->db->query('SELECT * FROM problem WHERE status NOT IN ("done")');
		
		return $query->result();
	}
	
	
	
	function getTechnicianProblem(){

		$query = $this->db->query('SELECT * FROM problem WHERE mold IS NULL OR sett IS NULL');
		
        return $query->result();
	}
	
	function getMaterialProblem(){

		$query = $this->db->query('SELECT * FROM problem WHERE mat IS NULL');
		
        return $query->result();
	}
	
	function getQualityProblem(){

		$query = $this->db->query('SELECT * FROM problem WHERE tes IS NULL OR app IS NULL');
		
        return $query->result();
	}
	
	function getProduksiProblem(){

		$query = $this->db->query('SELECT * FROM problem WHERE man IS NULL');
		
        return $query->result();
	}
	
	public function getAllDraw()
    {
        $this->db->select('*');
        $this->db->from('drawing');
        $this->db->order_by('id', 'ASC');

        return $this->db->get()->result();
    }
	
	public function getAllDraw_like($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('drawing');
        $this->db->like('draw_no', $searchTerm);
        $this->db->order_by('draw_no', 'ASC');

        return $this->db->get()->result();
    }
	
	public function getAllMachine()
    {
        $this->db->select('*');
        $this->db->from('mesin');
        $this->db->order_by('id', 'ASC');

        return $this->db->get()->result();
    }
	
	public function getAllMachine_like($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('mesin');
        $this->db->like('id', $searchTerm);
        $this->db->order_by('id', 'ASC');

        return $this->db->get()->result();
    }
	
	public function getCustomer($kode)
	{
	
		$this->db->select('customer');
        $this->db->from('drawing');
        $this->db->where('draw_no', $kode);

        return $this->db->get()->row();
		
	}
	
	
	 function insertJadwal($kode,$draw,$qty,$waktu){
		 
		 $data = ['no_mc' => $kode,'draw_no' => $draw,'tanggal' => $waktu,'jumlah' => $qty];
		 $this->db->insert('jadwal', $data);
		 
	 }
	
	function getSchedule($kode){
		
		$this->db->select('*');
        $this->db->from('jadwal');
        $this->db->where('no_mc', $kode);

        return $this->db->get()->result();
		
	}
	
    //RUN LINE MACHINE****
	
	 function runMesin($kode){
		 
		$data = ['kelas' =>'btn-running-machine','status' => 'run','sub_status' => 'running-machine'];
        $this->db->where('id', $kode);
        $this->db->update('mesin', $data);
		  
	 }
	 
	 function doneProblem($kode){
		 
		$data = ['actual' => date('Y-m-d H:i:s'),'status' => 'done'];
        $this->db->where('id', $kode);
        $this->db->update('problem', $data);
		 
	 }
	 
	 function addJadwal($kodeMachine,$drawingNumber,$quantity){
		 
		 $data = ['no_mc' => $kodeMachine,'draw_no' => $drawingNumber,'jumlah' => $quantity,'status' => 'planning'];
		 $this->db->insert('jadwal', $data);
		 return true;
		 
		 
	 }
	  
  
}