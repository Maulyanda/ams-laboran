<?php
class Info_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_informations()
    {
        $this->db->select('*');
        $this->db->from('informations');
        return $this->db->get()->result();
    }
}
