<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <div data-scrollbar="true" data-height="100%">
        <ul class="nav">
            <li class="nav-profile <?php echo $this->uri->segment(1) == "profil" ? "active" : ""; ?>">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="<?= base_url('assets/img/user/user.png') ?>" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>
                        <?= $this->session->userdata('first_name'); ?>
                        <small><?= $this->session->userdata('last_name') ?></small>
                    </div>
                </a>
            </li>
            <?php if ($this->session->userdata('is_login') == TRUE) { ?>
            <li>
                <ul class="nav nav-profile <?php echo $this->uri->segment(2) == "user" ? "active" : ""; ?>">
                    <li class="<?php echo $this->uri->segment(2) == "user" ? "active" : ""; ?>"><a
                            href="<?php echo base_url('dashboard/user'); ?>"><i class="fa fa-cog"></i> Edit Profile</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
        </ul>

        <?php $user_le = $this->session->userdata('users_level'); ?>

        <?php if ($this->session->userdata('is_login') == TRUE) { ?>
        <ul class="nav">
            <li class="nav-header">Main</li>
            <?php
                $get_permissionsgroup_data =  $this->Dashboard_model->getroles_permissions($user_le);
                foreach ($get_permissionsgroup_data as $get_permissionsgroup) { ?>

            <li class="<?= $this->uri->segment(2) == $get_permissionsgroup->code_class ? "active" : "" ?> has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="<?= $get_permissionsgroup->display_icon ?>"></i>
                    <?= $get_permissionsgroup->permissions_groupname ?>
                </a>
                <ul class="sub-menu">
                    <?php $getpermissions = $this->Dashboard_model->getpermissions($get_permissionsgroup->idpermissions_group, $user_le);
                            foreach ($getpermissions as $r) { ?>
                    <li class="<?php echo $this->uri->segment(2) == $r->code_class ? "active" : ""; ?>"><a
                            href="<?= base_url('dashboard/') . $r->code_class . '/' . $r->code_url; ?>"><?= $r->display_name ?></a>
                    </li>
                    <?php
                            }
                            ?>
                </ul>
            </li>
            <?php
                }
                ?>
        </ul>

        <?php
            $get_permissionsgroup_data =  $this->Dashboard_model->getroles_permissions_menu($user_le);

            if ($get_permissionsgroup_data != NULL) {
            ?>

        <ul class="nav">
            <li class="nav-header">Menu</li>
            <?php
                    foreach ($get_permissionsgroup_data as $get_permissionsgroup) { ?>

            <li
                class="<?= $this->uri->segment(1) == 'dashboard' ? ($this->uri->segment(2) == $get_permissionsgroup->code_method ? "active" : "") : ($this->uri->segment(1) == $get_permissionsgroup->code_class ? "active" : "") ?> has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="<?= $get_permissionsgroup->display_icon ?>"></i>
                    <?= $get_permissionsgroup->permissions_groupname ?>
                </a>
                <ul class="sub-menu">
                    <?php $getpermissions = $this->Dashboard_model->getpermissions($get_permissionsgroup->idpermissions_group, $user_le);
                                foreach ($getpermissions as $r) { ?>
                    <li
                        class="<?php echo $this->uri->segment(2) == $r->code_method && $this->uri->segment(1) == $r->code_class ? "active" : ""; ?>">
                        <a href="<?= base_url() . $r->code_class . '/' . $r->code_url; ?>"><?= $r->display_name ?></a>
                    </li>
                    <?php
                                }
                                ?>
                </ul>
            </li>
            <?php
                    }
                    ?>
        </ul>
        <?php } ?>

        <?php
            $get_permissionsgroup_data =  $this->Dashboard_model->getroles_permissions_config($user_le);
            if ($get_permissionsgroup_data != NULL) {
            ?>
        <ul class="nav">
            <li class="nav-header">Configurations</li>
            <?php
                    foreach ($get_permissionsgroup_data as $get_permissionsgroup) { ?>

            <li
                class="<?= $this->uri->segment(1) == 'dashboard' ? ($this->uri->segment(2) == $get_permissionsgroup->code_method ? "active" : "") : ($this->uri->segment(1) == $get_permissionsgroup->code_class ? "active" : "") ?> has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="<?= $get_permissionsgroup->display_icon ?>"></i>
                    <?= $get_permissionsgroup->permissions_groupname ?>
                </a>
                <ul class="sub-menu">
                    <?php $getpermissions = $this->Dashboard_model->getpermissions($get_permissionsgroup->idpermissions_group, $user_le);
                                foreach ($getpermissions as $r) { ?>
                    <li
                        class="<?php echo $this->uri->segment(2) == $r->code_method && $this->uri->segment(1) == $r->code_class ? "active" : ""; ?>">
                        <a href="<?= base_url() . $r->code_class . '/' . $r->code_url; ?>"><?= $r->display_name ?></a>
                    </li>
                    <?php
                                }
                                ?>
                </ul>
            </li>
            <?php
                    }
                    ?>
        </ul>
        <?php } ?>
        <?php } ?>
    </div>
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->