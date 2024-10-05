<?php
class User_model extends CI_Model
{
    public function GetDataUsers()
    {
        return $this->db->select('us.*, ro.roles_name')
            ->from('users as us')
            ->join('roles as ro', 'us.users_level = ro.idroles', 'left')
            ->get()->result();
    }

    public function GetDataRoles()
    {
        return $this->db->select('*')->from('roles')->get()->result();
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function updateUser($table, $id, $data)
    {
        return $this->db->where('user_id', $id)->update($table, $data);
    }
}