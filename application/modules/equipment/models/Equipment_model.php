<?php
class Equipment_model extends CI_Model
{
    public function GetDataEquipment()
    {
        return $this->db->select('eq.*, ct.name as categories_name')
            ->from('equipment as eq')
            ->join('categories as ct', 'eq.categories_id=ct.id')
            ->where('eq.is_active=1')
            ->get()->result();
    }

    public function check($tabel, $field, $data)
    {
        return $this->db->select('*')->from($tabel)->where($field, $data)->order_by('id', 'DESC')->limit(1)->get()->result();
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function updateData($table, $id, $data)
    {
        return $this->db->where('id', $id)->update($table, $data);
    }

    function DeleteData($table, $id, $data)
    {
        return $this->db->where('id', $id)->update($table, $data);
    }

    public function GetDataCategory()
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('is_active=1');
        return $this->db->get()->result();
    }
}