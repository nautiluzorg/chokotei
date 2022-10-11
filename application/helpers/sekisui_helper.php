<?php

//Get list of option for dropdown
function is_logged_in()
{

	$CI = &get_instance();

	if (!$CI->session->userdata('email_sess_pawyt')) {

		redirect('auth');
	} else {

		$role_id = $CI->session->userdata('role_id_sess_pawyt');
		$menu = $CI->uri->segment(1);

		$queryMenu = $CI->db->get_where('user_menu', ['menu' => $menu])->row_array();
		$menu_id = $queryMenu['id'];

		$userAccess = $CI->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

		if ($userAccess->num_rows() < 1) {

			redirect('auth/blocked');
		}
	}
}

function check_access($role_id, $menu_id)
{

	$CI = &get_instance();

	$CI->db->where('role_id', $role_id);
	$CI->db->where('menu_id', $menu_id);
	$result = $CI->db->get('user_access_menu');

	if ($result->num_rows() > 0) {

		return "checked = 'checked'";
	}
}


function getMenuName($kode)
{

	$CI = &get_instance();
	$query = $CI->db->select('menu')->from('user_menu')->where('id', $kode)->get();

	if ($query->num_rows() >= 1) {
		$menu = $query->row();
	}
	return $menu->menu;
}

function getDropdownList($table, $columns)
{
	$CI = &get_instance();
	$query = $CI->db->select($columns)->from($table)->get();

	if ($query->num_rows() >= 1) {
		$options1 = ['' => '- Pilih -'];
		$options2 = array_column($query->result_array(), $columns[1], $columns[0]);
		$options  = $options1 + $options2;
		return $options;
	}
	return $options = ['' => '- Pilih -'];
}


//Get list of option for dropdown with Where***
function getDropdownListWhere($table, $columns, $field, $where)
{
	$CI = &get_instance();
	$query = $CI->db->select($columns)->where($field, $where)->from($table)->get();

	if ($query->num_rows() >= 1) {
		$options1 = ['' => '- Pilih -'];
		$options2 = array_column($query->result_array(), $columns[1], $columns[0]);
		$options  = $options1 + $options2;
		return $options;
	}
	return $options = ['' => '- Pilih -'];
}

//Show from error validation message for "file" input.
function fileFormError($field, $prefix = '', $suffix = '')
{
	$CI = &get_instance();
	$error_field = $CI->form_validation->error_array();

	if (!empty($error_field[$field])) {
		return $prefix . $error_field[$field] . $suffix;
	}
	return '';
}

function rupiah($nominal)
{
	return number_format($nominal, 0, ",", ".");
}
function dolar($nominal)
{
	return number_format($nominal);
}
function dolar2($nominal)
{
	return number_format($nominal, 2);
}

function IndonesiaTgl($tanggal)
{

	$namaBln = array(
		"01" => "Januari", "02" => "Februari", "03" => "March", "04" => "April", "05" => "May", "06" => "June",
		"07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "November", "12" => "December"
	);

	$tgl = substr($tanggal, 8, 2);
	$bln = substr($tanggal, 5, 2);
	$thn = substr($tanggal, 0, 4);
	$tanggal = "$tgl " . $namaBln[$bln] . " $thn";

	return $tanggal;
}

function getSupplier($kode)
{
	$CI = &get_instance();
	$query = $CI->db->select('nama_supplier')->from('supplier')->where('kode_supplier', $kode)->get();

	if ($query->num_rows() >= 1) {
		$supplier = $query->row();
	}
	return $supplier->nama_supplier;
}

function getAddressSupplier($kode)
{
	$CI = &get_instance();
	$query = $CI->db->select('address')->from('supplier')->where('kode_supplier', $kode)->get();

	if ($query->num_rows() >= 1) {
		$supplier = $query->row();
	}
	return $supplier->address;
}
function getFaxSupplier($kode)
{
	$CI = &get_instance();
	$query = $CI->db->select('fax')->from('supplier')->where('kode_supplier', $kode)->get();

	if ($query->num_rows() >= 1) {
		$supplier = $query->row();
	}
	return $supplier->fax;
}

