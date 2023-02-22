<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Dataanak_model extends CI_Model
{

    function getDaftarAnak(){
        return $this->db->get('list_akun')->result();
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