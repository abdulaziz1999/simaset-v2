<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Qr_code extends CI_Controller {

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
		$data = [
			'title' 				=> 'Qrcode Aset',
			'active_menu_qrcode' 	=> 'active',
			'data' 					=> $this->db->get('tb_berita_acara'),  
		];
		
		$this->load->view('layouts/header_new',$data);
		$this->load->view('print/v_qrcode',$data);
		$this->load->view('layouts/footer');
	}
	
	public function pQrcode(){
		$data = [
			'title' 	=> 'Print Berita Acara',
			'detail' 	=> $this->db->get_where('tb_berita_acara',['id_berita' => $this->uri->segment(2)])->row(), 
			'data' 		=> $this->db->get_where('tb_barang',['berita_id' => $this->uri->segment(2)]), 
			'barang' 	=> $this->db->get_where('tb_barang',['berita_id' => $this->uri->segment(3)]),
			'judul'		=> $this->db->get_where('tb_judul',['id_judul' => 1])->row()
		];

		$this->load->view('print/p_qrcode',$data);
	}

}
