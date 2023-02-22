<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class DataRegion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("DataRegion_model");
    }

    public function index(){

    }

    public function conv_json($jose=''){
        $nt = array('result' => $jose);
        echo json_encode($nt);
    }

    public function getProvince()
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataregion->getProvince($id);
        $this->conv_json($data);
    }

    public function getProvinces()
    {
        $data = $this->dataregion->getProvinces();
        $this->conv_json($data);
    }

    public function getCity()
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataregion->getCity($id);
        $this->conv_json($data);
    }

    public function getCities_by()
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataregion->getCities_by($id);
        $this->conv_json($data);
    }

    public function getSubdistrict()
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataregion->getSubdistrict($id);
        $this->conv_json($data);
    }

    public function getSubdistricts_by()
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataregion->getSubdistricts_by($id);
        $this->conv_json($data);
    }

    public function getVillage()
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataregion->getVillage($id);
        $this->conv_json($data);
    }

    public function getVillages_by($sub=0)
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataregion->getVillage_by($id);
        $this->conv_json($data);
    }

    public function getPostcodes($id=0)
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataregion->getPostcodes($id);
        $this->conv_json($data);
    }
}