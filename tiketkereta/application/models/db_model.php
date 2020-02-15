<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {

	public function ceklogin($data)
	{
		$query = $this->db->get_where('admin', $data );
		return $query;
	}
	public function getCustomer()
	{
		$query = $this->db->get('pelanggan');
		return $query;
	}
	public function getPesanan()
	{
		$query = $this->db->get('pemesanan');
		return $query;
	}
	public function getAllPesanan()
	{
		$this->db->select("pemesanan.id_pesanan as nomortiket , pelanggan.nama as nama, keberangkatan.id_asal as asal, keberangkatan.id_tujuan as tujuan , pemesanan.tgl_pesan as tgl_pesan , keberangkatan.tgl_berangkat as berangkat, keberangkatan.tgl_tiba as tiba,keberangkatan.harga as harga,pemesanan.bayar as bayar ");
		
		$this->db->join("pelanggan", "pemesanan.id_pelanggan = pelanggan.id_pelanggan");
		$this->db->join("keberangkatan", "pemesanan.id_pelanggan = pelanggan.id_pelanggan");
		$data = $this->db->get('pemesanan');
		return $data->result();
	}
	public function getJadwal()
	{
		$query = $this->db->get('keberangkatan');
		return $query;
	}
	public function getStasiun()
	{
		$query = $this->db->get('stasiun');
		return $query;
	}
	public function getClass()
	{
		$query = $this->db->get('kelas');
		return $query;
	}
	public function getStasiunName($nama){
    $qry = $this->db->select('*')->from('stasiun')
                    ->where("nama LIKE '%$nama%'")
                    ->get()->result(); // select data like rearch value.
    return $qry;
	}
	
}