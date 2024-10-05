<?php

class Dashboard_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getroles_permissions($roles)
    {
        $this->db->select('rp.id, rp.idroles, pg.idpermissions_group, pg.display_icon, pg.permissions_groupname, rp.status, pr.code_class, pr.code_method');
        $this->db->from('roles_permissions as rp');
        $this->db->join('permissions as pr', 'rp.idpermissions = pr.idpermissions', 'left');
        $this->db->join('permissions_group as pg', 'pg.idpermissions_group = pr.idpermissions_group', 'left');
        $this->db->where("rp.idroles = '$roles' and rp.status = '1' and pg.status = '1' and pg.group = '1'");
        $this->db->group_by('pg.idpermissions_group');
        return $this->db->get()->result();
    }

    public function getroles_permissions_config($roles)
    {
        $this->db->select('rp.id, rp.idroles, pg.idpermissions_group, pg.display_icon, pg.permissions_groupname, rp.status, pr.code_class, pr.code_method');
        $this->db->from('roles_permissions as rp');
        $this->db->join('permissions as pr', 'rp.idpermissions = pr.idpermissions', 'left');
        $this->db->join('permissions_group as pg', 'pg.idpermissions_group = pr.idpermissions_group', 'left');
        $this->db->where("rp.idroles = '$roles' and rp.status = '1' and pg.status = '1' and pg.group = '2'");
        $this->db->group_by('pg.idpermissions_group');
        return $this->db->get()->result();
    }

    public function getroles_permissions_menu($roles)
    {
        $this->db->select('rp.id, rp.idroles, pg.idpermissions_group, pg.display_icon, pg.permissions_groupname, rp.status, pr.code_class, pr.code_method');
        $this->db->from('roles_permissions as rp');
        $this->db->join('permissions as pr', 'rp.idpermissions = pr.idpermissions', 'left');
        $this->db->join('permissions_group as pg', 'pg.idpermissions_group = pr.idpermissions_group', 'left');
        $this->db->where("rp.idroles = '$roles' and rp.status = '1' and pg.status = '1' and pg.group = '3'");
        $this->db->group_by('pg.idpermissions_group');
        return $this->db->get()->result();
    }

    public function getpermissions($idpermissions_group, $user_le)
    {
        $this->db->select('pr.idpermissions, pr.idpermissions_group, pr.code_class, pr.code_method, pr.display_name, pr.code_url, pr.display_icon, pr.status');
        $this->db->from('permissions as pr');
        $this->db->join('roles_permissions as rp', 'pr.idpermissions = rp.idpermissions', 'left');
        $this->db->where("pr.idpermissions_group =  '$idpermissions_group' and rp.idroles = '$user_le' and pr.status = '1' and pr.type = 'TRUE' and rp.status='1'");

        return $this->db->get()->result();
    }

    function check_permissions($controller_name, $function_name, $user_level){
        $this->db->select("rp.id, rp.idroles,  pg.permissions_groupname, rp.status");
        $this->db->from("roles_permissions as rp");
        $this->db->join("permissions as pr"," pr.idpermissions = rp.idpermissions","left");
        $this->db->join("permissions_group as pg","pg.idpermissions_group = pr.idpermissions_group","left");
        $this->db->where("pr.code_class='$controller_name' and pr.code_method = '$function_name' and rp.idroles = '$user_level' and rp.status = '1'");
        $this->db->limit('1');
        return $this->db->get();	
    }
}
