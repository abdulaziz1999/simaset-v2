<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_acara extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

		//load model
		$this->load->model('ModelStatistik','ms');
	}

	public function index()
	{
		$data = array(
			'title' 					=> 'Berita Aset',
			'active_menu_berita_acara' 	=> 'active',
			'data' 						=> $this->db->get('tb_berita_acara'),  
		);

		$this->load->view('layouts/header_new',$data);
		$this->load->view('new/v_berita_acara',$data);
		$this->load->view('layouts/footer');
	}

	public function detail()
	{
		$data = array(
			'title' 					=> 'Detail Aset',
			'active_menu_berita_acara' 	=> 'active',
			'detail' 					=> $this->db->get_where('tb_berita_acara',['id_berita' => $this->uri->segment(3)])->row(), 
			'data' 						=> $this->db->get_where('tb_barang',['berita_id' => $this->uri->segment(3)]),  
		);

		$this->load->view('layouts/header_new',$data);
		$this->load->view('new/v_detail_berita_acara',$data);
		$this->load->view('layouts/footer');
	}

}

/* End of file Statistik.php */
/* Location: ./application/controllers/Statistik.php */