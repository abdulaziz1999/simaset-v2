<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judul_berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

		//load model
		$this->load->library('ciqrcode');
		$this->load->library('uuid');
	}

	public function index()
	{
		$data = [
			'title' 				=> 'Qrcode Aset',
			'active_menu_judul' 	=> 'active',
			'data' 					=> $this->db->get('tb_judul'),  
		];

		$this->load->view('layouts/header_new',$data);
		$this->load->view('judul/v_judul_berita',$data);
		$this->load->view('layouts/footer');
	}

	public function getDetailJudul(){
		$id = $this->input->post('id');
		$data = $this->db->get_where('tb_judul',['id_judul' => $id])->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function update(){
		$data = [
			'judul_surat' 	=> $this->input->post('judul_surat'),
			'text_2' 		=> $this->input->post('text_2'),
			'text_3' 		=> $this->input->post('text_3'),
		];

		$this->db->update('tb_judul', $data);
		$this->session->set_flashdata('sukses', 'Diubah');
		redirect($_SERVER['HTTP_REFERER']);
	}

}
