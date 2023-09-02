<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// if ($this->session->userdata("logged")<>1) {
	    //   redirect(site_url('login'));
	    // }

	    $this->load->model('ModelAset','ma');
	    $this->load->model('Master','m');
	}

	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'active_menu_db' => 'active',
			'inventory' => $this->m->getTotalData('inventory'),
			'barang' => $this->m->getTotalData('barang'),
			'lokasi_aset' => $this->m->getTotalData('lokasi_aset'),
			'users' => $this->m->getTotalData('users'),
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/content',$data);
		$this->load->view('layouts/footer');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */