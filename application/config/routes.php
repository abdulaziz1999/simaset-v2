<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login/index';
$route['404_override'] = 'Welcome/halaman_notFound';
$route['translate_uri_dashes'] = FALSE;

//Auth
$route['login'] = 'Login/index';
$route['proses_login'] = 'Login/proses_login';
$route['logout'] = 'Login/proses_logout';

//Front
$route['aset/detail/(:any)'] = 'Welcome/detailAset/(:any)';
$route['detail-inventory/(:any)'] = 'Welcome/show/(:any)';

//Guest
$route['guest'] = 'Welcome/guest';
$route['guest/(:any)'] = 'Welcome/detail_inventory/(:any)';

//Dashboard
$route['home']                              = 'Home/index';
$route['dashboard']                         = 'Dashboard/index';
$route['berita_acara']                      = 'Berita_acara/index';
$route['qr_code']                           = 'Qr_code/index';
$route['print_berita']                      = 'Print_berita/index';
$route['berita_acara/import']               = 'Berita_acara/import';
$route['berita_acara/upload_file']          = 'Berita_acara/upload_file';
$route['berita_acara/upload/(:any)']        = 'Berita_acara/upload';
$route['berita_acara/saveberita']           = 'Berita_acara/save_berita';
$route['berita_acara/savebarang/(:any)']    = 'Berita_acara/save_barang/(:any)';
$route['berita_acara/updateberita']         = 'Berita_acara/update_berita';
$route['detail-print/(:any)']               = 'Berita_acara/print/(:any)';
$route['detail-barang/(:any)']              = 'Welcome/detail_barang/(:any)';
$route['berita_acara/uploadFotoBarang']     = 'Berita_acara/upload_foto_barang';
$route['berita_acara/updatebarang']         = 'Berita_acara/update_barang';
$route['berita_acara/getDetailBarang']      = 'Berita_acara/get_detail_barang';
$route['berita_acara/hapusbarang/(:any)']   = 'Berita_acara/hapus_barang/(:any)';
$route['berita_acara/hapusfile/(:any)']     = 'Berita_acara/hapus_file/(:any)';
$route['berita_acara/edit/(:any)']          = 'Berita_acara/edit/(:any)';
$route['berita_acara/detail/(:any)']        = 'Berita_acara/detail/(:any)';

//Statistik
$route['statistik'] = 'Statistik/index';

//Master
$route['barang'] = 'Barang/index';
$route['barang/tambah'] = 'Barang/tambahBarang';
$route['barang/simpan'] = 'Barang/simpanBarang';
$route['barang/edit/(:any)'] = 'Barang/editBarang/(:any)';
$route['barang/ubah'] = 'Barang/ubahBarang';
$route['barang/hapus/(:any)'] = 'Barang/hapusBarang/(:any)';
//Jenis Barang
$route['kategori'] = 'KategoriBarang/index';
$route['kategori/simpan'] = 'KategoriBarang/store';
$route['kategori/ubah'] = 'KategoriBarang/ubah';
$route['kategori/hapus/(:any)'] = 'KategoriBarang/hapus/(:any)';
//LokasiAset
$route['lokasi'] = 'LokasiAset/index';
$route['lokasi/simpan'] = 'LokasiAset/simpanLokasi';
$route['lokasi/ubah'] = 'LokasiAset/ubahLokasi';
$route['lokasi/hapus/(:any)'] = 'LokasiAset/hapusLokasi/(:any)';
//User
$route['users'] = 'User/users';
$route['users/tambah'] = 'User/tambahUser';
$route['users/hapus/(:any)'] = 'User/hapusUser/(:any)';
$route['pengaturan'] = 'User/pengaturan';
$route['users/ubah'] = 'User/updateUser';
$route['users/ubah_password'] = 'User/updatePassword';

//Aset
$route['aset_wujud'] = 'Aset/index';
$route['aset_wujud/tambah'] = 'Aset/tambahAset';
$route['aset_wujud/cari'] = 'Aset/cariAset';
$route['aset_wujud/simpan'] = 'Aset/simpanAset';
$route['aset_wujud/edit/(:any)'] = 'Aset/editAset/(:any)';
$route['aset_wujud/ubah'] = 'Aset/ubahAset';
$route['aset_wujud/detail/(:any)'] = 'Aset/detailAset/(:any)';
$route['aset_wujud/hapus/(:any)'] = 'Aset/hapusAset/(:any)';
$route['aset_wujud/filter'] = 'Aset/filterAset';
//Dihapuskan
$route['aset_dihapuskan'] = 'Aset/dihapuskanAset';
$route['aset_dihapuskan/detail/(:any)'] = 'Aset/detailDihapuskanAset/(:any)';
$route['aset_dihapuskan/filter'] = 'Aset/filterAsetDihapuskan';

