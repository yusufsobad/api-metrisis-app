<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class AndroidDataAnak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dataanak_model");

    }

    public function index(){

    }

    public function daftarSemuaAnak(){
        $post = $this->input->post();
        $data = $this->dataanak_model;
        $jose = $data->getDaftarAnak();
        $nt = array('result' => $jose);
        echo json_encode($nt);
    }

    public function sortirNamaAnak(){
        $post = $this->input->post();
        $data = $this->dataanak_model;
        $jose = $data->getSortirNama($post["Namane"]);
        $nt = array('result' => $jose);
        echo json_encode($nt);
    }

    public function detailDataAnak(){
        $post = $this->input->post();
        $data = $this->dataanak_model;
        $jose = $data->getNamaByNIK($post["nik"]);
        $nt = array('result' => $jose);
        echo json_encode($nt);
    }

    public function tambahDataAnak(){
        $post = $this->input->post();
        $data = $this->dataanak_model;
        $varine = array(
            'NIK_Anak' => $post["NIK"],
            'Nama_Anak' => $post["Nama"],
            'Tanggal_Lahir' => $post["TTL"],
            'Berat_Lahir' => $post["BBLahir"],
            'Nama_Ortu' => $post["Ortu"], 
            'No_KK' => $post["Kaka"], 
            'Jenis_Kelamin' => $post["Gender"], 
            'Provinsi' => $post["Provinsi"], 
            'Kab_Kota' => $post["Kota"], 
            'Kecamatan' => $post["Kecamatan"], 
            'Desa_Kelurahan' => $post["Kelurahan"], 
            'Kode_Pos' => $post["KodePos"], 
            'Alamat' => $post["Alamat"], 
        );
        $jose = $data->insertDataAnak($varine);
        echo json_encode($jose);
    } 


    public function penggunaanAplikasi(){
        $post = $this->input->post();
        $data = $this->dataanak_model;
        $jose = $data->getCaraPenggunaan();
        $nt = array('result' => $jose);
        echo json_encode($nt);
    }

    public function hapusDataAnak(){
        $post = $this->input->post();
        $data = $this->dataanak_model;
        $varine = array(
            'No_ID' => $post["idne"],
        );
        $jose = $data->deleteDataAnak($varine);
        echo json_encode($jose);
    } 

    public function ubahDataAnak(){
        $post = $this->input->post();
        $data = $this->dataanak_model;
        $varine = array(
            'NIK_Anak' => $post["NIK"],
            'Nama_Anak' => $post["Nama"],
            'Tanggal_Lahir' => $post["TTL"],
            'Berat_Lahir' => $post["BBLahir"],
            'Nama_Ortu' => $post["Ortu"], 
            'No_KK' => $post["Kaka"], 
            'Jenis_Kelamin' => $post["Gender"], 
            'Provinsi' => $post["Provinsi"], 
            'Kab_Kota' => $post["Kota"], 
            'Kecamatan' => $post["Kecamatan"], 
            'Desa_Kelurahan' => $post["Kelurahan"], 
            'Kode_Pos' => $post["KodePos"], 
            'Alamat' => $post["Alamat"], 
        );

        $syarate = array(
            'No_ID' => $post["idne"],
        );
        $jose = $data->editDataAnak($syarate,$varine);
        echo json_encode($jose);
    } 

}