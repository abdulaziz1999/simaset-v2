<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }
		
		$this->load->model('Master','m');
	}

	public function index()
	{
		if (isset($_POST['filter'])) {
			$date1 = $this->input->post('date1');
			$date2 = $this->input->post('date2');

			$data = array(
				'title' => 'Transaksi Pengembalian',
				'active_menu_pgm' => 'active',
				'item' => $this->m->getFilterPengembalian($date1, $date2),
				'tgl1' => $date1,  
				'tgl2' => $date2,  
			);
		} else {
			$data = array(
				'title' => 'Transaksi Pengembalian',
				'active_menu_pgm' => 'active',
				'item' => $this->m->getPengembalian()  
			);
		}
		$this->load->view('layouts/header',$data);
		$this->load->view('pengembalian/index');
		$this->load->view('layouts/footer');
	}

	public function create()
	{
		$data = array(
			'title' => 'Transaksi Pengembalian',
			'active_menu_pgm' => 'active',
			'item' => $this->m->getAllDataDesc('peminjaman', 'id')  
		);

		$this->load->view('layouts/header',$data);
		$this->load->view('pengembalian/create');
		$this->load->view('layouts/footer');
	}

	public function store()
	{
		$data = array(
			'pinjam_id' => $this->input->post('pinjam_id'),
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan'), 
		);

		$this->m->addData('pengembalian',$data);

       	$this->session->set_flashdata('sukses', 'Disimpan');
		redirect('pengembalian');
	}

	public function print_data($date1, $date2)
	{
		$date1 = $this->uri->segment(2);
		$date2 = $this->uri->segment(3);

		$data = array(
			'title' => 'Transaksi Pengembalian',
			'item' => $this->m->getFilterPengembalian($date1, $date2)  
		);

		$this->load->view('report/header',$data);
		$this->load->view('pengembalian/print-filter');
		$this->load->view('report/footer');
	}

	public function edit($id)
	{
		$id = $this->uri->segment(3);

		$data = array(
			'title' => 'Transaksi Pengembalian',
			'active_menu_pgm' => 'active',
			'item' => $this->m->getDetailPengembalian($id)  
		);
	
		$this->load->view('layouts/header',$data);
		$this->load->view('pengembalian/edit');
		$this->load->view('layouts/footer');
	}

	public function update_data()
	{
		$id = $this->input->post('id');

		$data = array(
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan'), 
		);

		$this->m->updateData($id, 'pengembalian', $data);

       	$this->session->set_flashdata('sukses', 'Diubah');
		redirect('pengembalian');
	}

	public function destroy($id)
	{
		$id = $this->uri->segment(3);

		$this->m->deleteData($id, 'pengembalian');

       	$this->session->set_flashdata('sukses', 'Dihapus');
		redirect('pengembalian');

	}

	public function print_all_data()
	{
		$data = array(
			'title' => 'Transaksi Pengembalian',
			'item' => $this->m->getPengembalian()  
		);

		$this->load->view('report/header',$data);
		$this->load->view('pengembalian/print');
		$this->load->view('report/footer');
	}

}

/* End of file Pengembalian.php */
/* Location: ./application/controllers/Pengembalian.php */