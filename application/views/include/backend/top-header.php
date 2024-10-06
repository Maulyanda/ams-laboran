<div id="header" class="header navbar-default">
    <div class="navbar-header">
        <a href="<?php echo base_url('dashboard/home'); ?>" class="navbar-brand"><span class="navbar-logo"></span>
            <b><?= $this->session->userdata('apps_title') ?></b></a>
        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url('assets/img/user/user.png') ?>" alt="" />
                <span class="d-none d-md-inline"><?= $this->session->userdata('first_name') ?></span> <b
                    class="caret"></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="<?php echo base_url('dashboard/user'); ?>" class="dropdown-item">Edit Profil</a>
                <a href="<?php echo base_url('dashboard/logout'); ?>" class="dropdown-item">Log Out</a>
            </div>
        </li>
    </ul>
</div>