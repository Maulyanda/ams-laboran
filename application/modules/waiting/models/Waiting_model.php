<?php
class Waiting_model extends CI_Model
{
    public function getData()
    {
        return $this->db->select('lo.*, us.first_name, us.username, us.email, ne.name as needs_name, co.name as course_name')
            ->from('loans as lo')
            ->join('users as us', 'lo.user_id = us.user_id')
            ->join('needs as ne', 'lo.need_id = ne.id')
            ->join('courses as co', 'lo.course_id = co.id')
            ->where('lo.status="approved"')
            ->order_by('id', 'ASC')
            ->get()->result();
    }

    public function getDataBy($id)
    {
        return $this->db->select('lo.*, us.first_name, us.username, us.email, ne.name as needs_name, co.name as course_name')
            ->from('loans as lo')
            ->join('users as us', 'lo.user_id = us.user_id')
            ->join('needs as ne', 'lo.need_id = ne.id')
            ->join('courses as co', 'lo.course_id = co.id')
            ->where('lo.status="approved"')
            ->where('lo.user_id=' . $id)
            ->order_by('id', 'DESC')
            ->get()->result();
    }

    public function detail_loans($id)
    {
        return $this->db->select('*')
            ->from('loans_item')
            ->where('loans_id=', $id)
            ->get()->result();
    }

    public function getEquipment($id)
    {
        return $this->db->select('*')
            ->from('equipment')
            ->where('id=', $id)
            ->get()->result()[0];
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