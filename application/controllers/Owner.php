<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login_admin") {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Anda Belum Login!, Silahkan Login Terlebih dahulu</div>');
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('Pemilik');
        $this->load->model('dashboard');
        $this->load->model('laporan');
        $this->load->model('alert');
        $this->load->model('gudang_model');
    }

    public function index()
    {
        $data['pegawai'] = $this->dashboard->_pegawai();
        $data['supplier'] = $this->dashboard->_supplier();
        // $data['produk'] = $this->dashboard->_produk();
        // $data['jual'] = $this->dashboard->_selling();
        // $data['terjual'] = $this->dashboard->_sell();
        // $data['status'] = $this->alert->notifikasi();
        $data['teks'] = "Halaman Administrator Sistem Persedian Bahan Baku Gudang Kopi Gayo, admin dapat menambah pegawai dengan menginputkan data pegawai, mendaftarkan pegawai sebagai user untuk dapat login ke sistem sebagai Bag. kasir atau Bag. Gudang, dan dapat menambah data supplier";
        $data['role'] = 'Owner | Administrator';
        $data['judul'] = 'Dashboard';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('temp/dashboard', $data);
        $this->load->view('temp/footer');
    }

    public function supplier()
    {
        $data['supplier'] = $this->Pemilik->read('supplier')->result();
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $data['judul'] = 'Supplier';
        // $this->load->view('default/header');
        // $this->load->view('default/sidebar', $data);
        // $this->load->view('default/topbar', $data);
        // $this->load->view('owner/supplier', $data);
        // $this->load->view('default/footer');
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('owner/supplier', $data);
        $this->load->view('temp/footer');
    }

    public function supplier_add()
    {
        $data['status'] = $this->alert->notifikasi();
        $data['alert'] = $this->alert->notif();
        $data['judul'] = 'Tambah Supplier';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('owner/supplier_add', $data);
        $this->load->view('temp/footer');
    }

    public function supplier_add_act()
    {
        $this->form_validation->set_rules('sup_name', 'Sup_name', 'trim|required');
        $this->form_validation->set_rules('owner', 'Owner', 'trim|required');
        $this->form_validation->set_rules('hp', 'Hp', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['status'] = $this->alert->notifikasi();
            $data['alert'] = $this->alert->notif();
            $data['judul'] = 'Tambah Supplier';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('owner/supplier_add', $data);
            $this->load->view('temp/footer');
        } else {
            //validasi sukses
            $nama_sup = $this->input->post('sup_name', true);
            $owner = $this->input->post('owner', true);
            $no_hp = $this->input->post('hp', true);
            $alamat = $this->input->post('alamat', true);
            $data = [
                'nama_sup' => $nama_sup,
                'owner' => $owner,
                'no_hp' => $no_hp,
                'alamat' => $alamat
            ];

            $this->Pemilik->insert($data, 'supplier');
            redirect('owner/supplier');
        }
    }

    public function supplier_edt($id_sup)
    {
        $data['judul'] = 'Edit Supplier';
        $data['status'] = $this->alert->notifikasi();
        $data['supplier'] = $this->Pemilik->edit(['id_sup' => $id_sup], 'supplier');

        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('owner/supplier_edt', $data);
        $this->load->view('temp/footer');
    }
    public function supplier_edt_act($id_sup)
    {
        $where = array('id_sup' => $id_sup);
        $data['status'] = $this->alert->notifikasi();
        $this->form_validation->set_rules('sup_name', 'Sup_name', 'trim|required');
        $this->form_validation->set_rules('owner', 'Owner', 'trim|required');
        $this->form_validation->set_rules('hp', 'Hp', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $data['alert'] = $this->alert->notif();
        $data['judul'] = 'Edit Supplier';
        if ($this->form_validation->run() == false) {
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('owner/supplier_edt', $data);
            $this->load->view('temp/footer');
        } else {
            //validasi sukses
            $nama_sup = $this->input->post('sup_name', true);
            $owner = $this->input->post('owner', true);
            $no_hp = $this->input->post('hp', true);
            $alamat = $this->input->post('alamat', true);
            $data = [
                'nama_sup' => $nama_sup,
                'owner' => $owner,
                'no_hp' => $no_hp,
                'alamat' => $alamat
            ];

            $this->Pemilik->update($where, $data, 'supplier');
            redirect('owner/supplier');
        }
    }
    public function supplier_del($id_sup)
    {
        $where = array('id_sup' => $id_sup);
        $this->Pemilik->delete($where, 'supplier');
        redirect('owner/supplier');
    }
    // =====================================  end supplier =========================================================

    public function pegawai()
    {
        $data['judul'] = 'Pegawai';
        $data['pegawai'] = $this->Pemilik->_pegawai();
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('owner/pegawai', $data);
        $this->load->view('temp/footer');
    }
    public function pegawai_add()
    {
        $data['judul'] = 'Tambah Pegawai';
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('owner/pegawai_add');
        $this->load->view('temp/footer');
    }
    public function pegawai_add_act()
    {
        $nama = $this->input->post('name', true);
        $jenkel = $this->input->post('jenkel', true);
        $tgl_lahir = $this->input->post('tgl', true);
        $no_hp = $this->input->post('hp', true);
        $alamat = $this->input->post('alamat', true);
        $desk = $this->input->post('desk', true);
        $data = [
            'nama' => $nama,
            'jenkel' => $jenkel,
            'tgl_lahir' => $tgl_lahir,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'role' => 2
        ];

        $this->Pemilik->insert($data, 'pegawai');
        redirect('owner/pegawai');
    }
    public function pegawai_edt($id_pegawai)
    {
        $where = array('id_pegawai' => $id_pegawai);
        $data['pegawai'] = $this->Pemilik->edit($where, 'pegawai');
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $data['judul'] = 'Edit Pegawai';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('owner/pegawai_edt');
        $this->load->view('temp/footer');
    }

    public function pegawai_edt_act($id_pegawai)
    {

        $where = array('id_pegawai' => $id_pegawai);
        $nama = $this->input->post('name', true);
        $jenkel = $this->input->post('jenkel', true);
        $tgl_lahir = $this->input->post('tgl', true);
        $no_hp = $this->input->post('hp', true);
        $alamat = $this->input->post('alamat', true);
        // $desk = $this->input->post('desk', true);
        $data = [
            'nama' => $nama,
            'jenkel' => $jenkel,
            'tgl_lahir' => $tgl_lahir,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            // 'role' => $desk
        ];

        $this->Pemilik->update($where, $data, 'pegawai');
        redirect('owner/pegawai');
    }

    public function pegawai_del($id_pegawai)
    {
        $pegawai = $this->Pemilik->del_pegawai($id_pegawai);
        if ($pegawai['user'] == 'null') {
            $where = array('id_pegawai' => $id_pegawai);
            $this->Pemilik->delete($where, 'pegawai');
            $data['akun'] = 'hapus akun != null';
        } else {
            $user = $pegawai['id_user'];
            $this->Pemilik->delete(['id' => $user], 'user');
            $where = array('id_pegawai' => $id_pegawai);
            $data['akun'] = 'hapus akun != null';
            $this->Pemilik->delete($where, 'pegawai');
        }

        redirect('owner/pegawai');
    }

    public function regist($id_pegawai)
    {
        $data['judul'] = 'registrasi Anggota';
        $where = array('id_pegawai' => $id_pegawai);
        $data['pegawai'] = $this->Pemilik->edit($where, 'pegawai');
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $data['judul'] = 'Buat User';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('owner/regist', $data);
        $this->load->view('temp/footer');
    }

    public function regist_act($id_pegawai)
    {
        $pegawai = $id_pegawai;
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdatar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password doesnt match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $where = array('id_pegawai' => $id_pegawai);
            $data['pegawai'] = $this->Pemilik->edit($where, 'pegawai');
            $data['alert'] = $this->alert->notif();
            $data['status'] = $this->alert->notifikasi();
            $data['judul'] = 'registrasi Anggota';
            $this->load->view('default/header');
            $this->load->view('default/sidebar', $data);
            $this->load->view('default/topbar', $data);
            $this->load->view('owner/regist', $data);
            $this->load->view('default/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_pegawai' => $pegawai,
                'role' => 2
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Akun Sudah dibuat!</div>');
            redirect('owner/pegawai');
        }
    }
    public function produk()
    {
        $data['alert'] = $this->alert->notif();
        $data['product'] = $this->Pemilik->data_product();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('owner/produk', $data);
        $this->load->view('default/footer');
    }
    public function material()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['varian'] = $this->gudang_model->material_enum('material', 'varian');
        $data['tipe'] = $this->gudang_model->material_enum('material', 'tipe');
        $data['detail'] = $this->gudang_model->material_enum('material', 'detail');
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

    // =======================================================================================
    // ==================================== LAPORAN ==========================================
    // =======================================================================================

    function lap_material()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            $data['masuk'] = $this->laporan->mtrl_masuk($mulai, $sampai);
        } else {
            $data['masuk'] = $this->laporan->m_masuk();
        }
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('laporan/lap_mtrl_masuk', $data);
        $this->load->view('default/footer');
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
            redirect('owner/lap_material');
        }
    }
    function lap_stok()
    {
        $data['status'] = $this->alert->notifikasi();
        $data['alert'] = $this->alert->notif();
        $data['stok'] = $this->laporan->stok_gudang();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('laporan/lap_stok', $data);
        $this->load->view('default/footer');
    }
    function lap_stok_cetak()
    {
        $data['status'] = $this->alert->notifikasi();
        $data['alert'] = $this->alert->notif();
        $data['stok'] = $this->laporan->stok_gudang();
        $this->load->view('laporan/cetak/lap_stok', $data);
    }

    function lap_produk()
    {
        $data['status'] = $this->alert->notifikasi();
        $data['alert'] = $this->alert->notif();
        $data['produk'] = $this->laporan->produk();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('laporan/lap_produk', $data);
        $this->load->view('default/footer');
    }
    function lap_produk_cetak()
    {
        $data['produk'] = $this->laporan->produk();
        $this->load->view('laporan/cetak/lap_produk_cetak', $data);
    }

    function lap_penjualan()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            $data['penjualan'] = $this->laporan->penjualan_str($mulai, $sampai);
        } else {
            $data['penjualan'] = $this->laporan->penjualan();
        }
        $data['status'] = $this->alert->notifikasi();
        $data['alert'] = $this->alert->notif();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('laporan/lap_penjualan', $data);
        $this->load->view('default/footer');
    }

    function penjualan_print()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['penjualan'] = $this->laporan->penjualan_str($mulai, $sampai);

            $this->load->view('laporan/cetak/penjualan_cetak', $data);
        } else {
            redirect('owner/lap_material');
        }
    }
}
