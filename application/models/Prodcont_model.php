<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class prodcont_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->mesin 	= 'mesin';
		$this->table 	= 'planning';
		$this->jadwal 	= 'jadwal';
		$this->drawing 	= 'drawing';
		
	}

	public function add($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data) {
		return $this->db->update($this->table, $data, $where);
	}

	public function delete($where) {
		return $this->db->delete($this->table, $where);
	}

	public function get($where = 0) {
		if($where) 
			$this->db->where($where);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function get_all($where = 0, $order_by_column = 0, $order_by = 0) {
		if($where) 
			$this->db->where($where);
		if($order_by_column and $order_by) 
			$this->db->order_by($order_by_column, $order_by);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_num_rows($where = 0) {
		if($where) 
			$this->db->where($where);
		$query = $this->db->get($this->table);		
		return $query->num_rows();
	}

	public function add_batch($data) {
		return $this->db->insert_batch($this->table, $data);
	}
	
	function import($arrData) {
      
        foreach ($arrData as $each_data){
                $data = array(
                    'no_mc' => $each_data['1'],
                    'draw_no' => $each_data['2'],
                    'tanggal' => $each_data['3'],
                    'jumlah' => $each_data['4'],
                );
                $this->db->insert($this->jadwal, $data);
            }

        if ($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	public function getAllDataMesin(){
		
		$this->db->select('*');
        $this->db->from($this->mesin);
      
        return  $this->db->get()->result_array();
		
		
		
	}
	
	function getDataMesin($kode){
     
	 
		$this->db->select('*');
        $this->db->from($this->mesin);
        $this->db->where('id',$kode);
        return  $this->db->get()->row_array();
	
    }
	
	function getDataMesinProblem($kode){
		
		$this->db->select('*');
		$this->db->from($this->mesin);
		$this->db->join('problem','problem.id_mc = mesin.id');
		$this->db->where('problem.id_mc',$kode);
		$this->db->where('problem.status','stop');
		return  $this->db->get()->row_array();
		
	}
	
	function getSchedule($kode){
		
		$this->db->select('*');
        $this->db->from($this->jadwal);
        $this->db->where('no_mc', $kode);

        return $this->db->get()->result();
		
	}
	
	function upDateMesin($draw_no,$kode,$status,$btnKls){
		 
		$data = ['draw_no' => $draw_no,'kelas' => $btnKls,'status' =>'stop','sub_status' => $status];
        $this->db->where('id', $kode);
        $this->db->update('mesin', $data);
		  
	 }
	 
	function insertProblemMc($kode,$problem,$drawing,$customer,$remark){
		 
		 $data = ['id_mc' => $kode,'kasus' => $problem,'draw_no' => $drawing,'customer' => $customer,'status' => 'stop','remark' => $remark];
		 $this->db->insert('problem', $data);
		 
	 }
	
	 function insertJadwal($kode,$draw,$qty){
		 
		 $data = ['no_mc' => $kode,'draw_no' => $draw,'jumlah' => $qty];
		 $this->db->insert($this->jadwal, $data);
		 
	 }
	 
	 function getAllNoMachine(){
		
		$this->db->select('*');
        $this->db->from($this->mesin);
		
        return  $this->db->get()->result();
	}
	
	public function getAllDraw()
    {
        $this->db->select('*');
        $this->db->from($this->drawing);
        $this->db->order_by('id', 'ASC');

        return $this->db->get()->result();
    }
	
	function get_all_planning() { //ambil data barang dari table barang yang akan di generate ke datatable
	  
        $this->datatables->select('id,no_mc,draw_no,jumlah,status');
        $this->datatables->from($this->jadwal);
        $this->datatables->add_column('view','<a href="javascript:void(0);" class="text-danger" data-kode="$1"><span class="glyphicon glyphicon-trash"></span></a>','id,no_mc,draw_no,jumlah,status');
		
        return $this->datatables->generate();
	 }
	 
	 function addJadwal($kodeMachine,$drawingNumber,$moldno,$quantity){
		 
		 $data = ['no_mc' => $kodeMachine,'draw_no' => $drawingNumber,'mold' => $moldno,'jumlah' => $quantity,'status' => 'planning'];
		 $this->db->insert($this->jadwal, $data);
		 return true;
		 
		 
	 }
	public function getAll() {
		return $this->db->get($this->jadwal);
	}
	public function getFields() {
		return $this->db->list_fields($this->jadwal);
	}

	public function getCol() {
		return $this->db->get($this->jadwal)->num_fields();
	}
	
	public function post_batch($data){
		
		$this->db->insert_batch($this->jadwal, $data);
	}
	
	 function updateWaktu($kodePlan,$tglwkt){
		 
		$data = ['planning' => $tglwkt];
        $this->db->where('id', $kodePlan);
        $this->db->update('jadwal', $data);
		 
		 
		 
	 }
	 
	 public function getProduksiProblem(){

		
		$query = $this->db->query('SELECT * FROM problem WHERE kasus NOT IN("mw","md","qp","pm") AND (man IS NULL)');
		
        return $query->result_array();
	}
	
	public function updateProduksi($kode,$nilai){
		 
		$data = ['man' => $nilai];
		
        $this->db->where('id', $kode);
        $this->db->update('problem', $data);
		  
	 }
	 
	
	public function runMesinProduction($kode){
		 
		$data = ['kelas' =>'btn-running-machine','status' => 'run','sub_status' => 'running-machine'];
        $this->db->where('id', $kode);
        $this->db->update('mesin', $data);
		  
	 }
	 
	public function doneProblem($kode){
		 
		$data = ['actual' => date('Y-m-d H:i:s'),'status' => 'done'];
        $this->db->where('id', $kode);
        $this->db->update('problem', $data);
		 
	 }
	
	
	
	
	
}