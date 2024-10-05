<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="#">Permission</a></li>
        <li class="breadcrumb-item"><a href="#"><?= $page_name ?></a></li>
    </ol>
    <h1 class="page-header"><b><?= $page_name ?></b></h1>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    </h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <form action="<?php echo base_url() ?>rolespermissions/insert_roles_permissions" method="post" accept-charset="utf-8">
                            <table class="table table-bordered table-togglable table-hover table-xs  ">
                                <thead>
                                    <tr>
                                        <th data-hide="phone">#</th>
                                        <th data-toggle="true">Permission Group</th>
                                        <th data-hide="phone">Permissions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $start = 0;
                                    foreach ($getpermissions_group_data as $getpermissions_group) { ?>
                                        <tr>
                                            <td><?php echo ++$start; ?></td>
                                            <td><i class="<?= $getpermissions_group->display_icon; ?>"></i>
                                                &nbsp;<?= $getpermissions_group->permissions_groupname; ?></td>
                                            <td>
                                                <?php $list_permissions =  $this->modelPermission->get_permissions($getpermissions_group->idpermissions_group, $idroles_edit); ?>
                                                <?php foreach ($list_permissions as $permissions) {
                                                    $checkedlist_permission =  $this->modelPermission->get_checkedlist_permissions($permissions->idpermissions, $idroles_edit); ?>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="permissions[]" value="<?= $permissions->idpermissions; ?>" <?php if ($checkedlist_permission->num_rows() > 0) { echo "checked"; } ?>>
                                                                <i class="<?= $permissions->display_icon; ?>"></i>
                                                                &nbsp;<?= $permissions->display_name; ?>
                                                            </label>
                                                        </div>
                                                        <input type="hidden" name="idroles_edit" value="<?= $idroles_edit; ?>" />
                                                        <input type="hidden" name="permissions_group[]" value="<?= $permissions->idpermissions_group; ?>" />
                                                    </div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <br />
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><?php echo $lang_submit; ?></button>
                            </div>
                            <br />
                        </form>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
    </div>