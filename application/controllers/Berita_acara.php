<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Berita_acara extends CI_Controller {

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

	//LIST BERITA ACARA
	public function index(){
		$data = [
			'title' 					=> 'Berita Aset',
			'active_menu_berita_acara' 	=> 'active',
			'data' 						=> $this->db->get('tb_berita_acara'),  
		];

		$this->load->view('layouts/header_new',$data);
		$this->load->view('new/v_berita_acara',$data);
		$this->load->view('layouts/footer');
	}

	//DETAIL BERITA ACARA
	public function detail(){
		$data = [
			'title' 					=> 'Detail Aset',
			'active_menu_berita_acara' 	=> 'active',
			'detail' 					=> $this->db->get_where('tb_berita_acara',['id_berita' => $this->uri->segment(3)])->row(), 
			'data' 						=> $this->db->get_where('tb_barang',['berita_id' => $this->uri->segment(3)]),  
			'file' 						=> $this->db->get_where('tb_file',['berita_id' => $this->uri->segment(3)]),  
		];

		$this->load->view('layouts/header_new',$data);
		$this->load->view('new/v_detail_berita_acara',$data);
		$this->load->view('layouts/footer');
	}

	//PRINT PDF BERITA ACARA
	public function print(){
		$data = [
			'title' 					=> 'Detail Aset',
			'active_menu_berita_acara' 	=> 'active',
			'detail' 					=> $this->db->get_where('tb_berita_acara',['id_berita' => $this->uri->segment(2)])->row(), 
			'data' 						=> $this->db->get_where('tb_barang',['berita_id' => $this->uri->segment(2)]),  
			'file' 						=> $this->db->get_where('tb_file',['berita_id' => $this->uri->segment(2)]),  
		];

		$this->load->view('new/print',$data);
	}

	//INSERT DATA BERITA ACARA
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

	//UPLOAD FOTO BARANG
	function upload_foto_barang(){
		$id_barang = $this->input->post('id_barang',TRUE);
		$config['upload_path'] = 'src/img/surat/'; 
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';  
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config); 
		$this->upload->initialize($config); 
		$barang_lama = $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row();
		
		// Hapus gambar lama dari direktori jika ada
		if (!empty($barang_lama->foto)) {
			$path_to_file = 'src/img/surat/' . $barang_lama->foto;
			if (file_exists($path_to_file)) {
				unlink($path_to_file);
			}
		}
		if ($this->upload->do_upload('name_file')){
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']	='gd2';
            $config['source_image']		='src/img/surat/'.$gbr['file_name'];
            $config['create_thumb']		= FALSE;
            $config['maintain_ratio']	= FALSE;
            $config['quality']			= '60%';
            $config['new_image']		= 'src/img/surat/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
			
			$data = [
				'foto' 			=> $gbr['file_name'],
			];
	
			$this->db->update('tb_barang',$data,['id_barang' => $this->input->post('id_barang',TRUE)]);
			$this->session->set_flashdata('sukses', 'Disimpan');
			redirect($_SERVER['HTTP_REFERER']);
			
		}
	}

	//INSERT DATA BARANG
	public function save_barang(){
		$uri = $this->uri->segment(3);
		$id_barang = $this->input->post('id_barang');
		if($id_barang){
			$data = [
				'kode_barang' 	=> $this->input->post('kode_barang', TRUE),
				'nama_barang' 	=> $this->input->post('nama_barang', TRUE),
				'nama_umum' 	=> $this->input->post('nama_umum', TRUE),
				'spesifikasi' 	=> $this->input->post('spesifikasi', TRUE),
				'jumlah' 		=> $this->input->post('jumlah', TRUE),
				'harga' 		=> $this->input->post('harga', TRUE),
				'ket' 			=> $this->input->post('ket', TRUE),
			];
		
			// Memeriksa apakah ada file yang diunggah
			if (!empty($_FILES['name_file']['name'])) {
				// Ambil data barang yang akan diupdate
				$barang_lama = $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row();
		
				// Hapus gambar lama dari direktori jika ada
				if (!empty($barang_lama->foto)) {
					$path_to_file = 'src/img/surat/' . $barang_lama->foto;
					if (file_exists($path_to_file)) {
						unlink($path_to_file);
					}
				}
		
				// Konfigurasi upload gambar
				$config['upload_path'] = 'src/img/surat/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf';
				$config['encrypt_name'] = TRUE;
		
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
		
				// Variabel untuk menyimpan nama file gambar
				$foto = '';
		
				// Jika ada file yang diunggah
				if ($this->upload->do_upload('name_file')) {
					$gbr = $this->upload->data();
		
					// Kompresi gambar jika diperlukan
					$config['image_library'] = 'gd2';
					$config['source_image'] = 'src/img/surat/' . $gbr['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '60%';
					$config['new_image'] = 'src/img/surat/' . $gbr['file_name'];
		
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
		
					// Simpan nama file gambar
					$foto = $gbr['file_name'];
				}
		
				// Tambahkan field 'foto' jika ada nama file gambar yang diunggah
				if ($foto !== '') {
					$data['foto'] = $foto;
				}
			}
			$this->db->update('tb_barang',$data,['id_barang' => $id_barang]);
			$this->session->set_flashdata('sukses', 'Disimpan');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			// var_dump($id_barang);
			// echo "insert";
			$config['cacheable']    = true; 
			$config['cachedir']     = './src/'; 
			$config['errorlog']     = './src/'; 
			$config['imagedir']     = './src/img/qrcode/'; 
			$config['quality']      = true; 
			$config['size']         = '1024'; 
			$config['black']        = array(224,255,255); 
			$config['white']        = array(70,130,180); 
			$this->ciqrcode->initialize($config);
	
			$id = $this->uuid->v4();
			$image = str_replace('-', '', $id);
			$id_as = $this->uuid->v4();
			$random_id = str_replace('-', '', $id_as);
			$image_name = $image.'.png'; 
	
			$url = base_url().'detail-barang/'.$random_id;
	
			$params['data'] = $url; 
			$params['level'] = 'H'; 
			$params['size'] = 10;
			$params['savename'] = FCPATH.$config['imagedir'].$image_name; 
	
			$this->ciqrcode->generate($params);
	
			$config['upload_path'] 		= 'src/img/surat/'; 
			$config['allowed_types'] 	= 'jpg|png|jpeg|pdf';  
			$config['encrypt_name'] 	= TRUE;
			$this->load->library('upload', $config); 
			$this->upload->initialize($config); 
	
			if ($this->upload->do_upload('name_file')){
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library']='gd2';
				$config['source_image']='src/img/surat/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['new_image']= 'src/img/surat/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$id = $this->uuid->v4();
				$random_id = str_replace('-', '', $id);
				
				$data = [
					'id_barang'  	=> $random_id,
					'kode_barang' 	=> $this->input->post('kode_barang',TRUE),
					'nama_barang' 	=> $this->input->post('nama_barang',TRUE),
					'nama_umum' 	=> $this->input->post('nama_umum',TRUE),
					'spesifikasi' 	=> $this->input->post('spesifikasi',TRUE),
					'jumlah' 	  	=> $this->input->post('jumlah',TRUE),
					'harga' 		=> $this->input->post('harga',TRUE),
					'ket' 			=> $this->input->post('ket',TRUE),
					'foto' 			=> $gbr['file_name'],
					'qrcode' 		=> $image_name,
					'berita_id' 	=> $uri,
				];
				
				// $this->db->insert('tb_barang',$data);
				// $this->session->set_flashdata('sukses', 'Disimpan');
				// redirect($_SERVER['HTTP_REFERER']);
				
			}
		}
	}

	//UPDATE BERITA ACARA
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

	public function get_detail_barang(){
		$id		= $this->input->post('id',TRUE);
		$data 	= $this->db->get_where('tb_barang', ['id_barang' => $id])->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	//UPDATE DATA BARANG
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

	//DELETE BARANG PER ID BARANG
	public function hapus_barang($id_barang){
		$uri = $this->uri->segment(3);
		$data = $this->db->get_where('tb_barang',['id_barang' =>$uri])->row_array();

		unlink('src/img/qrcode/'.$data['qrcode']);
		unlink('src/img/surat/'.$data['foto']);
		$this->db->delete('tb_barang',['id_barang' => $uri]);
		$this->session->set_flashdata('sukses', 'Dihapus');
		redirect($_SERVER['HTTP_REFERER']);
	}

	//DELETE FILE LAMPIRAN BERITA ACARA
	public function hapus_file($id_barang){
		$uri = $this->uri->segment(3);
		$this->db->delete('tb_file',['id' => $uri]);
		$this->session->set_flashdata('sukses', 'Dihapus');
		redirect($_SERVER['HTTP_REFERER']);
	}

	//Initialize UPLOAD
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

	//IMPORT BARANG
	public function upload() {
		$path 		= 'storage/';
		$json 		= [];
		$this->upload_config($path);
		if (!$this->upload->do_upload('file')) {
			$json = [
				'error_message' => $this->upload->display_errors(),
			];
		} else {
			
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
						$config['cacheable']    = true; 
						$config['cachedir']     = './src/'; 
						$config['errorlog']     = './src/'; 
						$config['imagedir']     = './src/img/qrcode/'; 
						$config['quality']      = true; 
						$config['size']         = '1024'; 
						$config['black']        = array(224,255,255); 
						$config['white']        = array(70,130,180); 
						$this->ciqrcode->initialize($config);

						$id = $this->uuid->v4();
						$image = str_replace('-', '', $id);
						$id_as = $this->uuid->v4();
						$random_id = str_replace('-', '', $id_as);
						$image_name = $image.'.png'; 

						$url = base_url().'detail-barang/'.$random_id;

						$params['data'] = $url; 
						$params['level'] = 'H'; 
						$params['size'] = 10;
						$params['savename'] = FCPATH.$config['imagedir'].$image_name; 

						$this->ciqrcode->generate($params);
						$list [] = [
							'id_barang'			=> $random_id,
							'kode_barang'		=> $val[0],
							'nama_barang'		=> $val[1],
							'nama_umum'			=> $val[2],
							'spesifikasi'		=> $val[3],
							'jumlah'			=> $val[4],
							'harga'				=> $val[5],
							'ket'				=> $val[6],
							'qrcode' 			=> $image_name,
							'berita_id'			=> $this->uri->segment(3)
						];
					}
				}
			}
			if(file_exists($file_name))
				unlink($file_name);
			if(count($list) > 0) {
				$this->db->trans_start();
				$this->db->insert_batch('tb_barang',$list);
				$this->db->trans_complete();

				if ($this->db->trans_status() === FALSE) {
					$this->session->set_flashdata('gagal', 'Disimpan');
				} else {
					if ($result) {
						$this->session->set_flashdata('sukses', 'Disimpan');
					} else {
						$this->session->set_flashdata('gagal', 'Disimpan');
					}
				}
			} else {
				$this->session->set_flashdata('gagal_store', 'No new record is found..');
			}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	//UPLOAD FILE LAMPIRAN BERITA ACARA
	function upload_file(){ 
        $data = []; 
        $errorUploadType = $statusMsg = ''; 
         
        // If file upload form submitted 
        if($this->input->post('fileSubmit')){ 
             
            // If files are selected to upload 
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']    = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'src/file/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $uploadData[$i]['file_name'] = $fileData['file_name']; 
                        $uploadData[$i]['berita_id'] = $this->input->post('berita_id'); 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 
                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    $insert = $this->db->insert_batch('tb_file',$uploadData); 
                     
					$this->session->set_flashdata('sukses', 'Disimpan');
                    // echo $statusMsg = $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                }else{ 
					$this->session->set_flashdata('gagal', 'Disimpan'); 
                } 
            }else{
				$this->session->set_flashdata('gagal_store', 'Please select image files to upload..');
            } 
        } 
        redirect($_SERVER['HTTP_REFERER']);
    } 

	//IMPORT BERITA ACARA DAN DATA BARANG ALL
	public function import() {
		$path 		= 'storage/';
		$json 		= [];
		$this->upload_config($path);
		if (!$this->upload->do_upload('file')) {
			$json = [
				'error_message' => $this->upload->display_errors(),
			];
		} else {
			
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
			
			$list = [
				'no_berita' 		=> trim(explode(':', $sheet_data[5][1])[1]),
				'tgl_penerimaan' 	=> format_date_for_mysql(trim(explode(':', $sheet_data[6][1])[1])),
				'diterima_dari' 	=> trim(explode(':', $sheet_data[7][1])[1]),
				'no_kontrak' 		=> trim(explode(':', $sheet_data[8][1])[1]),
				'no_pptk' 	  		=> trim(explode(':', $sheet_data[9][1])[1]),
				'program' 		  	=> $sheet_data[6][8],
				'kegiatan' 		  	=> $sheet_data[8][8],
				'no_arsip' 		  	=> $sheet_data[0][10],
			];
			$this->db->insert('tb_berita_acara',$list);
			$insert_id = $this->db->insert_id();

			$stop_iteration = false;
			$table_data = array_slice($sheet_data, 12);
			$jumlah_data = count($table_data);

			for ($i = 0; $i < $jumlah_data; $i++) {
				$row = $table_data[$i];

				if ($row[1] == 'Pengurus Barang') {
					// Jika kondisi terpenuhi, berhenti dari iterasi
					$stop_iteration = true;
					break;
				}
				$config['cacheable']    = true; 
				$config['cachedir']     = './src/'; 
				$config['errorlog']     = './src/'; 
				$config['imagedir']     = './src/img/qrcode/'; 
				$config['quality']      = true; 
				$config['size']         = '1024'; 
				$config['black']        = array(224,255,255); 
				$config['white']        = array(70,130,180); 
				$this->ciqrcode->initialize($config);

				$id = $this->uuid->v4();
				$image = str_replace('-', '', $id);
				$id_as = $this->uuid->v4();
				$random_id = str_replace('-', '', $id_as);
				$image_name = $image.'.png'; 

				$url = base_url().'detail-barang/'.$random_id;

				$params['data'] = $url; 
				$params['level'] = 'H'; 
				$params['size'] = 10;
				$params['savename'] = FCPATH.$config['imagedir'].$image_name; 

				$this->ciqrcode->generate($params);
				$list2[] = [
					'id_barang'			=> $random_id,
					'kode_barang' 		=> $row[2],
					'nama_barang' 		=> $row[3],
					'nama_umum' 		=> $row[4],
					'no_dpa' 			=> $row[5],
					'kode_rek_belanja'	=> $row[6],
					'spesifikasi' 		=> $row[7],
					'jumlah' 			=> $row[8],
					'harga' 			=> clean_currency($row[9]),
					'ket' 				=> $row[10],
					'qrcode' 			=> $image_name,
					'berita_id'			=> $insert_id
				];

				if ($stop_iteration) {
					break;
				}
			}

			if(file_exists($file_name))
				unlink($file_name);
			if(count($list) > 0) {
				
				$this->db->trans_start();
				$this->db->insert_batch('tb_barang',$list2);
				$this->db->trans_complete();

				if ($this->db->trans_status() === FALSE) {
					$this->session->set_flashdata('gagal', 'Disimpan');
				} else {
					$this->session->set_flashdata('sukses', 'Disimpan');
				}
			} else {
				$this->session->set_flashdata('gagal_store', 'No new record is found..');
			}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

}
