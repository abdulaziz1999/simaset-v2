<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Model {

	public function getAllData($table){
		$data = $this->db->get($table);
		return $data->result_array();
	}

    public function getAllDataDesc($table, $id){
		$this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($id, 'desc');
        $data = $this->db->get();

		return $data->result_array();
	}

    public function getDetailData($table, $id){
		$this->db->select('*');
        $this->db->from($table);
        $this->db->where('id', $id);
        $data = $this->db->get();
        
		return $data->row_array();
	}

    public function addData($table, $data)
    {
        return $this->db->insert($table, $data);
    }

	public function updateData($id,$table,$data){
        $this->db->where('id', $id);
        $res = $this->db->update($table,$data);
        return $res;
    }

    public function deleteData($id, $table)
    {
        $this->db->where('id', $id);
		$res = $this->db->delete($table);
		return $res;
    }

	public function CreateCode($category, $year){
	    $this->db->select('LEFT(asets.kode_aset,5) as kode_aset', FALSE);
	    $this->db->order_by('kode_aset','DESC');    
	    $this->db->limit(1);    
	    $query = $this->db->get('asets');
	        if($query->num_rows() <> 0){      
	             $data = $query->row();
	             $kode = intval($data->kode_aset) + 1; 
	        }
	        else{      
	             $kode = 1;  
	        }
	    $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
	    $kodetampil = $batas."/".$category."/".$year;
	    return $kodetampil;  
	}

	public function getDetailBarang($id_barang)
	{
		$this->db->select('*');
		$this->db->from('barang a');
		$this->db->join('kategori_barang d', 'd.id_kategori = a.id_kategori');
		$this->db->where('id_barang', $id_barang);
		$query = $this->db->get();
		return $query->row_array(); 
	}

	public function getMaintenance()
	{
		$this->db->select('a.*, b.kode_aset, c.nama_barang');
		$this->db->from('maintenance a');
		$this->db->join('asets b', 'b.id_aset = a.aset_id');
		$this->db->join('barang c', 'c.id_barang = b.id_barang');
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function getDetailMaintenance($id)
	{
		$this->db->select('a.*, b.kode_aset, c.nama_barang');
		$this->db->from('maintenance a');
		$this->db->join('asets b', 'b.id_aset = a.aset_id');
		$this->db->join('barang c', 'c.id_barang = b.id_barang');
		$this->db->where('a.id', $id);
		$query = $this->db->get();
		return $query->row_array(); 
	}

	public function getFilterMaintenance($date1, $date2)
	{
		$this->db->select('a.*, b.kode_aset, c.nama_barang');
		$this->db->from('maintenance a');
		$this->db->join('asets b', 'b.id_aset = a.aset_id');
		$this->db->join('barang c', 'c.id_barang = b.id_barang');
		$this->db->where('a.tgl_service >=', $date1);
		$this->db->where('a.tgl_service <=', $date2);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function getInventory()
	{
		$this->db->select('a.*, b.kode_barang, b.nama_barang, c.kode_lokasi, c.nama_lokasi');
		$this->db->from('inventory a');
		$this->db->join('barang b', 'b.id_barang = a.barang_id');
		$this->db->join('lokasi_aset c', 'c.id_lokasi = a.lokasi_id');
		$this->db->order_by('a.id', 'desc');
		
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function getDetailInventory($id)
	{
		$this->db->select('a.*, b.kode_barang, b.nama_barang, c.kode_lokasi, c.nama_lokasi');
		$this->db->from('inventory a');
		$this->db->join('barang b', 'b.id_barang = a.barang_id');
		$this->db->join('lokasi_aset c', 'c.id_lokasi = a.lokasi_id');
		$this->db->where('a.id', $id);
		
		$query = $this->db->get();
		return $query->row_array(); 
	}

	public function getTotalData($table)
	{
		$query = $this->db->get($table);
		return $query->num_rows();
	}

}

/* End of file Master.php */
/* Location: ./application/models/Master.php */