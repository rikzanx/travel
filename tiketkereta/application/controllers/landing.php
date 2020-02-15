<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	
	public function index()
	{
		$data['kelas']=$this->db_model->getClass();
		$this->load->view('view_landing',$data);
	}
	public function cari()
	{
	    $search_name=$this->input->post("search_name"); // first get search character
	    $tipe=$this->input->post("tipe"); 
	    $data=$this->db_model->getStasiunName($search_name); // SearchModel is the model class name
	    $view = '';
	    foreach ($data as $sval) {
	    	if($tipe=="asal")
	    	{
	    		$view = $view .'<li><a onclick="addText(\''.$sval->id_stasiun.'\',\'#id_asal\',\''.$sval->nama.'\',\'.hasil-asal\',\'#inputAsal\')">'.$sval->nama.' - '.$sval->singkatan.'</a></li>';	
	    	}else{
	    		$view = $view .'<li><a onclick="addText(\''.$sval->id_stasiun.'\',\'#id_tujuan\',\''.$sval->nama.'\',\'.hasil-tujuan\',\'#inputTujuan\')">'.$sval->nama.' - '.$sval->singkatan.'</a></li>';	
	    	}
	    }
	    echo $view;
	}

}