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

	public function form()
	{
		$data = array(
			'title' 					=> 'Detail Aset',
			'active_menu_berita_acara' 	=> 'active',
			'detail' 					=> $this->db->get_where('tb_berita_acara',['id_berita' => $this->uri->segment(3)])->row(), 
			'data' 						=> $this->db->get_where('tb_barang',['berita_id' => $this->uri->segment(3)]),  
		);

		$this->load->view('layouts/header_new',$data);
		$this->load->view('new/form',$data);
		$this->load->view('layouts/footer');
	}

	public function form_barang()
	{
		$data = array(
			'title' 					=> 'Detail Aset',
			'active_menu_berita_acara' 	=> 'active',
			'detail' 					=> $this->db->get_where('tb_berita_acara',['id_berita' => $this->uri->segment(3)])->row(), 
			'data' 						=> $this->db->get_where('tb_barang',['berita_id' => $this->uri->segment(3)]),  
		);

		$this->load->view('layouts/header_new',$data);
		$this->load->view('new/add_barang',$data);
		$this->load->view('layouts/footer');
	}

	public function edit()
	{
		$data = array(
			'title' 					=> 'Detail Aset',
			'active_menu_berita_acara' 	=> 'active',
			'detail' 					=> $this->db->get_where('tb_berita_acara',['id_berita' => $this->uri->segment(3)])->row(), 
			'data' 						=> $this->db->get_where('tb_barang',['berita_id' => $this->uri->segment(3)]),  
		);

		$this->load->view('layouts/header_new',$data);
		$this->load->view('new/edit',$data);
		$this->load->view('layouts/footer');
	}

	public function save_berita(){
		$data = [
			'no_berita' 		=> $this->input->post('no_berita',TRUE),
			'tgl_penerimaan' 	=> $this->input->post('tgl_penerimaan',TRUE),
			'diterima_dari' 	=> $this->input->post('diterima_dari',TRUE),
			'no_kontrak' 		=> $this->input->post('no_kontrak',TRUE),
			'no_pptk' 	  		=> $this->input->post('no_pptk',TRUE),
			'program' 		  	=> $this->input->post('program',TRUE),
			'kegiatan' 		  	=> $this->input->post('kegiatan',TRUE),
			'no_arsip' 		  	=> $this->input->post('no_arsip',TRUE),
		];

		$this->db->insert('tb_berita_acara',$data);
		redirect(base_url('berita_acara'));
	}

	public function save_barang(){
		$uri = $this->uri->segment(3);
		$data = [
			'kode_barang' 	=> $this->input->post('kode_barang',TRUE),
			'nama_barang' 	=> $this->input->post('nama_barang',TRUE),
			'nama_umum' 	=> $this->input->post('nama_umum',TRUE),
			'spesifikasi' 	=> $this->input->post('spesifikasi',TRUE),
			'jumlah' 	  	=> $this->input->post('jumlah',TRUE),
			'harga' 		=> $this->input->post('harga',TRUE),
			'ket' 			=> $this->input->post('ket',TRUE),
			'berita_id' 	=> $uri,
		];

		$this->db->insert('tb_barang',$data);
		redirect(base_url('berita_acara/detail/'.$uri));
		
	}

	public function update_berita($id_berita){
		$data = [
			'no_berita' 		=> $this->input->post('no_berita',TRUE),
			'tgl_peneriamaan' 	=> $this->input->post('tgl_peneriamaan',TRUE),
			'diterima_dari' 	=> $this->input->post('diterima_dari',TRUE),
			'no_kontrak' 		=> $this->input->post('no_kontrak',TRUE),
			'no_pptk' 	  		=> $this->input->post('no_pptk',TRUE),
			'program' 		  	=> $this->input->post('program',TRUE),
			'kegiatan' 		  	=> $this->input->post('kegiatan',TRUE),
			'no_arsip' 		  	=> $this->input->post('no_arsip',TRUE),
		];

		$this->db->update('tb_berita_acara',$data,['id' => $id_berita]);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_barang($id_barang){
		$data = [
			'kode_barang' 	=> $this->input->post('kode_barang',TRUE),
			'nama_barang' 	=> $this->input->post('nama_barang',TRUE),
			'spesifikasi' 	=> $this->input->post('spesifikasi',TRUE),
			'jumlah' 	  	=> $this->input->post('jumlah',TRUE),
			'harga' 		=> $this->input->post('harga',TRUE),
			'ket' 			=> $this->input->post('ket',TRUE),
		];

		$this->db->update('tb_barang',$data,['id_barang' => $id_barang]);
		redirect($_SERVER['HTTP_REFERER']);
	}

}

/* End of file Statistik.php */
/* Location: ./application/controllers/Statistik.php */