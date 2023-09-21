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
		redirect($_SERVER['HTTP_REFERER']);
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
		redirect($_SERVER['HTTP_REFERER']);
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

	public function upload_config($path) {
		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}
		
		$config['upload_path']    = './'.$path;
		$config['allowed_types']  = 'csv|CSV|xlsx|XLSX|xls|XLS';
		$config['max_filename']   = '255';
		$config['encrypt_name']   = TRUE;
		$config['max_size']       = 4096;
	
		$this->upload->initialize($config);
	}

	public function upload() {
		$path 		= 'storage/';
		$json 		= [];
		$this->upload_config($path);
		if (!$this->upload->do_upload('file')) {
			$json = [
				'error_message' => $this->upload->display_errors(),
			];
		} else {
			
			$lastCode = getLastCodeNrm();
        if (empty($lastCode)) {
            $nextCode = date('y').date('m').'0001';
        } else {
            $lastNumericPart = (int)substr($lastCode, 6);
            $nextNumericPart = $lastNumericPart + 1;
            $nextCode = date('y').date('m').str_pad($nextNumericPart, 4, '0', STR_PAD_LEFT);
        }

			$file_data 	= $this->upload->data();
			$file_name 	= $path.$file_data['file_name'];
			$arr_file 	= explode('.', $file_name);
			$extension 	= end($arr_file);
			
			if('csv' == $extension) {
				$reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet 	= $reader->load($file_name);
			$sheet_data 	= $spreadsheet->getActiveSheet()->toArray();
			$list 			= [];

			foreach($sheet_data as $key => $val) {
				if($key != 0) {
					$result 	= '';
					if($result) {
					} else {
						$list [] = [
							'nrm'				=> $nextCode,
							'nama'				=> $val[0],
							'nik'			  	=> $val[1],
							'nopeg'				=> $val[2],
							'tempat_lahir'		=> $val[3],
							'tanggal_lahir'		=> $val[4],
							'jenis_kelamin'		=> $val[5],
							'id_provinsi'		=> provinsiId($val[6]),
							'id_kabupaten'		=> kabupatenId($val[7]),
							'id_kecamatan'		=> kecamatanId($val[8]),
							'id_kelurahan'		=> kelurahanId($val[9]),
							'status_pernikahan'	=> $val[10],
							'jenis_pekerjaan'	=> jenis_pekerjaan($val[11]),
							'perusahaan_id'		=> $this->input->post('perusahaan_id'),
							'unit_id'			=> sess('unit_id'),
							'lokasi_id'			=> $this->input->post('lokasi_id'),
						];

						$nextNumericPart++;
						// Update the next code with the incremented numeric portion
						$nextCode = date('y').date('m').str_pad($nextNumericPart, 4, '0', STR_PAD_LEFT);
					}
				}
			}
			if(file_exists($file_name))
				unlink($file_name);
			if(count($list) > 0) {
				$this->db->trans_start();
				$result 	= $this->my_model->insert_batch('m_pasien',$list);
				$this->db->trans_complete();

				if ($this->db->trans_status() === FALSE) {
					$json = [
						'error_message' => "Import Data gagal. Silakan coba lagi."
					];
				} else {
					if ($result) {
						$json = [
							'success_message' => "All Entries are imported successfully.",
						];
					} else {
						$json = [
							'error_message' => "Something went wrong. Please try again."
						];
					}
				}
			} else {
				$json = [
					'error_message' => "No new record is found.",
				];
			}
		}
		echo json_encode($json);
	}

}

/* End of file Statistik.php */
/* Location: ./application/controllers/Statistik.php */