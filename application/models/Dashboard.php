<?php

class Dashboard extends CI_Model
{
    function _pegawai()
    {
        return $this->db->query("SELECT COUNT(id_pegawai) AS jml FROM pegawai")->row_array();
    }
    function _supplier()
    {
        return $this->db->query("SELECT COUNT(id_sup) as jml FROM supplier")->row_array();
    }
    function _bahan()
    {
        return $this->db->query("SELECT COUNT(kd_material) as jml FROM material WHERE detail='Gudang'")->row_array();
    }
    function _bahan_limit()
    {
        return $this->db->query("SELECT * FROM material WHERE stok <= 50 AND detail='Gudang' ORDER BY stok ASC LIMIT 1")->row_array();
    }
}
