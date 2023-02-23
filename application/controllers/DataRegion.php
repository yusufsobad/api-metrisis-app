<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class DataRegion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dataRegion_model");
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

        $data = $this->dataRegion_model->getProvince($id);
        $this->conv_json($data);
    }

    public function getProvinces()
    {
        $data = $this->dataRegion_model->getProvinces();
        $this->conv_json($data);
    }

    public function getCity()
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataRegion_model->getCity($id);
        $this->conv_json($data);
    }

    public function getCities_by()
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataRegion_model->getCities_by($id);
        $this->conv_json($data);
    }

    public function getSubdistrict()
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataRegion_model->getSubdistrict($id);
        $this->conv_json($data);
    }

    public function getSubdistricts_by()
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataRegion_model->getSubdistricts_by($id);
        $this->conv_json($data);
    }

    public function getVillage()
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataRegion_model->getVillage($id);
        $this->conv_json($data);
    }

    public function getVillages_by($sub=0)
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataRegion_model->getVillages_by($id);
        $this->conv_json($data);
    }

    public function getPostcodes($id=0)
    {
        $id = $this->input->get('id', TRUE);

        $data = $this->dataRegion_model->getPostcodes($id);
        $this->conv_json($data);
    }
}