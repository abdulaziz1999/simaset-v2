<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

	    $this->load->model('ModelAset','ma');
	    $this->load->model('Master','m');
	}

	public function index()
	{
		$data = array(
			'title' 			=> 'Dashboard',
			'active_menu_db' 	=> 'active',
			'berita_acara' 		=> $this->db->get('tb_berita_acara')->num_rows(),
			'barang' 			=> $this->db->get('tb_barang')->num_rows(),
			'users' 			=> $this->db->get('users')->num_rows(),
		);
		$this->load->view('layouts/header_new',$data);
		$this->load->view('new/dashboard',$data);
		$this->load->view('layouts/footer');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */