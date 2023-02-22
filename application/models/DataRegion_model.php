<?php

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');

class DataRegion_model extends CI_Model
{

    /**
     * Class constructor
     *
     * @link	https://github.com/bcit-ci/CodeIgniter/issues/5332
     * @return	void
     */
    public function __construct()
    {
        $this->db_region = $this->load->database('region', TRUE);
    }

    /**
     * __get magic
     *
     * Allows models to access CI's loaded classes using the same
     * syntax as controllers.
     *
     * @param	string	$key
     */
    public function __get($key)
    {
        //  Debugging note:
        //	If you're here because you're getting an error message
        //	saying 'Undefined Property: system/core/Model.php', it's
        //	most likely a typo in your model code.
        return get_instance()->$key;
    }

    public function getProvince($id=0)
    {
        $this->db_region->select('*');
        $this->db_region->from('sasi-province');
        $this->db_region->where('ID',$id);
        $query = $this->db_region->get();

        return $query->result_array();
    }

    public function getProvinces()
    {
        $this->db_region->select('*');
        $this->db_region->from('sasi-province');
        $query = $this->db_region->get();

        return $query->result_array();
    }

    public function getCity($id=0)
    {
        $this->db_region->select('*');
        $this->db_region->from('sasi-city');
        $this->db_region->where('ID',$id);
        $query = $this->db_region->get();

        return $query->result_array();
    }

    public function getCities_by($prov=0)
    {
        $this->db_region->select('*');
        $this->db_region->from('sasi-city');
        $this->db_region->where('id_province',$prov);
        $query = $this->db_region->get();

        return $query->result_array();
    }

    public function getSubdistrict($id=0)
    {
        $this->db_region->select('*');
        $this->db_region->from('sasi-subdistrict');
        $this->db_region->where('ID',$id);
        $query = $this->db_region->get();

        return $query->result_array();
    }

    public function getSubdistricts_by($city=0)
    {
        $this->db_region->select('*');
        $this->db_region->from('sasi-subdistrict');
        $this->db_region->where('id_city',$city);
        $query = $this->db_region->get();

        return $query->result_array();
    }

    public function getVillage($id=0)
    {
        $this->db_region->select('*');
        $this->db_region->from('sasi-village');
        $this->db_region->where('ID',$id);
        $query = $this->db_region->get();

        return $query->result_array();
    }

    public function getVillages_by($sub=0)
    {
        $this->db_region->select('*');
        $this->db_region->from('sasi-village');
        $this->db_region->where('id_subdistrict',$sub);
        $query = $this->db_region->get();

        return $query->result_array();
    }

    public function getPostcodes($id=0)
    {
        $this->db_region->distinct();
        $this->db_region->select('postal_code');
        $this->db_region->from('sasi-village');
        $this->db_region->where('id_subdistrict',$id);
        $query = $this->db_region->get();

        return $query->result_array();
    }
}