function getPicSupplier($kode)
{
	$CI = &get_instance();
	$query = $CI->db->select('pic')->from('supplier')->where('kode_supplier', $kode)->get();

	if ($query->num_rows() >= 1) {
		$supplier = $query->row();
	}
	return $supplier->pic;
}

function getPhoneSupplier($kode)
{
	$CI = &get_instance();
	$query = $CI->db->select('phone')->from('supplier')->where('kode_supplier', $kode)->get();

	if ($query->num_rows() >= 1) {
		$supplier = $query->row();
	}
	return $supplier->phone;
}

function getCountrySupplier($kode)
{
	$CI = &get_instance();
	$query = $CI->db->select('country')->from('supplier')->where('kode_supplier', $kode)->get();

	if ($query->num_rows() >= 1) {
		$supplier = $query->row();
	}
	return $supplier->country;
}

function getEmailSupplier($kode)
{
	$CI = &get_instance();
	$query = $CI->db->select('email')->from('supplier')->where('kode_supplier', $kode)->get();

	if ($query->num_rows() >= 1) {
		$supplier = $query->row();
	}
	return $supplier->email;
}


function format_angka($angka)
{

	$angka_format = number_format($angka, 0, ",", ".");

	return $angka_format;
}

function format_tanggal_waktu($waktu)
{
	$namabulan = array(
		1 => "January", 2 => "Februari", 3 => "Maret",
		4 => "April", 5 => "Mei", 6 => "Juni", 7 => "Juli", 8 => "Agustus",
		9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember"
	);

	$explode = explode(" ", $waktu);

	$d = list($thn, $bln, $tgl) = explode('-', $explode[0]);
	$indate = $tgl . ' ' . $namabulan[(int)$d[1]] . ' ' . $thn . ' ' . $explode[1];

	return $indate;
}
function potong_text($text)
{

	$text_potongan = substr($text, 0, 77);
	return $text_potongan . "...";
}
function potong_text2($text)
{

	$text_potongan = substr($text, 0, 45);
	return $text_potongan . "...";
}

function getKategori($kode)
{
	$CI = &get_instance();
	$query = $CI->db->select('nama_kategori')->from('tbl_kategori')->where('id_kategori', $kode)->get();

	if ($query->num_rows() >= 1) {
		$supplier = $query->row();
	} else if ($query->num_rows() == 0) {

		$supplier = "Bandar sangkar";
	}
	return $supplier->nama_kategori;
}


function getCustomer($kode)
{
	$CI = &get_instance();
	$query = $CI->db->select('customer')->from('drawing')->where('draw_no', $kode)->get();

	if ($query->num_rows() >= 1) {
		$hasil = $query->row();
	}
	return $hasil->customer;
}


function printProblem($kode)
{

	if ($kode == "mi") {

		$kasus = "mold installation";
	} elseif ($kode == "mw") {

		$kasus = "mold washing";
	} elseif ($kode == "qp") {

		$kasus = "quality problem";
	} elseif ($kode == "pm") {

		$kasus = "machine problem";
	} elseif ($kode == "md") {

		$kasus = "material delay";
	} else {

		$kasus = "man power";
	}

	return $kasus;
}

function getRoleName($kode)
{
	$CI = &get_instance();
	$query = $CI->db->select('role')->from('user_role')->where('id', $kode)->get();

	if ($query->num_rows() >= 1) {
		$menu = $query->row();
	}
	return $menu->role;
}

function statusUser($kode)
{

	if ($kode == 1) {

		$status = "Aktif";
	} else {

		$status = "Non Aktif";
	}

	return $status;
}

function getNama($kode)
{
	$CI = &get_instance();
	$query = $CI->db->select('name')->from('user')->where('email', $kode)->get();

	if ($query->num_rows() >= 1) {
		$supplier = $query->row();
	}
	return $supplier->name;
}
