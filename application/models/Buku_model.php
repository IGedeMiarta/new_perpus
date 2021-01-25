<?php

class Buku_model extends CI_Model
{
    function databuku()
    {
        return $this->db->query("SELECT * FROM buku,pengarang,penerbit,kategori WHERE buku.pengarang=pengarang.kd_pengarang AND buku.penerbit=penerbit.kd_penerbit AND buku.kategori=kategori.id_kategori")->result();
    }
    function kategori_buku()
    {
        return $this->db->query("SELECT * FROM kategori")->result();
    }
    function penerbit()
    {
        return $this->db->query("SELECT * FROM penerbit")->result();
    }
    function read($table)
    {
        return $this->db->get($table)->result();
    }

    function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function edit($where, $table)
    {
        return $this->db->get_where($table, $where)->row_array();
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }
    function buku($id)
    {
        return $this->db->query("SELECT * FROM buku,pengarang,penerbit,kategori WHERE buku.pengarang=pengarang.kd_pengarang AND buku.penerbit=penerbit.kd_penerbit AND buku.kategori=kategori.id_kategori AND buku.id=$id")->row_array();
    }
    function detail_buku($kd)
    {
        return $this->db->query("SELECT  detail_buku.kd_detail,buku.kd_buku,buku.judul,buku.th_terbit,pengarang.nama_pengarang,penerbit.nama_penerbit,kategori.nama_kategori,detail_buku.kd_detail,rak.nama_rak,rak.detail,detail_buku.status AS status_buku FROM buku,pengarang,penerbit,kategori,detail_buku,rak WHERE buku.kd_buku=detail_buku.kd_buku AND buku.pengarang=pengarang.kd_pengarang AND buku.penerbit=penerbit.kd_penerbit   AND buku.kategori=kategori.id_kategori AND buku.pengarang=pengarang.kd_pengarang AND buku.penerbit=penerbit.kd_penerbit AND detail_buku.rak=rak.id_rak AND detail_buku.kd_buku='$kd'")->result();
    }

    function cekidbuku()
    {
        $query = $this->db->query("SELECT MAX(kd_buku) as id_buku from buku"); //
        $data = $query->row();
        $id_buku = $data->id_buku;
        $nourut = substr($id_buku, 2, 4);
        $buku = $nourut + 1;
        $kd_buku = array('id_buku' => $buku);
        return $kd_buku;
    }

    function kd_detail($id)
    {
        $detail_buku = $this->db->query("SELECT buku.id, buku.kd_buku, MAX(detail_buku.kd_detail) AS detail_buku FROM buku, detail_buku WHERE buku.kd_buku=detail_buku.kd_buku AND buku.id=$id")->row_array();
        $dariDB = $detail_buku['detail_buku'];
        $nourut = substr($dariDB, 9, 1);
        $id_detail = substr($dariDB, 0, 9);
        $_nourut = intval($nourut);
        $kdBukuNow = $_nourut + 1;
        $id_buku = $detail_buku['kd_buku'];
        if ($id_detail == '') {
            $_idDetail = $id_buku . "DTL1";
        } else {
            $_idDetail = $id_buku . "DTL" . $kdBukuNow;
        }
        return $_idDetail;
    }
    function random()
    {
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $string = '';
        for ($i = 0; $i < 6; $i++) {
            $pos = rand(0, strlen($karakter) - 1);
            $string .= $karakter{
                $pos};
        }
        return $string;
    }

    function anggota()
    {
        return $this->db->query("SELECT *,status_anggota.status AS status_anggota FROM anggota JOIN status_anggota ON anggota.status=status_anggota.id_status_anggota")->result();
    }
}
