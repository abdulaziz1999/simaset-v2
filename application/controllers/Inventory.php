<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }
		
		$this->load->model('Master','m');
		$this->load->model('ModelBarang','mb');
		$this->load->model('ModelLokasi','ml');

		$this->load->model('ModelAset','ma');

		//load library
		$this->load->library('ciqrcode');
		$this->load->library('uuid');
	}

	public function index()
	{
		$data = array(
			'title' => 'Data Inventory',
			'active_menu_inv' => 'active',
			'item' => $this->m->getInventory()  
		);

		$this->load->view('layouts/header',$data);
		$this->load->view('inventory/index');
		$this->load->view('layouts/footer');
	}

	public function create()
	{
		$data = array(
			'title' => 'Data Inventory',
			'active_menu_inv' => 'active',
			'barang' => $this->mb->getDataBarang(),
			'lokasi' => $this->ml->getLokasi() 
		);
	
		$this->load->view('layouts/header',$data);
		$this->load->view('inventory/create');
		$this->load->view('layouts/footer');
	}

	public function store()
	{
		$generate = $this->input->post('generate');
		if ($generate) {

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

	        $url = base_url().'detail-inventory/'.$random_id;

	        $params['data'] = $url; 
	        $params['level'] = 'H'; 
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; 
	        $this->ciqrcode->generate($params);
			//upload image
			$config['upload_path'] = 'src/img/surat/'; 
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';  
			$config['encrypt_name'] = TRUE;

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
				
				$data = array(
					'id' => $random_id,
					'barang_id' => $this->input->post('barang_id'),
					'lokasi_id' => $this->input->post('lokasi_id'),
					'tahun_anggaran' => $this->input->post('tahun_anggaran'),
					'pptk' => $this->input->post('pptk'),
					'no_bast' => $this->input->post('no_bast'),
					'kir' => $this->input->post('kir'),
					'tahun' => $this->input->post('tahun'),
					'name_file' => $gbr['file_name'],
					'qr_code' => $image_name
				);

				$this->m-> addData('inventory', $data);

				$this->session->set_flashdata('sukses', 'Disimpan');
				redirect('inventory');
            }

		} else {

			$config['upload_path'] = 'src/img/surat/'; 
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';  
			$config['encrypt_name'] = TRUE;

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
				
				$data = array(
					'id' => $random_id,
					'barang_id' => $this->input->post('barang_id'),
					'lokasi_id' => $this->input->post('lokasi_id'),
					'tahun_anggaran' => $this->input->post('tahun_anggaran'),
					'pptk' => $this->input->post('pptk'),
					'no_bast' => $this->input->post('no_bast'),
					'kir' => $this->input->post('kir'),
					'tahun' => $this->input->post('tahun'),
					'name_file' => $gbr['file_name'],
				);

				$this->m-> addData('inventory', $data);

				$this->session->set_flashdata('sukses', 'Disimpan');
				redirect('inventory');
            }
		}
	}

	public function show($id)
	{
		$id = $this->uri->segment(3);

		$data = array(
			'title' => 'Data Inventory',
			'active_menu_inv' => 'active',
			'item' => $this->m->getDetailInventory($id)  
		);
	
		$this->load->view('layouts/header',$data);
		$this->load->view('inventory/detail');
		$this->load->view('layouts/footer');
	}

	public function print_data($id)
	{
		$id = $this->uri->segment(2);

		$data = array(
			'title' => 'Laporan Data Inventory',
			'active_menu_inv' => 'active',
			'item' => $this->m->getDetailInventory($id)  
		);

		$this->load->view('report/header',$data);
		$this->load->view('inventory/print');
		$this->load->view('report/footer');
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

	public function edit($id)
	{
		$id = $this->uri->segment(3);

		$data = array(
			'title' => 'Data Inventory',
			'active_menu_inv' => 'active',
			'barang' => $this->mb->getDataBarang(),
			'lokasi' => $this->ml->getLokasi(),
			'item' => $this->m->getDetailInventory($id)  
		);
	
		$this->load->view('layouts/header',$data);
		$this->load->view('inventory/edit');
		$this->load->view('layouts/footer');
	}

	public function update_data()
	{
		$generate = $this->input->post('generate');
		$id = $this->input->post('id');

		if ($generate) {

			//delete old qr code
			$files = $this->m->getDetailData('inventory', $id);
			unlink('src/img/qrcode/'.$files['qr_code']);

			$config['cacheable']    = true; 
	        $config['cachedir']     = './src/'; 
	        $config['errorlog']     = './src/'; 
	        $config['imagedir']     = './src/img/qrcode/'; 
	        $config['quality']      = true; 
	        $config['size']         = '1024'; 
	        $config['black']        = array(224,255,255); 
	        $config['white']        = array(70,130,180); 
	        $this->ciqrcode->initialize($config);

			$rand = $this->uuid->v4();
	        $image = str_replace('-', '', $rand);

	        $image_name = $image.'.png'; 

	        $url = 'http://urlkamu.com/detail-inventory/'.$id;

	        $params['data'] = $url; 
	        $params['level'] = 'H'; 
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; 
	        $this->ciqrcode->generate($params);

			//cek upload file
			$config['upload_path'] = 'src/img/surat/'; 
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';  
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if (!empty($_FILES['name_file']['name'])) {
				if ($this->upload->do_upload('name_file')){

					//delete old data
					$files = $this->m->getDetailData('inventory', $id);
					unlink('src/img/surat/'.$files['name_file']);

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
					
					$data = array(
						'barang_id' => $this->input->post('barang_id'),
						'lokasi_id' => $this->input->post('lokasi_id'),
						'tahun_anggaran' => $this->input->post('tahun_anggaran'),
						'pptk' => $this->input->post('pptk'),
						'no_bast' => $this->input->post('no_bast'),
						'kir' => $this->input->post('kir'),
						'tahun' => $this->input->post('tahun'),
						'name_file' => $gbr['file_name'],
						'qr_code' => $image_name
					);

					$this->m->updateData($id,'inventory',$data);

					$this->session->set_flashdata('sukses', 'Disimpan');
					redirect('inventory');
				}
			} else {
				$data = array(
					'barang_id' => $this->input->post('barang_id'),
					'lokasi_id' => $this->input->post('lokasi_id'),
					'tahun_anggaran' => $this->input->post('tahun_anggaran'),
					'pptk' => $this->input->post('pptk'),
					'no_bast' => $this->input->post('no_bast'),
					'kir' => $this->input->post('kir'),
					'tahun' => $this->input->post('tahun'),
					'qr_code' => $image_name
				);

				$this->m->updateData($id,'inventory',$data);

				$this->session->set_flashdata('sukses', 'Disimpan');
				redirect('inventory');
			}


		}else{
			$config['upload_path'] = 'src/img/surat/'; 
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';  
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if (!empty($_FILES['name_file']['name'])) {
				if ($this->upload->do_upload('name_file')){

					//delete old data
					$files = $this->m->getDetailData('inventory', $id);
					unlink('src/img/surat/'.$files['name_file']);

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
					
					$data = array(
						'barang_id' => $this->input->post('barang_id'),
						'lokasi_id' => $this->input->post('lokasi_id'),
						'tahun_anggaran' => $this->input->post('tahun_anggaran'),
						'pptk' => $this->input->post('pptk'),
						'no_bast' => $this->input->post('no_bast'),
						'kir' => $this->input->post('kir'),
						'tahun' => $this->input->post('tahun'),
						'name_file' => $gbr['file_name'],
					);

					$this->m->updateData($id,'inventory',$data);

					$this->session->set_flashdata('sukses', 'Disimpan');
					redirect('inventory');
				}
			} else {
				$data = array(
					'barang_id' => $this->input->post('barang_id'),
					'lokasi_id' => $this->input->post('lokasi_id'),
					'tahun_anggaran' => $this->input->post('tahun_anggaran'),
					'pptk' => $this->input->post('pptk'),
					'no_bast' => $this->input->post('no_bast'),
					'kir' => $this->input->post('kir'),
					'tahun' => $this->input->post('tahun'),
				);

				$this->m->updateData($id,'inventory',$data);

				$this->session->set_flashdata('sukses', 'Disimpan');
				redirect('inventory');
			}
		}
	}

	public function destroy($id)
	{
		$id = $this->uri->segment(2);

		//delete qr code
		$files = $this->m->getDetailData('inventory', $id);
		unlink('src/img/qrcode/'.$files['qr_code']);

		//delete file
		unlink('src/img/surat/'.$files['name_file']);

        $this->db->where('id',$id);
        $this->db->delete('inventory');
        $this->session->set_flashdata('sukses', 'Dihapus');
		redirect('inventory');
	}

}

/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */