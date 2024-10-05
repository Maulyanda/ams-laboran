<?php
class Permission_model extends CI_Model
{
    public function getpermissions_group_data()
    {
        return $this->db->select('*')->from('permissions_group')->order_by('permissions_groupname')->get()->result();
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function insert_roles_data($table, $data_roles){
        $this->db->insert_batch($table, $data_roles);
    }

    function updateData($table, $data, $idpermissions_group, $field)
    {
        $this->db->where($field, $idpermissions_group);
        $this->db->update("$table", $data);

        return true;
    }

    public function getDataAll($table, $order_column, $order_type)
    {
        $this->db->order_by("$order_column", "$order_type");
        $query = $this->db->get("$table");
        $result = $query->result();
        $this->db->save_queries = false;
        return $result;
    }

    public function getpermissions_data()
    {
        $this->db->select('pm.idpermissions, pg.idpermissions_group, pg.permissions_groupname, pm.code_class, pm.code_method, pm.code_url, pm.type, pg.display_icon as parent_icon, pm.display_icon as child_icon, pm.display_name, pm.status');
        $this->db->from('permissions as pm');
        $this->db->join('permissions_group as pg', 'pm.idpermissions_group=pg.idpermissions_group', 'left');
        $this->db->order_by('pg.permissions_groupname ASC, pm.display_name ASC');
        return $this->db->get()->result();
    }

    public function getroles_data()
    {
        return $this->db->select('*')->from('roles')->get()->result();
    }

    function matrix_permissions($idroles)
    {
        $this->db->select('pm.idpermissions, pg.idpermissions_group, pg.permissions_groupname, pm.code_class, pm.code_method, pm.code_url, pm.type, pg.display_icon as parent_icon, pm.display_icon as child_icon, pm.display_name, pm.status');
        $this->db->from('permissions as pm');
        $this->db->join('permissions_group as pg', 'pm.idpermissions_group=pg.idpermissions_group', 'left');
        $this->db->join('roles_permissions as rp', " rp.idpermissions=pm.idpermissions", 'left');

        $this->db->where("rp.idroles='$idroles'");
        $this->db->order_by('pg.permissions_groupname ASC');

        return $this->db->get()->result();
    }

    function get_permissions_group()
    {
        $this->db->select('idpermissions_group, permissions_groupname, display_icon, status');
        $this->db->from('permissions_group');

        return $this->db->get()->result();
    }

    function get_permissions($idpermissions_group, $idroles){
        $this->db->select('rp.id, pr.idpermissions, pr.idpermissions_group, pr.display_name, pr.display_icon, pr.status');	    
        $this->db->from('permissions as pr');
        $this->db->join('roles_permissions as rp',"pr.idpermissions=rp.idpermissions and rp.idroles='$idroles'",'left');
        $this->db->where("pr.idpermissions_group = '$idpermissions_group' and pr.status='1'");
        $this->db->order_by('pr.display_name ASC');
        return $this->db->get()->result();
    }
    
    function get_checkedlist_permissions($idpermissions, $idroles){
        $this->db->select('id, idroles, idpermissions,  status');
        $this->db->from('roles_permissions');
        $this->db->where("idroles = '$idroles' and idpermissions = '$idpermissions' and status ='1'");
        $this->db->limit('1');       
        return $this->db->get();
    }

    function cheked_roles_permissions($idroles){
        $this->db->select('idpermissions, idroles');
        $this->db->from('roles_permissions');
        $this->db->where('idroles',$idroles);
        
        return $this->db->get();
    }

    function delete_roles_data( $idroles, $table){
        $this->db->select('idpermissions, idroles');
        $this->db->where('idroles',$idroles);
        $this->db->delete($table);
    }
}
