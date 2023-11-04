<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function tgl_indo($tanggal){
	$bulan = array (
		'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}

function laporan($angka){
	
	$hasil_rupiah = number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}

function count_file($id){
	$ci = get_instance();
	$data = $ci->db->get_where('tb_file',['berita_id' => $id])->num_rows();
	return $data;
}

function count_barang($id){
	$ci = get_instance();
	$data = $ci->db->get_where('tb_barang',['berita_id' => $id])->num_rows();
	return $data;
}

function count_content($where)
{
    // get main CodeIgniter object
	$ci = get_instance();

	$ci->db->select('*');
	$ci->db->from('asets a');
	$ci->db->join('barang b', 'b.id_barang = a.id_barang');
	$ci->db->where('status_aset', 'Aktif');
	$ci->db->where('Kondisi', $where);
	$query = $ci->db->get();

	$val = $query->num_rows();

	if($val == 0){
		return '-';
	} else {
		return $val;
	}
}

if (!function_exists('format_date_for_mysql')) {
    function format_date_for_mysql($date_str) {
        // Pisahkan tanggal dan bulan
        list($day, $month, $year) = explode(' ', $date_str);

        // Array untuk mapping nama bulan dalam bahasa Indonesia ke bahasa Inggris
        $indonesian_months = array(
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );

        // Array untuk mapping nama bulan dalam bahasa Inggris ke bahasa Indonesia
        $english_months = array(
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        );

        // Cari index bulan dalam bahasa Indonesia
        $indonesian_month_index = array_search($month, $indonesian_months);
        
        if ($indonesian_month_index !== false) {
            // Jika nama bulan dalam bahasa Indonesia ditemukan
            // Ganti dengan nama bulan dalam bahasa Inggris
            $month = $english_months[$indonesian_month_index];
        }

        // Gabungkan kembali tanggal, bulan, dan tahun
        $formatted_date = "$day $month $year";

        // Convert the date string to a DateTime object with a specific format
        $formatted_date = DateTime::createFromFormat('d F Y', $formatted_date);

        if ($formatted_date === false) {
            // Penanganan kesalahan jika gagal mengurai tanggal
            return false;
        }

        // Format the date in the MySQL-compatible format (Y-m-d)
        return $formatted_date->format('Y-m-d');
    }
}

if (!function_exists('clean_currency')) {
	function clean_currency($currency_str) {
		// Hapus tanda ","
		$cleaned_str = str_replace(',', '', $currency_str);
		
		// Hapus ".00" jika ada
		$cleaned_str = str_replace('.00', '', $cleaned_str);
		
		return $cleaned_str;
	}
}


if (!function_exists('format_currency')) {
	function format_currency($amount) {
		// Menggunakan number_format untuk menambahkan tanda koma dan dua angka desimal
		if($amount == ''){
			@$data = '';
		}else{
			@$data = @number_format($amount, 2, '.', ',');
		}
		return @$data;
	}
}

?>