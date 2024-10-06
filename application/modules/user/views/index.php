<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item"><a href="#">Data</a></li>
    </ol>
    <h1 class="page-header"><b>DATA USERS</b></h1>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#modal_add_user"><b><i class="fa fa-plus"></i></b>
                            <?php echo $lang_add_user; ?></button>
                    </h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                            data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table-combine"
                            class="table table-striped table-bordered table-td-valign-middle">
                            <thead>
                                <tr>
                                    <th width="1%">#</th>
                                    <th class="text-nowrap">Name</th>
                                    <th class="text-nowrap">NIP/NPM</th>
                                    <th class="text-nowrap">Email</th>
                                    <th class="text-nowrap">Level</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Status User</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($getuser_data as $data) { ?>
                                <tr class="odd gradeX">
                                    <td width="1%" class="f-s-600 text-inverse"> <?php echo ++$no ?> </td>
                                    <td><?php echo $data->first_name ?> <?php echo $data->last_name ?></td>
                                    <td><?php echo $data->username ?></td>
                                    <td><?php echo $data->email ?></td>
                                    <td><?php echo $data->roles_name ?></td>
                                    <td><?php if ($data->is_active == 1) { ?>
                                        Active
                                        <?php } else { ?>
                                        Inactive
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?= $data->status ?>
                                    </td>
                                    <td>
                                        <?php if ($data->is_active != 1 and $data->status == 'pending') { ?>
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal_approved<?= $data->user_id ?>">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <div id="modal_approved<?= $data->user_id ?>" class="modal fade" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Approve user</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    </div>

                                                    <form action="<?= base_url() ?>user/approve_or_reject_user"
                                                        method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <input type="hidden" id="id" name="id"
                                                                        value="<?= $data->user_id ?>">
                                                                    <input type="hidden" name="status" value="approved">

                                                                    <div class="col-sm-6">
                                                                        <label><?php echo $lang_first_name; ?></label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?= $data->first_name ?>" disabled>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <label><?php echo $lang_last_name; ?></label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?= $data->last_name ?>" disabled>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <label><?php echo $lang_username; ?></label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?= $data->username ?>" disabled>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <label><?php echo $lang_email; ?></label>
                                                                        <input type="email" class="form-control"
                                                                            value="<?= $data->email ?>" disabled>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-sm-12">
                                                                        <br>
                                                                        <label>File Identitas</label>
                                                                        <img class="rounded mx-auto d-block"
                                                                            src="<?= base_url('assets/upload/' . $data->identity_card) ?>"
                                                                            width="50%" alt="" />
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-sm-12">
                                                                        <label><?php echo $lang_level; ?></label>
                                                                        <select name="user_level" class="form-control"
                                                                            required autocomplete="off" required>
                                                                            <option value="">
                                                                                <?php echo $lang_choose_level; ?>
                                                                            </option>
                                                                            <?php foreach ($getrole_data as $r) { ?>
                                                                            <option value="<?= $r->idroles ?>">
                                                                                <?= $r->roles_name ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-link"
                                                                aria-hidden="true"
                                                                data-dismiss="modal"><?php echo $lang_close; ?></button>
                                                            <button type="submit"
                                                                class="btn bg-success">Approve</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modal_rejected<?= $data->user_id ?>">
                                            <i class=" fa fa-times"></i>
                                        </button>
                                        <div id="modal_rejected<?= $data->user_id ?>" class="modal fade" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Rejected user</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    </div>

                                                    <form action="<?= base_url() ?>user/approve_or_reject_user"
                                                        method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <input type="hidden" id="id" name="id"
                                                                        value="<?= $data->user_id ?>">
                                                                    <input type="hidden" name="status" value="rejected">

                                                                    <div class="col-sm-6">
                                                                        <label><?php echo $lang_first_name; ?></label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?= $data->first_name ?>" disabled>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <label><?php echo $lang_last_name; ?></label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?= $data->last_name ?>" disabled>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <label><?php echo $lang_username; ?></label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?= $data->username ?>" disabled>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <label><?php echo $lang_email; ?></label>
                                                                        <input type="email" class="form-control"
                                                                            value="<?= $data->email ?>" disabled>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-sm-12">
                                                                        <br>
                                                                        <label>File Identitas</label>
                                                                        <img class="rounded mx-auto d-block"
                                                                            src="<?= base_url('assets/upload/' . $data->identity_card) ?>"
                                                                            width="50%" alt="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-link"
                                                                aria-hidden="true"
                                                                data-dismiss="modal"><?php echo $lang_close; ?></button>
                                                            <button type="submit"
                                                                class="btn bg-danger">Rejected</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } elseif ($data->status == 'rejected') { ?>
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal_approved<?= $data->user_id ?>">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <div id="modal_approved<?= $data->user_id ?>" class="modal fade" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Approve user</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    </div>

                                                    <form action="<?= base_url() ?>user/approve_or_reject_user"
                                                        method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <input type="hidden" id="id" name="id"
                                                                        value="<?= $data->user_id ?>">
                                                                    <input type="hidden" name="status" value="approved">

                                                                    <div class="col-sm-6">
                                                                        <label><?php echo $lang_first_name; ?></label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?= $data->first_name ?>" disabled>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <label><?php echo $lang_last_name; ?></label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?= $data->last_name ?>" disabled>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <label><?php echo $lang_username; ?></label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?= $data->username ?>" disabled>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <label><?php echo $lang_email; ?></label>
                                                                        <input type="email" class="form-control"
                                                                            value="<?= $data->email ?>" disabled>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-sm-12">
                                                                        <br>
                                                                        <label>File Identitas</label>
                                                                        <img class="rounded mx-auto d-block"
                                                                            src="<?= base_url('assets/upload/' . $data->identity_card) ?>"
                                                                            width="50%" alt="" />
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-sm-12">
                                                                        <label><?php echo $lang_level; ?></label>
                                                                        <select name="user_level" class="form-control"
                                                                            required autocomplete="off" required>
                                                                            <option value="">
                                                                                <?php echo $lang_choose_level; ?>
                                                                            </option>
                                                                            <?php foreach ($getrole_data as $r) { ?>
                                                                            <option value="<?= $r->idroles ?>">
                                                                                <?= $r->roles_name ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-link"
                                                                aria-hidden="true"
                                                                data-dismiss="modal"><?php echo $lang_close; ?></button>
                                                            <button type="submit"
                                                                class="btn bg-success">Approve</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <?php if ($data->roles_name != 'Superadmin' and $data->status == 'approved') { ?>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modal_delete" data-id="<?= $data->user_id ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <?php } else { ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- end panel-body -->
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-10 -->
            </div>
        </div>
    </div>

    <!-- Vertical form modal -->
    <div id="modal_add_user" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $lang_add_user; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <form action="<?= base_url() ?>user/insert_user" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label><?php echo $lang_first_name; ?></label>
                                    <input type="text" name="first_name" placeholder="First Name..."
                                        class="form-control" required>
                                </div>

                                <div class="col-sm-6">
                                    <label><?php echo $lang_last_name; ?></label>
                                    <input type="text" name="last_name" placeholder="Last Name..." class="form-control"
                                        required>
                                </div>

                                <div class="col-sm-12">
                                    <label><?php echo $lang_username; ?></label>
                                    <input type="text" name="username" placeholder="NIP/NPM..." class="form-control"
                                        autocomplete="off" required>
                                </div>

                                <div class="col-sm-6">
                                    <label><?php echo $lang_email; ?></label>
                                    <input type="email" name="email" placeholder="Email Address..." class="form-control"
                                        autocomplete="off" required>
                                </div>

                                <div class="col-sm-6">
                                    <label><?php echo $lang_password; ?></label>
                                    <input type="password" name="password" placeholder="Password..." autocomplete="off"
                                        class="form-control" required>
                                </div>

                                <div class="col-sm-6">
                                    <label><?php echo $lang_level; ?></label>
                                    <select name="user_level" class="form-control" required autocomplete="off" required>
                                        <option value=""><?php echo $lang_choose_level; ?></option>
                                        <?php foreach ($getrole_data as $r) { ?>
                                        <option value="<?= $r->idroles ?>"><?= $r->roles_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label><?php echo $lang_status; ?></label>
                                    <select name="is_active" class="form-control" required autocomplete="off" required>
                                        <option value=""><?php echo $lang_choose_status; ?></option>
                                        <option value="1"><?php echo $lang_active; ?></option>
                                        <option value="0"><?php echo $lang_inactive; ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" aria-hidden="true"
                            data-dismiss="modal"><?php echo $lang_close; ?></button>
                        <button type="submit" class="btn bg-primary"><?php echo $lang_submit; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /vertical form modal -->

    <div id="modal_delete" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $lang_delete_user; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <form action="<?= base_url() ?>user/delete_user" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" id="id" name="id">
                                <div class="col">
                                    <p>Apakah Anda yakin mau menghapus alat?</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" aria-hidden="true"
                            data-dismiss="modal"><?php echo $lang_close; ?></button>
                        <button type="submit" class="btn bg-danger"><?php echo $lang_delete; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script>
$(document).ready(function() {
    $("#data-table-combine").dataTable({
        dom: "Bfrtip",
        buttons: ["excel"],
        responsive: true
    });
    $('#modal_delete').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this) // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
    });
});
</script>