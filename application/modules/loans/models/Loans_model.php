<?php
class Loans_model extends CI_Model
{
    public function getLoans()
    {
        return $this->db->select('*')->from('loans')->order_by('id', 'DESC')->get()->result();
    }

    public function dataEquipment()
    {
        return $this->db->select('*')->from('equipment')->where('is_active', 1)->get()->result();
    }
}