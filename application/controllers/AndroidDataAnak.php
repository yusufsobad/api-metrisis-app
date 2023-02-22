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

    public function penggunaanAplikasi(){
        $post = $this->input->post();
        $data = $this->dataanak_model;
        $jose = $data->getCaraPenggunaan();
        $nt = array('result' => $jose);
        echo json_encode($nt);
    }



}