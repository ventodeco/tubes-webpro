<?php

class Pesanan_model extends CI_Model 
{
    public function create($data)
    {
        return $this->db->insert('pesanan', $data);
    }

    public function getAllPesanan(){
        return $this->db->select('*')->get('pesanan')->result();
    }

    public function getById($id){
        $query = $this->db->select('*')
                          ->where('id', $id)
                          ->get('pesanan')
                          ->row();
        return $query;
    }

    public function getLastData()
    {
        return $this->db->select("*")->limit(1)->order_by('id',"DESC")->get("pesanan")->row();
    }

    public function getDataByPesanan($userId, $pesananId)
    {
        $query = $this->db->select('*')->from('pesanan')
            ->where('user_id', $userId)
            ->where('id', $pesananId)
        ->get()->row();

        return $query;
    }

    public function updateToDibayar($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('pesanan', [
            'status' => 'dibayar'
        ]);
        return $query;
    }

    public function getDetailPesanan()
    {
        $this->db->select(
           'pesanan.id,
            pesanan.nama_penerima, 
            pesanan.alamat, 
            konfirmasi_pembayaran.tanggal_transfer,
            pesanan.nomor_hp, 
            barang.name, 
            pesanan_detail.quantity, 
            pesanan_detail.harga, 
            pesanan.status'
        );
        $this->db->from('pesanan');
        $this->db->join('pesanan_detail', 'pesanan_detail.pesanan_id = pesanan.id', 'INNER');
        $this->db->join('barang', 'pesanan_detail.barang_id = barang.id', 'INNER');
        $this->db->join('konfirmasi_pembayaran', 'konfirmasi_pembayaran.pesanan_id = pesanan.id', 'INNER');
        $query = $this->db->get()->result();

        return $query;
    }

    public function getDetailPesananById($id)
    {
        $this->db->select(
           'pesanan.id,
            pesanan.nama_penerima, 
            pesanan.alamat, 
            konfirmasi_pembayaran.tanggal_transfer,
            pesanan.nomor_hp, 
            barang.name, 
            pesanan_detail.quantity, 
            pesanan_detail.harga, 
            pesanan.status'
        );
        $this->db->from('pesanan');
        $this->db->join('pesanan_detail', 'pesanan_detail.pesanan_id = pesanan.id', 'INNER');
        $this->db->join('barang', 'pesanan_detail.barang_id = barang.id', 'INNER');
        $this->db->join('konfirmasi_pembayaran', 'konfirmasi_pembayaran.pesanan_id = pesanan.id', 'INNER');
        $this->db->where('user_id', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    public function updateStatus($status, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('pesanan', ['status' => $status]);
    }
}