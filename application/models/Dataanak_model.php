<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Dataanak_model extends CI_Model
{

    function getDaftarAnak(){
        return $this->db->get('list_akun')->result();
    }

    function insertDataAnak($datane){
        $kueri = $this->db->insert('list_akun', $datane);
        if($kueri){
            return "sukses";
        }
        else{
            return "gagal";
        }
    }

    function deleteDataAnak($datane){
        $this->db->where($datane);
        $kueri = $this->db->delete('list_akun');
        if($kueri){
            $status = "sukses";
        }
        else{
            $status = "gagal";
        }
        return $status;
    }

    function editDataAnak($syrt,$datane){
        $this->db->set($datane);
        $this->db->where($syrt);
        $kueri = $this->db->update('list_akun');
        if($kueri){
            $status = "sukses";
        }
        else{
            $status = "gagal";
        }
        return $status;
    }


    
    function getSortirNama($nile){
        $this->db->like('Nama_Anak', $nile);
        $this->db->order_by('Nama_Anak','ASC');
        return $this->db->get('list_akun')->result();
    }

    function getNamaByNIK($nile){
        $this->db->where('NIK_Anak', $nile);
        return $this->db->get('list_akun')->result();
    }

    function getCaraPenggunaan(){
        return $this->db->get('cara_penggunaan')->result();
    }




}