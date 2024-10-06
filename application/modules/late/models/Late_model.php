<?php
class Late_model extends CI_Model
{
    public function getData()
    {
        return $this->db->select('lo.*, us.first_name, us.username, us.email, ne.name as needs_name, co.name as course_name')
            ->from('loans as lo')
            ->join('users as us', 'lo.user_id = us.user_id')
            ->join('needs as ne', 'lo.need_id = ne.id')
            ->join('courses as co', 'lo.course_id = co.id')
            ->where('lo.status="late"')
            ->order_by('id', 'DESC')
            ->get()->result();
    }

    public function getDataBy($id)
    {
        return $this->db->select('lo.*, us.first_name, us.username, us.email, ne.name as needs_name, co.name as course_name')
            ->from('loans as lo')
            ->join('users as us', 'lo.user_id = us.user_id')
            ->join('needs as ne', 'lo.need_id = ne.id')
            ->join('courses as co', 'lo.course_id = co.id')
            ->where('lo.status="late"')
            ->where('lo.user_id=' . $id)
            ->order_by('id', 'DESC')
            ->get()->result();
    }
}