//Keputusan Pengadaan
$route['kriteria'] = 'Pengadaan/index';
$route['spesifikasi/ubah'] = 'Pengadaan/ubahSpesifikasi';
$route['kualitas/ubah'] = 'Pengadaan/ubahKualitas';
$route['data_aset'] = 'Pengadaan/aset';
$route['data_aset/simpan'] = 'Pengadaan/simpanAset';
$route['data_aset/ubah'] = 'Pengadaan/ubahAset';
$route['data_aset/hapus/(:any)'] = 'Pengadaan/hapusAset/(:any)';
$route['penilaian/simpan'] = 'Pengadaan/simpanPenilaian';
$route['penilaian/ubah'] = 'Pengadaan/ubahPenilaian';
$route['penilaian/hapus/(:any)'] = 'Pengadaan/hapusPenilaian/(:any)';
//spk
$route['spk'] = 'Pengadaan/spk';
$route['test'] = 'Pengadaan/testpk';

//Pengadaan
$route['pengajuan'] = 'Pengadaan/pengajuan';
$route['pengadaan'] = 'Pengadaan/pengadaan';
$route['pengadaan/simpan'] = 'Pengadaan/simpanPengadaan';
$route['pengadaan/detail/(:any)'] = 'Pengadaan/detailPengadaan/(:any)';
$route['pengadaan/setujui/(:any)'] = 'Pengadaan/setujuiPengadaan/(:any)';
$route['pengadaan/tolak/(:any)'] = 'Pengadaan/tolakPengadaan/(:any)';
$route['pengadaan/hapus/(:any)'] = 'Pengadaan/hapusPengadaan/(:any)';
$route['pengadaan/filter'] = 'Pengadaan/filterPengadaan';

//Monitoring
$route['monitoring'] = 'Monitoring/index';
$route['monitoring/tambah'] = 'Monitoring/tambahMonitoring';
$route['monitoring/simpan'] = 'Monitoring/simpanMonitoring';
$route['monitoring/detail/(:any)'] = 'Monitoring/detailMonitoring/(:any)';
$route['monitoring/edit/(:any)'] = 'Monitoring/editMonitoring/(:any)';
$route['monitoring/ubah'] = 'Monitoring/ubahMonitoring';
$route['monitoring/hapus/(:any)'] = 'Monitoring/hapusMonitoring/(:any)';

//Penyusutan
$route['penyusutan'] = 'Penyusutan/index';
$route['penyusutan/detail/(:any)'] = 'Penyusutan/detailPenyusutan/(:any)';
$route['penyusutan/hapuskan/(:any)'] = 'Penyusutan/penghapusanAset/(:any)';
$route['penyusutan/filter'] = 'Penyusutan/filterPenyusutan';

//Penghapusan
$route['penghapusan'] = 'Penghapusan/index';
$route['penghapusan/simpan'] = 'Penghapusan/simpanPenghapusan';

//Laporan
//Laporan Data Aset
$route['laporan/aset'] = 'Laporan/aset';
$route['laporan/search_aset'] = 'Laporan/searchAset';
$route['laporan/print_aset/(:any)/(:any)'] = 'Laporan/printAset/(:any)/(:any)';
$route['laporan/export_aset/(:any)/(:any)'] = 'Laporan/export_aset/(:any)/(:any)';
//Laporan Penghapusan
$route['laporan/penghapusan'] = 'Laporan/penghapusan';
$route['laporan/search_penghapusan'] = 'Laporan/searchPenghapusan';
$route['laporan/print_penghapusan/(:any)/(:any)'] = 'Laporan/printPenghapusan/(:any)/(:any)';
$route['laporan/export_penghapusan/(:any)/(:any)'] = 'Laporan/export_penghapusan/(:any)/(:any)';
//Laporan QR Code
$route['laporan/qr_code'] = 'Laporan/qrcodeAset';
$route['laporan/search_qrcode'] = 'Laporan/searchQrCode';
$route['laporan/print_qrcode'] = 'Laporan/printQrcode';
//Laporan Pengadaan
$route['laporan/pengadaan'] = 'Laporan/pengadaan';
$route['laporan/search_pengadaan'] = 'Laporan/searchPengadaan';
$route['laporan/print_pengadaan/(:any)/(:any)'] = 'Laporan/printPengadaan/(:any)/(:any)';
$route['laporan/export_pengadaan/(:any)/(:any)'] = 'Laporan/export_pengadaan/(:any)/(:any)';

//Maintenance Aset
$route['inventory'] = 'Inventory/index';
$route['inventory/detail/(:any)'] = 'Inventory/show/(:any)';
$route['inventory/add'] = 'Inventory/create';
$route['store-inventory'] = 'Inventory/store';
$route['inventory/edit/(:any)'] = 'Inventory/edit/(:any)';
$route['update-inventory'] = 'Inventory/update_data';
$route['destroy-inventory/(:any)'] = 'Inventory/destroy/(:any)';
$route['print-inventory/(:any)'] = 'Inventory/print_data/(:any)';
$route['print-inventory-guest/(:any)'] = 'Welcome/print_data_guest/(:any)';

//Settingan 
$route['(:any)'] = 'errors/show_404';
$route['(:any)/(:any)'] = 'errors/show_404';
$route['(:any)/(:any)/(:any)'] = 'errors/show_404';
