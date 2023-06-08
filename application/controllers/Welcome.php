<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('ModelAset','ma');
		$this->load->model('Master','m');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function halaman_notFound()
	{
		$this->load->view('layouts/error_page');
	}

	public function detailAset($id_aset)
	{
		$id_aset = $this->uri->segment(3);
		$data['aset'] = $this->ma->getDetailAsetWujud($id_aset);
		$this->load->view('aset/f_aset',$data);
	}

	public function show()
	{
		$id = $this->uri->segment(2);

		$data = array(
			'title' => 'Data Inventory',
			'item' => $this->m->getDetailInventory($id)  
		);
		$this->load->view('inventory/qrcode',$data);
	}

	public function guest()
	{
		$data = array(
			'title' => 'Data Inventory',
			'item' => $this->m->getInventory()  
		);

		$this->load->view('guest/header',$data);
		$this->load->view('guest/index');
		$this->load->view('guest/footer');
	}

	public function detail_inventory($id)
	{
		$id = $this->uri->segment(2);

		$data = array(
			'title' => 'Data Inventory',
			'item' => $this->m->getDetailInventory($id)   
		);

		$this->load->view('guest/header',$data);
		$this->load->view('guest/detail');
		$this->load->view('guest/footer');
	}

	public function print_data_guest($id)
	{
		$id = $this->uri->segment(2);

		$data = array(
			'title' => 'Laporan Data Inventory',
			'item' => $this->m->getDetailInventory($id)  
		);

		$this->load->view('report/header',$data);
		$this->load->view('inventory/print-guest');
		$this->load->view('report/footer');
	}
}
