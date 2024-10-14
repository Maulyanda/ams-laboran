<?php
class Loans_model extends CI_Model
{
    public function getLoans($id)
    {
        return $this->db->select('lo.*, us.first_name, us.username, us.email, ne.name as needs_name, co.name as course_name')
            ->from('loans as lo')
            ->join('users as us', 'lo.user_id = us.user_id')
            ->join('needs as ne', 'lo.need_id = ne.id')
            ->join('courses as co', 'lo.course_id = co.id')
            ->where('lo.user_id', $id)
            ->order_by('id', 'DESC')
            ->get()->result();
    }

    public function getLoansHistory($id)
    {
        return $this->db->select('lh.*, us.first_name')
            ->from('loans_history as lh')
            ->join('users as us', 'lh.user_id = us.user_id')
            ->where('lh.loans_id', $id)
            ->order_by('id', 'ASC')
            ->get()->result();
    }

    public function dataEquipment()
    {
        return $this->db->select('*')->from('equipment')->where('is_active', 1)->get()->result();
    }

    public function dataNeeds()
    {
        return $this->db->select('*')->from('needs')->where('is_active', 1)->get()->result();
    }

    public function dataCourses()
    {
        return $this->db->select('*')->from('courses')->where('is_active', 1)->get()->result();
    }

    public function dataEquipmentLike($searchTerm)
    {
        return $this->db->select('*')->from('equipment')->where('is_active', 1)->like('name', $searchTerm)->get()->result();
    }

    public function listEquipmentLike($searchTerm)
    {
        return $this->db->select('*')->from('equipment')->where('is_active', 1)->like('id', $searchTerm)->get()->result_array();
    }

    public function setUserName($userName)
    {
        return $this->_userName = $userName;
    }

    public function getEquipment()
    {
        $this->db->select(array('e.*'));
        $this->db->from('equipment as e');
        $this->db->where('e.is_active', 1);
        $this->db->like('UPPER (e.name)', $this->_userName, 'both');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_data($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function check($tabel, $data)
    {
        return $this->db->select('*')->from($tabel)->where('invoice', $data)->limit(1)->get()->result();
    }

    public function get_loans($id)
    {
        return $this->db->select('lo.*, us.first_name, us.username, us.email, ne.name as needs_name, co.name as course_name')
            ->from('loans as lo')
            ->join('users as us', 'lo.user_id = us.user_id')
            ->join('needs as ne', 'lo.need_id = ne.id')
            ->join('courses as co', 'lo.course_id = co.id')
            ->where('lo.id', $id)->get()->result()[0];
    }

    public function detail_loans($id)
    {
        return $this->db->select('li.*, eq.code, eq.name')
            ->from('loans_item as li')
            ->join('equipment as eq', 'li.equipment_id = eq.id')
            ->where('li.loans_id', $id)->get()->result();
    }
}