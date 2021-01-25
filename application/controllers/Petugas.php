<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('status') != "login_gudang") {
        //     $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Anda Belum Login!, Silahkan Login Terlebih dahulu</div>');
        //     redirect('login');
        // }
        $this->load->library('form_validation');
        $this->load->model('buku_model', 'databuku');
        $this->load->model('dashboard');
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['teks'] = 'Halaman Admin perpustakaan, Petugas dapat menambah petugas perpustakaan dengan menginputkan data petugas, dan mengontrol seluruh aktifitas sistem';
        $data['role'] = 'Petugas';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('petugas/sidebar');
        $this->load->view('temp/dashboard', $data);
        $this->load->view('temp/footer');
    }
    public function buku()
    {
        $data['judul'] = 'Buku';
        $data['buku'] = $this->databuku->databuku();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('petugas/sidebar');
        $this->load->view('petugas/buku', $data);
        $this->load->view('temp/footer');
    }
    public function buku_tambah()
    {
        $data = $this->databuku->cekidbuku();
        $data['judul']  = 'Tambah Buku';
        $data['kategori'] = $this->databuku->kategori_buku();
        $data['penerbit'] = $this->databuku->penerbit();
        $data['random'] = $this->databuku->random();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('petugas/sidebar');
        $this->load->view('petugas/buku_tambah', $data);
        $this->load->view('temp/footer');
    }

    function buku_add()
    {
        $judul = $this->input->post('judul');
        $id_buku = $this->input->post('id_buku');
        $tahun = $this->input->post('tahun');
        $penulis = $this->input->post('penulis');
        $penerbit = $this->input->post('penerbit');
        $kategori = $this->input->post('kategori');
        $kd_penerbit = $this->databuku->random();
        $kd_penulis = $this->databuku->random();
        $data_pengarang = [
            'kd_pengarang' => $kd_penulis,
            'nama_pengarang' => $penulis
        ];
        $this->databuku->insert($data_pengarang, 'pengarang');
        // ======================================================================
        $data_penerbit = [
            'kd_penerbit' => $kd_penerbit,
            'nama_penerbit' => $penerbit
        ];
        $this->databuku->insert($data_penerbit, 'penerbit');
        // ======================================================================

        $data = [
            'kd_buku' => $id_buku,
            'judul' => $judul,
            'pengarang' => $kd_penulis,
            'penerbit' => $kd_penerbit,
            'th_terbit' => $tahun,
            'kategori' => $kategori
        ];
        $this->databuku->insert($data, 'buku');
        redirect('petugas/buku');
    }

    function buku_detail_add($id)
    {
        $data['buku'] = $this->databuku->edit(['id' => $id], 'buku');
        $data['judul'] = 'Detail Buku';
        $data['id_detail'] = $this->databuku->kd_detail($id);

        $data['rak'] = $this->databuku->read('rak');
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('petugas/sidebar');
        $this->load->view('petugas/buku_detail_add', $data);
        $this->load->view('temp/footer');
    }
    function buku_detail_aksi()
    {
        $kd_buku = $this->input->post('id_buku');
        $data = [
            'kd_detail' => $this->input->post('id_detail'),
            'kd_buku' => $kd_buku,
            'rak' => $this->input->post('rak'),
            'status' => 1
        ];
        $buku = ['status' => 1];
        $this->databuku->update(['kd_buku' => $kd_buku], $buku, 'buku');
        $this->databuku->insert($data, 'detail_buku');
        $buku = $this->databuku->edit(['kd_buku' => $kd_buku], 'buku');
        $id = $buku['id'];
        redirect('petugas/buku_detail/' . $id);
    }
    public function buku_detail($id)
    {
        $data['judul'] = 'Detail Buku';
        $data['buku'] = $this->databuku->buku($id);
        $buku = $this->databuku->buku($id);
        $kode = $buku['kd_buku'];
        $data['detail'] = $this->databuku->detail_buku($kode);

        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('petugas/sidebar');
        $this->load->view('petugas/buku_detail', $data);
        $this->load->view('temp/footer');
    }
    public function buku_detail_hapus($kd)
    {
        $detail = $this->databuku->edit(['kd_detail' => $kd], 'detail_buku');
        $kd_buku = $detail['kd_buku'];
        $buku = $this->databuku->edit(['kd_buku' => $kd_buku], 'buku');
        $id = $buku['id'];
        $this->databuku->delete(['kd_detail' => $kd], 'detail_buku');
        redirect('petugas/buku_detail/' . $id);
    }
    public function anggota()
    {
        $data['judul'] = 'Anggota';
        $data['anggota'] = $this->databuku->anggota();
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('petugas/sidebar');
        $this->load->view('petugas/anggota', $data);
        $this->load->view('temp/footer');
    }
    public function anggota_add()
    {
        $data['judul'] = 'Tambah Anggota';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('petugas/sidebar');
        $this->load->view('petugas/anggota_add');
        $this->load->view('temp/footer');
    }
    public function anggota_act()
    {
        $data = [
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'jenis_kel' => $this->input->post('jenkel'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('hp'),
            'status' => $this->input->post('status')
        ];

        $this->databuku->insert($data, 'anggota');
        redirect('petugas/anggota');
    }
    public function cetak_kartu($id)
    {

        $data['anggota'] = $this->databuku->edit(['id_anggota' => $id], 'anggota');

        $this->load->view('petugas/kartu', $data);
    }
    function donatur()
    {
        $data['judul'] = 'Data Donatur';
        $data['anggota'] = $this->databuku->read('donatur');
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('petugas/sidebar');
        $this->load->view('petugas/donatur', $data);
        $this->load->view('temp/footer');
    }
    function donatur_add()
    {
        $data['judul'] = 'Data Donatur';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('petugas/sidebar');
        $this->load->view('petugas/donatur_add');
        $this->load->view('temp/footer');
    }
    public function donatur_act()
    {
        $data = [
            'nama_donatur' => $this->input->post('nama'),
            'jenkel' => $this->input->post('jenkel'),
            'no_hp' => $this->input->post('hp'),
            'alamat' => $this->input->post('alamat')
        ];

        $this->databuku->insert($data, 'donatur');
        redirect('petugas/donatur');
    }
    function donatur_edt($id)
    {
        $data['judul'] = 'Edit Donatur';
        $data['dd'] = $this->databuku->edit(['id_donatur' => $id], 'donatur');
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('petugas/sidebar');
        $this->load->view('petugas/donatur_edt', $data);
        $this->load->view('temp/footer');
    }
    public function donatur_update($id)
    {
        $data = [
            'nama_donatur' => $this->input->post('nama'),
            'jenkel' => $this->input->post('jenkel'),
            'no_hp' => $this->input->post('hp'),
            'alamat' => $this->input->post('alamat')
        ];

        $this->databuku->update(['id_donatur' => $id], $data, 'donatur');
        redirect('petugas/donatur');
    }
    public function donatur_del($id)
    {
        $this->databuku->delete(['id_donatur' => $id], 'donatur');
        redirect('petugas/donatur');
    }
}
