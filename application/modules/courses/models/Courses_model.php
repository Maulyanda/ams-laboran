<?php
class Courses_model extends CI_Model
{
    public function getData()
    {
        return $this->db->select('*')
            ->from('courses')
            ->where('is_active=1')
            ->get()->result();
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function updateData($table, $id, $data)
    {
        return $this->db->where('id', $id)->update($table, $data);
    }
}