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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_add_permissions"><b><i class="fa fa-plus"></i></b>
                            <?php echo $lang_add_permissions; ?></button>
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
                                    <th data-toggle="true">Permission Group</th>
                                    <th data-hide="phone">Display Name</th>
                                    <th data-hide="phone">Code</th>
                                    <th data-hide="phone">Type</th>
                                    <th data-hide="phone">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $start = 0;
                                foreach ($getpermissions_data as $getpermissions) { ?>
                                    <tr>
                                        <td><?php echo ++$start; ?></td>
                                        <td><i class="<?= $getpermissions->parent_icon; ?>"></i>
                                            &nbsp;<?= $getpermissions->permissions_groupname; ?></td>
                                        <td><i class="<?= $getpermissions->child_icon; ?>"></i>
                                            &nbsp;<?php echo $getpermissions->display_name; ?></td>
                                        <td><?php echo $getpermissions->code_class . '/' . $getpermissions->code_url; ?></td>
                                        <td><?php if ($getpermissions->type === 'TRUE') { ?>
                                                <span class="badge bg-teal d-block">Sidebar</span>
                                            <?php } else if ($getpermissions->type === 'FALSE') { ?>
                                                <span class="badge bg-slate d-block">Function</span>
                                            <?php } ?>
                                        </td>
                                        <td><?php if ($getpermissions->status === '0') { ?>
                                                <span class="badge badge-danger d-block">Inactive</span>
                                            <?php } else if ($getpermissions->status === '1') { ?>
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
                                                        <a data-toggle="modal" data-target="#modal_edit_permissions<?= $getpermissions->idpermissions; ?>" class="dropdown-item"><i class="fa fa-pencil-square-o"></i> <?php echo $lang_edit_permissions; ?></a>
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

    <div id="modal_add_permissions" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $lang_add_permissions; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <form action="<?= base_url() ?>rolespermissions/insert_permissions" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label><?php echo $lang_permissions_group; ?></label>
                                    <select name="idpermissions_group" class="form-control" required autocomplete="off">
                                        <option value=""><?php echo $lang_choose_permissions_group; ?></option>
                                        <?php
                                        for ($p = 0; $p < count($pgData); ++$p) {
                                            $idpg = $pgData[$p]->idpermissions_group;
                                            $pgname = $pgData[$p]->permissions_groupname; ?>
                                            <option value="<?php echo $idpg; ?>">
                                                <?php echo $pgname; ?>
                                            </option>
                                        <?php
                                            unset($idpg);
                                            unset($pgname);
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Controller</label>
                                    <input type="text" name="code_class" placeholder="Controller Name" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Function</label>
                                    <input type="text" name="code_method" placeholder="Function Name" class="form-control" required>
                                </div>
                                <div class="col-sm-6">
                                    <label>URL</label>
                                    <input type="text" name="code_url" placeholder="URL" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Display Name</label>
                                    <input type="text" name="display_name" placeholder="Display Name" class="form-control" required>
                                </div>
                                <div class="col-sm-6">
                                    <label><?php echo $lang_display_icon; ?></label>
                                    <input type="text" name="display_icon" placeholder="Display Icon" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Type</label>
                                    <select name="type" class="form-control" required autocomplete="off">
                                        <option value=""><?php echo $lang_choose_type; ?></option>
                                        <option value="TRUE">Sidebar</option>
                                        <option value="FALSE">Function</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label><?php echo $lang_status; ?></label>
                                    <select name="status" class="form-control" required autocomplete="off">
                                        <option value=""><?php echo $lang_choose_status; ?></option>
                                        <option value="1"><?php echo $lang_active; ?></option>
                                        <option value="0"><?php echo $lang_inactive; ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" aria-hidden="true" data-dismiss="modal"><?php echo $lang_close; ?></button>
                        <button type="submit" class="btn bg-primary"><?php echo $lang_submit; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($getpermissions_data as $getpermissions) { ?>
        <div id="modal_edit_permissions<?= $getpermissions->idpermissions; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo $lang_edit_permissions; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <form action="<?= base_url() ?>rolespermissions/update_permissions" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><?php echo $lang_permissions_group; ?></label>
                                        <select name="idpermissions_group" class="form-control" required autocomplete="off">
                                            <option value=""><?php echo $lang_choose_permissions_group; ?></option>
                                            <?php
                                            $pgroup = $getpermissions->idpermissions_group;
                                            for ($p = 0; $p < count($pgData); ++$p) {
                                                $idpg = $pgData[$p]->idpermissions_group;
                                                $pgname = $pgData[$p]->permissions_groupname; ?>
                                                <option value="<?php echo $idpg; ?>" <?php if ($pgroup == $idpg) { echo 'selected="selected"'; } ?>>
                                                    <?php echo $pgname; ?>
                                                </option>
                                            <?php
                                                unset($idpg);
                                                unset($pgname);
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Controller</label>
                                        <input type="text" name="code_class" placeholder="Controller Name" class="form-control" value="<?= $getpermissions->code_class; ?>" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Function</label>
                                        <input type="text" name="code_method" placeholder="Function Name" class="form-control" value="<?= $getpermissions->code_method; ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>URL</label>
                                        <input type="text" name="code_url" placeholder="URL" class="form-control" value="<?= $getpermissions->code_url; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Display Name</label>
                                        <input type="text" name="display_name" placeholder="Display Name" value="<?= $getpermissions->display_name; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label><?php echo $lang_display_icon; ?></label>
                                        <input type="text" name="display_icon" placeholder="Display Icon" value="<?= $getpermissions->child_icon; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Type</label>
                                        <select name="type" class="form-control" required autocomplete="off">
                                            <option value=""><?php echo $lang_choose_type; ?></option>
                                            <option <?php if ($getpermissions->type === 'TRUE') {
                                                        echo 'selected="selected"';
                                                    } ?>value="TRUE">
                                                Sidebar</option>
                                            <option <?php if ($getpermissions->type === 'FALSE') {
                                                        echo 'selected="selected"';
                                                    } ?>value="FALSE">
                                                Function</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label><?php echo $lang_status; ?></label>
                                        <select name="status" class="form-control" required autocomplete="off">
                                            <option value=""><?php echo $lang_choose_status; ?></option>
                                            <option <?php if ($getpermissions->status === '1') {
                                                        echo 'selected="selected"';
                                                    } ?> value="1"><?php echo $lang_active; ?></option>
                                            <option <?php if ($getpermissions->status === '0') {
                                                        echo 'selected="selected"';
                                                    } ?>value="0">
                                                <?php echo $lang_inactive; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="hidden" name="idpermissions" class="form-control" value="<?= $getpermissions->idpermissions; ?>" required>
                            <button type="button" class="btn btn-link" aria-hidden="true" data-dismiss="modal"><?php echo $lang_close; ?></button>
                            <button type="submit" class="btn bg-primary"><?php echo $lang_submit; ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>