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

	public function detail_barang()
	{
		$berita_id = $this->db->get_where('tb_barang',['id_barang' => $this->uri->segment(2)])->row()->berita_id;
		$data = [
			'item' => $this->db->get_where('tb_barang',['id_barang' => $this->uri->segment(2)])->row_array(),
			'detail' => $this->db->get_where('tb_berita_acara',['id_berita' => $berita_id])->row_array()
		];

		$this->load->view('new/detail_barang',$data);
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

	function tgl(){
		$date_str1 = "1 Januari 2023";
		$date_str2 = "2 Februari 2023";
		$date_str3 = "3 March 2023";
		$date_str4 = "4 April 2023";
		$date_str5 = "5 May 2023";
		$date_str6 = "6 June 2023";
		$date_str7 = "7 July 2023";
		$date_str8 = "8 August 2023";
		$date_str9 = "9 September 2023";
		$date_str10 = "10 October 2023";
		$date_str11 = "11 November 2023";
		$date_str12 = "12 December 2023";
		echo $mysql_date1 = format_date_for_mysql($date_str1); echo '<br>';
		echo $mysql_date2 = format_date_for_mysql($date_str2);  echo '<br>';
		echo $mysql_date3 = format_date_for_mysql($date_str3);  echo '<br>';
		echo $mysql_date4 = format_date_for_mysql($date_str4);  echo '<br>';
		echo $mysql_date5 = format_date_for_mysql($date_str5);  echo '<br>';
		echo $mysql_date6 = format_date_for_mysql($date_str6);  echo '<br>';
		echo $mysql_date7 = format_date_for_mysql($date_str7);  echo '<br>';
		echo $mysql_date8 = format_date_for_mysql($date_str8);  echo '<br>';
		echo $mysql_date9 = format_date_for_mysql($date_str9);  echo '<br>';
		echo $mysql_date10 = format_date_for_mysql($date_str10);echo '<br>';
		echo $mysql_date11 = format_date_for_mysql($date_str11);echo '<br>';
		echo $mysql_date12 = format_date_for_mysql($date_str12);echo '<br>';
	}
}
