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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_add_permissions_group"><b><i class="fa fa-plus"></i></b>
                            Add Permissons Group</button>
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
                        <table class="table table-bordered table-togglable table-hover table-xs  ">
                            <thead>
                                <tr>
                                    <th data-hide="phone">#</th>
                                    <th data-toggle="true"><?php echo $lang_permissions_group_name; ?></th>
                                    <th data-toggle="true"><?php echo $lang_status; ?></th>
                                    <th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $start = 0;
                                foreach ($getpermissions_group_data as $getpermissions_group) { ?>
                                    <tr>
                                        <td><?php echo ++$start; ?></td>
                                        <td><i class="<?php echo $getpermissions_group->display_icon; ?>"></i>
                                            &nbsp;<?php echo $getpermissions_group->permissions_groupname; ?></td>
                                        <td><?php if ($getpermissions_group->status === '0') { ?>
                                                <span class="badge badge-danger d-block">Inactive</span>
                                            <?php } else if ($getpermissions_group->status === '1') { ?>
                                                <span class="badge badge-success d-block">Active</span>
                                            <?php } ?>
                                        </td>

                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                        <i class="fa fa-bars"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a data-toggle="modal" data-target="#modal_edit_permissions_group<?php echo $getpermissions_group->idpermissions_group; ?>" class="dropdown-item"><i class="fa fa-pencil-square-o"></i> <?php echo $lang_edit_permissions_group; ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
    </div>

    <div id="modal_add_permissions_group" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $lang_add_permissions_group; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <form action="<?= base_url() ?>rolespermissions/insert_permissions_group" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label><?php echo $lang_permissions_group_name; ?></label>
                                    <input type="text" name="permissions_groupname" placeholder="Permissions Group Name..." class="form-control" required>
                                </div>
                                <div class="col-sm-6">
                                    <label><?php echo $lang_display_icon; ?></label>
                                    <input type="text" name="display_icon" placeholder="Class Icon" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label><?php echo $lang_status; ?></label>
                                    <select name="status" class="form-control" required autocomplete="off">
                                        <option value=""><?php echo $lang_choose_status; ?></option>
                                        <option value="1"><?php echo $lang_active; ?></option>
                                        <option value="0"><?php echo $lang_inactive; ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Group</label>
                                    <select name="group" class="form-control" required autocomplete="off">
                                        <option value=""><?php echo $lang_choose_status; ?></option>
                                        <option value="1">Main</option>
                                        <option value="2">Config</option>
                                        <option value="3">Menu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" aria-hidden="true" data-dismiss="modal"><?php echo $lang_close; ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo $lang_submit; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Vertical form modal -->
    <?php foreach ($getpermissions_group_data as $getpermissions_group) { ?>
        <div id="modal_edit_permissions_group<?= $getpermissions_group->idpermissions_group; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo $lang_edit_permissions_group; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <form action="<?= base_url() ?>rolespermissions/update_permissions_group" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><?php echo $lang_permissions_group_name; ?></label>
                                        <input type="text" name="permissions_groupname" placeholder="Permissions Group Name..." class="form-control" value="<?= $getpermissions_group->permissions_groupname; ?>" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label><?php echo $lang_display_icon; ?></label>
                                        <input type="text" name="display_icon" placeholder="Class Icon" class="form-control" value="<?= $getpermissions_group->display_icon; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><?php echo $lang_status; ?></label>
                                        <select name="status" class="form-control" required autocomplete="off">
                                            <option><?php echo $lang_choose_status; ?></option>
                                            <option <?php if ($getpermissions_group->status === '1') {
                                                        echo 'selected="selected"';
                                                    } ?> value="1"><?php echo $lang_active; ?></option>
                                            <option <?php if ($getpermissions_group->status === '0') {
                                                        echo 'selected="selected"';
                                                    } ?>value="0">
                                                <?php echo $lang_inactive; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Group</label>
                                        <select name="group" class="form-control" required autocomplete="off">
                                            <option value="">Choose Group</option>
                                            <option <?php if ($getpermissions_group->group === '1') {
                                                        echo 'selected="selected"';
                                                    } ?> value="1">Main</option>
                                            <option <?php if ($getpermissions_group->group === '2') {
                                                        echo 'selected="selected"';
                                                    } ?>value="2">Config</option>
                                            <option <?php if ($getpermissions_group->group === '3') {
                                                        echo 'selected="selected"';
                                                    } ?>value="3">Menu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="hidden" name="idpermissions_group" class="form-control" value="<?= $getpermissions_group->idpermissions_group; ?>" required>
                            <button type="button" class="btn btn-link" aria-hidden="true" data-dismiss="modal"><?php echo $lang_close; ?></button>
                            <button type="submit" class="btn bg-primary"><?php echo $lang_submit; ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- /vertical form modal -->