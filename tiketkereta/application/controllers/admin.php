<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		if (isset($_SESSION['username'])) {
			$data['nama'] = $_SESSION['username'];
			$data['customer'] = $this->db_model->getCustomer();
			$data['pesanan'] = $this->db_model->getPesanan();
			$data['jadwal'] = $this->db_model->getJadwal();
			$data['stasiun'] = $this->db_model->getStasiun();
    		$this->load->view('view_admin',$data);
		}else{
			header('location:'.base_url().'admin/login');
		}
		
	}
	public function login()
	{
		if (isset($_SESSION['username'])) {
    		header('location:'.base_url().'admin');
		}else{
			$this->load->view('view_login');
		}
		
	}

	public function aksilogin()
	{
		$u= $_POST['username'];
		$p= $_POST['password'];
		$data= array(
			'username' => $u,
			'password' => $p 
		);
		$query= $this->db_model->ceklogin($data);
		if($query->num_rows() > 0){
			$qad= $query->row();
			$_SESSION['username'] = $qad->username;
			$_SESSION['pesan'] = 'Success';
			header('location:'.base_url().'admin');
		}else{
			$_SESSION['pesan'] = 'Username/password anda salah';
			header('location:'.base_url().'admin/login');
		}
	}
	public function logout()
	{
		session_destroy();
		header('location:'.base_url().'admin/login');
	}
	public function pesanan()
	{
		if (isset($_SESSION['username'])) {
    		$data['nama'] = $_SESSION['username'];
    		$data['judul']= "Pesanan";
    		$data['pesanan']= $this->db_model->getAllPesanan();
    		$this->load->view('view_pesanan',$data);
		}else{
			header('location:'.base_url().'admin/login');
		}
	}
	public function jadwal()
	{
		if (isset($_SESSION['username'])) {
    		header('location:'.base_url().'admin');
		}else{
			header('location:'.base_url().'admin/login');
		}
	}
	public function pelanggan()
	{
		if (isset($_SESSION['username'])) {
    		header('location:'.base_url().'admin');
		}else{
			header('location:'.base_url().'admin/login');
		}
	}
	public function stasiun()
	{
		if (isset($_SESSION['username'])) {
    		header('location:'.base_url().'admin');
		}else{
			header('location:'.base_url().'admin/login');
		}
		
	}
	public function pengaturan()
	{
		if (isset($_SESSION['username'])) {
    		header('location:'.base_url().'admin');
		}else{
			header('location:'.base_url().'admin/login');
		}
		
	}
}
