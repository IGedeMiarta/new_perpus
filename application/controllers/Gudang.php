<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('status') != "login_gudang") {
        //     $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Anda Belum Login!, Silahkan Login Terlebih dahulu</div>');
        //     redirect('login');
        // }
        $this->load->library('form_validation');
        $this->load->model('gudang_model');
        $this->load->model('dashboard');
        $this->load->model('laporan');
        $this->load->model('alert');
    }

    public function index()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['pegawai'] = $this->dashboard->_pegawai();
        $data['supplier'] = $this->dashboard->_supplier();
        $data['bahan'] = $this->dashboard->_bahan();
        $data['limit'] = $this->dashboard->_bahan_limit();
        $data['teks'] = "Halaman Gudang, Sistem Persedian Bahan Baku Kedai Kopi Gayo, Bag. Gudang dapat menambahkan data material bahan baku, menginputkan data bahan masuk dan keluar dan manajeman stok bahan baku produksi di kedai kopi umah kopi gayo";
        $data['role'] = 'Bag. Gudang';
        $data['judul'] = 'Dashboard';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('temp/dashboard', $data);
        $this->load->view('temp/footer');
    }
    public function material()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['varian'] = $this->gudang_model->material_enum('material', 'varian');
        $data['tipe'] = $this->gudang_model->material_enum('material', 'tipe');
        $data['detail'] = $this->gudang_model->material_enum('material', 'detail');
        $data['bentuk'] = $this->gudang_model->material_enum('material', 'bentuk');
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['kasir'] = $this->gudang_model->stok_kasir();
        $data['status'] = $this->alert->notifikasi();
        $data['judul'] = 'Stok Bahan';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('gudang/material', $data);
        $this->load->view('temp/footer');
    }

    public function material_add_act()
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required', [
            'is_unique' => 'Material Sudah Terdaftar'
        ]);
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['material'] = $this->gudang_model->read('material')->result();
        $data['varian'] = $this->gudang_model->material_enum('material', 'varian');
        $data['tipe'] = $this->gudang_model->material_enum('material', 'tipe');
        $data['detail'] = $this->gudang_model->material_enum('material', 'detail');
        $data['bentuk'] = $this->gudang_model->material_enum('material', 'bentuk');
        $data['status'] = $this->alert->notifikasi();
        $data['alert'] = $this->alert->notif();
        $data['judul'] = 'Tambah Bahan Baku';
        if ($this->form_validation->run() == false) {
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('gudang/material', $data);
            $this->load->view('temp/footer');
        } else {
            $nama = $this->input->post('name', true);
            $varian = $this->input->post('varian', true);
            $tipe = $this->input->post('tipe', true);
            $bentuk = $this->input->post('bentuk', true);
            $data = [
                'nama' => $nama,
                'varian' => $varian,
                'tipe' => $tipe,
                'bentuk' => $bentuk,
                'detail' => 'Gudang'
            ];
            $this->gudang_model->insert($data, 'material');
            redirect('gudang/material');
        }
    }

    public function material_edt($kd_material)
    {
        $data['varian'] = $this->gudang_model->material_enum('material', 'varian');
        $data['tipe'] = $this->gudang_model->material_enum('material', 'tipe');
        $data['detail'] = $this->gudang_model->material_enum('material', 'detail');
        $data['bentuk'] = $this->gudang_model->material_enum('material', 'bentuk');
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['kasir'] = $this->gudang_model->stok_kasir();
        $data['status'] = $this->alert->notifikasi();
        $data['judul'] = 'Edit Bahan';
        $data['edit'] = $this->gudang_model->edit(['kd_material' => $kd_material], 'material')->row_array();
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('gudang/material_edt', $data);
        $this->load->view('temp/footer');
    }

    public function material_edt_act($kd_material)
    {

        $where = array('kd_material' => $kd_material);
        $nama = $this->input->post('name', true);
        $varian = $this->input->post('varian', true);
        $tipe = $this->input->post('tipe', true);
        $bentuk = $this->input->post('bentuk', true);
        $data = [
            'nama' => $nama,
            'varian' => $varian,
            'tipe' => $tipe,
            'bentuk' => $bentuk,
            'detail' => 'Gudang'
        ];
        $this->gudang_model->update($where, $data, 'material');
        redirect('gudang/material');
    }

    public function cari()
    {
        $material = $_GET['material'];
        $cari = $this->gudang_model->stok($material);
        echo json_encode($cari);
    }

    public function material_in()
    {
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['masuk'] = $this->gudang_model->material_msk();
        $kd = $this->session->userdata('pegawai');
        $data['supplier'] = $this->gudang_model->read('supplier')->result();
        $data['user'] = $this->gudang_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $data['judul'] = 'Bahan Masuk';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('gudang/material_in', $data);
        $this->load->view('temp/footer');
    }

    public function material_in_act()
    {
        $material = $this->input->post('material', true);
        $waktu = date("Y-m-d H:i:s");
        $jml = $this->input->post('jml', true);
        $masuk = $this->input->post('masuk', true);
        $supplier = $this->input->post('supplier', true);
        $data = [
            'kd_material' => $material,
            'waktu' => $waktu,
            'kemasan' => $jml,
            'jumlah' => $masuk,
            'supplier' => $supplier,
            'detail' => 'Gudang'
        ];
        $this->gudang_model->insert($data, 'material_masuk');
        redirect('gudang/material_in');
    }

    public function material_in_edt($kd_material)
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['edit'] = $this->gudang_model->stok_gudang_edt($kd_material);
        $data['supplier'] = $this->gudang_model->read('supplier')->result();
        $data['status'] = $this->alert->notifikasi();
        $data['judul'] = 'Edit Bahan Masuk';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('gudang/material_in_edt', $data);
        $this->load->view('temp/footer');
    }
    public function material_update($kd_masuk)
    {
        $material = $this->input->post('material', true);
        $waktu = date("Y-m-d H:i:s");
        $jml = $this->input->post('kemasan', true);
        $masuk = $this->input->post('masuk', true);
        $supplier = $this->input->post('supplier', true);
        $data = [
            'kd_material' => $material,
            'waktu' => $waktu,
            'kemasan' => $jml,
            'jumlah' => $masuk,
            'supplier' => $supplier,
            'detail' => 'Gudang'
        ];


        $where = array('kd_masuk' => $kd_masuk);

        $this->gudang_model->update($where, $data, 'material_masuk');
        redirect('gudang/material_in');
    }

    public function material_in_del($kd_material)
    {
        $where = array('kd_masuk' => $kd_material);
        $this->gudang_model->delete($where, 'material_masuk');
        redirect('gudang/material_in');
    }

    public function material_out()
    {
        $data['alert'] = $this->alert->notif();
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['masuk'] = $this->gudang_model->material_out();
        $data['status'] = $this->alert->notifikasi();
        $data['judul'] = 'Bahan Keluar';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('gudang/material_out', $data);
        $this->load->view('temp/footer');
    }

    public function material_out_edt($kd)
    {
        $data['judul'] = 'Edit Material Keluar';
        $data['out'] = $this->gudang_model->edit_out($kd);
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('gudang/material_out_edt', $data);
        $this->load->view('temp/footer');
    }
    public function material_out_act()
    {
        $this->form_validation->set_rules('keluar', 'Keluar', 'trim|required|is_natural');

        if ($this->form_validation->run() == false) {
            $data['material'] = $this->gudang_model->stok_gudang();
            $data['masuk'] = $this->gudang_model->material_out();
            $data['judul'] = 'Bahan Keluar';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('gudang/material_out', $data);
            $this->load->view('temp/footer');
        } else {
            $material = $this->input->post('material', true);
            $waktu = date("Y-m-d H:i:s");
            $jumlah = $this->input->post('jumlah', true);
            $keluar =  $this->input->post('keluar', true);
            $kemasan = $jumlah * $keluar;
            if ($jumlah >= $keluar) {
                $data = [
                    'kd_material' => $material,
                    'waktu' => $waktu,
                    'jumlah' => $keluar,
                    'kemasan' => $kemasan,
                    'detail' => 'Gudang',
                    'status' => 1
                ];
                $this->gudang_model->insert($data, 'material_keluar');
                redirect('gudang/material_out');
            } else {
                $this->session->set_flashdata('messege', '<script language="javascript">alert("Jumlah Yang Dimasukan Melebihi Stok!!!")</script>');
                $this->material_out();
            }
        }
    }
    public function material_out_del($kd_keluar)
    {
        $this->gudang_model->delete(['kd_keluar' => $kd_keluar], 'material_keluar');
        redirect('gudang/material_out');
    }
    // =============================================================================================


    function lap_material()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            $data['masuk'] = $this->laporan->mtrl_masuk($mulai, $sampai);
        } else {
            $data['masuk'] = $this->laporan->m_masuk();
        }
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $data['judul'] = "Laporan Bahan";
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('laporan/lap_mtrl_masuk', $data);
        $this->load->view('temp/footer');
    }

    function mtrl_print()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['masuk'] = $this->laporan->mtrl_masuk($mulai, $sampai);

            $this->load->view('laporan/cetak/mtrl_masuk_cetak', $data);
        } else {
            redirect('gudang/lap_material');
        }
    }

    function lap_material_out()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            $data['masuk'] = $this->laporan->keluar($mulai, $sampai);
        } else {
            $data['masuk'] = $this->laporan->mtrl_keluar();
        }
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $data['judul'] = "Lap. Bahan Keluar";
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('laporan/lap_mtrl_keluar', $data);
        $this->load->view('temp/footer');
    }

    function mtrl_out_print()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
            $kd = $this->session->userdata('pegawai');
            $data['user'] = $this->gudang_model->user($kd);
            $data['masuk'] = $this->laporan->keluar($mulai, $sampai);

            $this->load->view('laporan/cetak/mtrl_keluar_cetak', $data);
        } else {
            redirect('gudang/lap_material');
        }
    }
}
