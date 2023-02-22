<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Produk_model extends CI_Model
{

    function kodeProduk(){
        $query = $this->db->query("select max(Kode_Barang) as maxKode from daftar_produk");
        $tmp = $query->row();
        $kodeBarang = $tmp->maxKode;
        $noUrut = (int) substr($kodeBarang, 7, 6);	
        $noUrut++;
        $char = "BL/PDK/";
        $noNota = $char . sprintf("%06s", $noUrut);	
        return $noNota;
    }

    
    function getDetailByKode($kode){
        $datane = array();
        $gambare = array();
        $ulasane = array();
        $variane = array();

        $this->db->where('Kode_Barang', $kode);
        $this->db->group_by('Kode_Barang');
        $query = $this->db->get('daftar_produk');
        if($query->num_rows()>0){
            $item['Judul_Barang'] = $query->row()->Judul_Barang;
            $item['Merek_Barang'] = $query->row()->Merek_Barang;
            $item['Umur_Simpan'] = $query->row()->Umur_Simpan;
            $item['Diskripsi_Barang'] = $query->row()->Diskripsi_Barang;

            //================== baca informasi penjual ===========================
            $this->db->where('Kode_Penjual', $query->row()->Kode_Toko);
            $queryToko = $this->db->get('daftar_penjual');
            if($queryToko->num_rows()>0){
                $item['Nama_Usaha'] = $queryToko->row()->Nama_Usaha;
            }

            $this->db->select('Count(No_ID) As jumlahe');
            $this->db->where('Kode_Toko', $query->row()->Kode_Toko);
            $this->db->group_by('Kode_Barang');
            $queryJmlProdukToko = $this->db->get('daftar_produk');
            $item['Jumlah_Produk'] = $queryJmlProdukToko->row()->jumlahe;

            $this->db->select('AVG(Rating_Penilaian) As ratingToko');
            $this->db->where('Kode_Penjual', $query->row()->Kode_Toko);
            $this->db->group_by('Kode_Penjual');
            $queryRatingToko = $this->db->get('daftar_penilaian');
            $item['Rating_Toko'] = $queryRatingToko->row()->ratingToko;


            //================== baca galeri produk ===========================

            
            $this->db->select('AVG(Rating_Penilaian) As ratingProduk');
            $this->db->where('Kode_Barang', $kode);
            $this->db->group_by('Kode_Barang');
            $queryRatingProduk = $this->db->get('daftar_penilaian');
            $item['Rating_Produk'] = $queryRatingProduk->row()->ratingProduk;

            $syaratnya = array('Kode_Barang' => $kode,);
            $this->db->where($syaratnya);
            $bufGambarBarang = $this->db->get('daftar_gambar_produk');
            foreach ($bufGambarBarang->result() as $row2)
            {
                $item2['Gambar_Barang'] = $row2->Gambar_Barang;
                $gambare[] = $item2;
                $tidak = array('detaile' => $gambare);
            }
            $item['Gambare'] = $tidak;


            //================== baca ulasan produk ===========================
            $this->db->select('Count(No_ID) As jumlahe');
            $this->db->where($syaratnya);
            $bufJumlahUlasanBarang = $this->db->get('daftar_penilaian');
            $item['Jumlah_Ulasan'] = $bufJumlahUlasanBarang->row()->jumlahe;

            $this->db->where($syaratnya);
            $this->db->order_by('Tanggal_Penilaian','DESC');
            $this->db->limit(2);
            $bufUlasanBarang = $this->db->get('daftar_penilaian');
            foreach ($bufUlasanBarang->result() as $row3)
            {
                $item3['Nama_Pembeli'] = $row3->Kode_Pembeli;
                $item3['Rating_Produk'] = $row3->Rating_Penilaian;
                $item3['Keterangan'] = $row3->Keterangan;
                $item3["Waktu"] = $row3->Tanggal_Penilaian . " " . $row3->Jam_Penilaian;
                $ulasane[] = $item3;
                $tidak2 = array('detaile' => $ulasane);
            }
            $item['Ulasane'] = $tidak2;

            $this->db->where($syaratnya);
            $this->db->limit(4);
            $bufVarianBarang = $this->db->get('varian_produk');
            foreach ($bufVarianBarang->result() as $row4)
            {
                $item4['Gambar_Varian'] = $row4->Gambar_Varian;
                $variane[] = $item4;
                $tidak3 = array('detaile' => $variane);
            }
            $item['Variane'] = $tidak3;
            $datane[] = $item;   

        }

        return $datane;
    }

    

}