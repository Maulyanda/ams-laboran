<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rolespermissions extends CI_Controller
{
    private $contoller_name;
    private $function_name;

    function __construct()
    {
        parent::__construct();
        $this->contoller_name = $this->router->class;
        $this->function_name = $this->router->method;
        $this->load->model('Permission_model', 'modelPermission');
        $this->load->model('Dashboard_model');
    }

    // PERMISSION GROUP
    public function permissions_group()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $user_level = $this->session->userdata('users_level');
            $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);
            if ($check_permission->num_rows() == 1) {

                $page_data['getpermissions_group_data'] = $this->modelPermission->getpermissions_group_data();

                $page_data['page_name'] = 'Permissions Group';

                $page_data['lang_submit'] = 'Submit';
                $page_data['lang_close'] = 'Close';

                $page_data['lang_add_permissions_group'] = 'Add Permissons Group';
                $page_data['lang_edit_permissions_group'] = 'Edit Permissons Group';
                $page_data['lang_permissions_group_name'] = 'Permissions Group Name';
                $page_data['lang_status'] = 'Status';
                $page_data['lang_active'] = 'Active';
                $page_data['lang_inactive'] = 'Inactive';
                $page_data['lang_choose_status'] = 'Choose Status';
                $page_data['lang_display_icon'] = 'Display Icon';

                $this->load->view("include/backend/head");
                $this->load->view("include/backend/top-header");
                $this->load->view('permission_group.php', $page_data);
                $this->load->view("include/backend/sidebar");
                $this->load->view("include/backend/panel");
                $this->load->view("include/backend/footer");
                $this->load->view("include/alert");
            } else {
                $this->session->set_flashdata('success', 'Upsss!!!, Anda tidak mempunyai akses untuk halaman');
                redirect('dashboard/home');
            }
        } else {
            $this->session->set_flashdata('success', 'Upsss!!!, Login dulu ya');
            redirect('login');
        }
    }

    function insert_permissions_group()
    {
        $data = array(
            'permissions_groupname' => ucwords($this->input->post('permissions_groupname', TRUE)),
            'status' => $this->input->post('status', TRUE),
            'group' => $this->input->post('group', TRUE),
            'display_icon' => $this->input->post('display_icon', TRUE),
            'created_date' => date('Y-m-d H:i:s')
        );

        $this->modelPermission->insertData('permissions_group', $data);
        $this->session->set_flashdata('success', 'Permissions Group Berhasil Ditambahkan');

        redirect('rolespermissions/permissions_group');
    }

    function update_permissions_group()
    {

        $data = array(
            'permissions_groupname' => ucwords($this->input->post('permissions_groupname', TRUE)),
            'status' => $this->input->post('status', TRUE),
            'group' => $this->input->post('group', TRUE),
            'display_icon' => $this->input->post('display_icon', TRUE),
        );

        $field = 'idpermissions_group';

        $this->modelPermission->updateData('permissions_group', $data, $this->input->post('idpermissions_group', TRUE), $field);
        $this->session->set_flashdata('success', 'Permissions Group Berhasil Diupdate');

        redirect('rolespermissions/permissions_group');
    }
    // END PERMISSION GROUP

    // PERMISSION
    function permissions()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $user_level = $this->session->userdata('users_level');
            $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);
            if ($check_permission->num_rows() == 1) {
                $page_data['getpermissions_data'] = $this->modelPermission->getpermissions_data();
                $page_data['pgData'] = $this->modelPermission->getDataAll('permissions_group', 'permissions_groupname', 'ASC');

                $page_data['page_name'] = 'Permissions';

                $page_data['lang_submit'] = 'Submit';
                $page_data['lang_close'] = 'Close';

                $page_data['lang_permissions_group'] = 'Permissions Group';
                $page_data['lang_choose_permissions_group'] = 'Choose Permissions Group';
                $page_data['lang_add_permissions'] = 'Add_permissions';
                $page_data['lang_edit_permissions'] = 'Edit Permissions';
                $page_data['lang_permissions_name'] = 'Permissions_name';
                $page_data['lang_status'] = 'Status';
                $page_data['lang_active'] = 'Active';
                $page_data['lang_inactive'] = 'Inactive';
                $page_data['lang_choose_status'] = 'Choose Status';
                $page_data['lang_display_icon'] = 'Display Icon';
                $page_data['lang_choose_type'] = 'Choose Type';

                $this->load->view("include/backend/head");
                $this->load->view("include/backend/top-header");
                $this->load->view('permission.php', $page_data);
                $this->load->view("include/backend/sidebar");
                $this->load->view("include/backend/panel");
                $this->load->view("include/backend/footer");
                $this->load->view("include/alert");
            } else {
                $this->session->set_flashdata('success', 'Upsss!!!, Anda tidak mempunyai akses untuk halaman');
                redirect('dashboard/home');
            }
        } else {
            $this->session->set_flashdata('success', 'Upsss!!!, Login dulu ya.');
            redirect('dashboard/login');
        }
    }

    function insert_permissions()
    {
        $data = array(
            'idpermissions_group' => $this->input->post('idpermissions_group', TRUE),
            'code_class' => $this->input->post('code_class', TRUE),
            'code_method' => $this->input->post('code_method', TRUE),
            'code_url' => $this->input->post('code_url', TRUE),
            'display_name' => ucwords($this->input->post('display_name', TRUE)),
            'display_icon' => $this->input->post('display_icon', TRUE),
            'status' => $this->input->post('status', TRUE),
            'type' => $this->input->post('type', TRUE),
            'created_date' => date('Y-m-d H:i:s')
        );
        $this->modelPermission->insertData('permissions', $data);
        $this->session->set_flashdata('success', 'Permissions Berhasil Ditambahkan');

        redirect('rolespermissions/permissions');
    }

    function update_permissions()
    {
        $data = array(
            'idpermissions_group' => $this->input->post('idpermissions_group', TRUE),
            'code_class' => $this->input->post('code_class', TRUE),
            'code_method' => $this->input->post('code_method', TRUE),
            'code_url' => $this->input->post('code_url', TRUE),
            'display_name' => ucwords($this->input->post('display_name', TRUE)),
            'display_icon' => $this->input->post('display_icon', TRUE),
            'status' => $this->input->post('status', TRUE),
            'type' => $this->input->post('type', TRUE)
        );

        $field = 'idpermissions';

        $this->modelPermission->updateData('permissions', $data, $this->input->post('idpermissions', TRUE), $field);
        $this->session->set_flashdata('success', 'Permissions Group Berhasil Diupdate');

        redirect('rolespermissions/permissions');
    }
    // END PERMISSION

    // ROLES
    function roles()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $user_level = $this->session->userdata('users_level');
            $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);
            if ($check_permission->num_rows() == 1) {
                $page_data['getroles_data'] = $this->modelPermission->getroles_data();

                $page_data['page_name'] = 'Roles';

                $page_data['lang_submit'] = 'Submit';
                $page_data['lang_close'] = 'Close';

                $page_data['lang_add_roles'] = 'Add Roles';
                $page_data['lang_edit_roles'] = 'Edit Roles';
                $page_data['lang_search_roles'] = 'Search Roles';
                $page_data['lang_roles_name'] = 'Roles Name';
                $page_data['lang_status'] = 'Status';
                $page_data['lang_active'] = 'Active';
                $page_data['lang_inactive'] = 'Inactive';
                $page_data['lang_choose_status'] = 'Choose Status';

                $this->load->view("include/backend/head");
                $this->load->view("include/backend/top-header");
                $this->load->view('roles.php', $page_data);
                $this->load->view("include/backend/sidebar");
                $this->load->view("include/backend/panel");
                $this->load->view("include/backend/footer");
                $this->load->view("include/alert");
            } else {
                $this->session->set_flashdata('success', 'Upsss!!!, Anda tidak mempunyai akses untuk halaman');
                redirect('dashboard/home');
            }
        } else {
            $this->session->set_flashdata('success', 'Upsss!!!, Login dulu ya.');
            redirect('dashboard/login');
        }
    }

    function insert_roles()
    {
        $data = array(
            'roles_name' => ucwords($this->input->post('roles_name', TRUE)),
            'status' => $this->input->post('status', TRUE),
            'created_date' => date('Y-m-d H:i:s')
        );
        $this->modelPermission->insertData('roles', $data);
        $this->session->set_flashdata('success', 'Roles Group Berhasil Ditambahkan');

        redirect('rolespermissions/roles');
    }

    function update_roles()
    {
        $data = array(
            'roles_name' => ucwords($this->input->post('roles_name', TRUE)),
            'status' => $this->input->post('status', TRUE),
        );

        $field = 'idroles';

        $this->modelPermission->updateData('roles', $data, $this->input->post('idroles', TRUE), $field);
        $this->session->set_flashdata('success', 'Roles Group Berhasil Diupdate');

        redirect('rolespermissions/roles');
    }
    // END ROLES

    // ROLES PERMISSIONS
    function roles_permissions($idroles)
    {
        $page_data['page_name'] = 'Permissions Roles';

        $page_data['lang_submit'] = 'Submit';
        $page_data['lang_close'] = 'Close';

        $getpermissions_data = $this->modelPermission->matrix_permissions($idroles);
        $page_data['getpermissions_data'] = $getpermissions_data;
        $page_data['getpermissions_group_data'] = $this->modelPermission->get_permissions_group();
        $page_data['idroles_edit'] = $idroles;

        $this->load->view("include/backend/head");
        $this->load->view("include/backend/top-header");
        $this->load->view('permission_roles.php', $page_data);
        $this->load->view("include/backend/sidebar");
        $this->load->view("include/backend/panel");
        $this->load->view("include/backend/footer");
        $this->load->view("include/alert");
    }

    function insert_roles_permissions()
    {

        $idroles_edit = $this->input->post('idroles_edit', TRUE);
        $idpermissions = $_POST['permissions'];
        $data_roles = array();
        $count_roles = 0;
        foreach ($idpermissions as $idrp) {

            if ($idrp != '') {

                $dt_roles = $this->modelPermission->cheked_roles_permissions($idroles_edit)->num_rows();
                if ($dt_roles > 0) {
                    $this->modelPermission->delete_roles_data($idroles_edit, 'roles_permissions');
                }
                array_push($data_roles, array(
                    'idroles' => $idroles_edit,
                    'status' => '1',
                    'idpermissions' => $idpermissions[$count_roles],
                    'created_date' => date("Y-m-d H:i:s")

                ));
                $count_roles++;
            }
        }
        $this->modelPermission->insert_roles_data('roles_permissions', $data_roles);
        $this->session->set_flashdata('success', 'Roles Permission Berhasil Diupdate');
        redirect($_SERVER['HTTP_REFERER']);
    }
    // END ROLES PERMISSIONS
}
