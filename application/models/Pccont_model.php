<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pccont_model extends CI_Model {

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
	
	public function delWeekly($where) {
		
		$this->db->where('id', $where);
		$this->db->delete($this->jadwal);
	
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
	 
	 function addJadwal($data){
		 
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
	
	
	public function getAllMachine_like($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('mesin');
        $this->db->like('id', $searchTerm);
        $this->db->order_by('id', 'ASC');

        return $this->db->get()->result();
    }
	
	public function getAllMachine()
    {
        $this->db->select('*');
        $this->db->from('mesin');
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
	
	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path']   = './uploads/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	 	 = '2048';
		$config['file_name']     = $filename;
		$config['overwrite']     = TRUE;
		
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file_import')){ // Lakukan upload dan Cek jika proses upload berhasil
		
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
			
		}else{
			
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	public function insert_multiple($data){
		
		$this->db->insert_batch($this->jadwal, $data);
		
	}
	
	
	
	
	
	
	
		
}