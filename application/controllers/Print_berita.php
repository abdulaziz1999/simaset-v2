<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Print_berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

		//load model
		$this->load->model('ModelStatistik','ms');
		$this->load->library('ciqrcode');
		$this->load->library('uuid');
	}

	public function index()
	{
		$data = array(
			'title' 				=> 'Qrcode Aset',
			'active_print_berita' 	=> 'active',
			'data' 					=> $this->db->get('tb_berita_acara'),  
		);

		$this->load->view('layouts/header_new',$data);
		$this->load->view('new/v_print_berita',$data);
		$this->load->view('layouts/footer');
	}

}
