<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="#">equipment</a></li>
        <li class="breadcrumb-item"><a href="#">Data</a></li>
    </ol>
    <h1 class="page-header"><b>DATA EQUIPMENT</b></h1>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#modal_add_equipment"><b><i class="fa fa-plus"></i></b>
                            <?php echo $lang_add_equipment; ?></button>
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
                                    <th class="text-nowrap">Kategori</th>
                                    <th class="text-nowrap">Nama Alat</th>
                                    <th class="text-nowrap">Deskripsi</th>
                                    <th class="text-nowrap">Stock</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Created Date</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                <?php foreach ($get_equipment_data as $data) { ?>
                                <tr class="odd gradeX">
                                    <td width="1%" class="f-s-600 text-inverse"> <?php echo ++$no ?> </td>
                                    <td><?php echo $data->categories_name ?></td>
                                    <td><?php echo $data->name ?></td>
                                    <td><?php echo $data->description ?></td>
                                    <td><?php echo $data->qty ?></td>
                                    <td><?php if ($data->is_active == 1) { ?>
                                        Active
                                        <?php } else { ?>
                                        Inactive
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $data->created_at ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal_add_stock" data-id="<?= $data->id ?>"
                                            data-name=" <?= $data->name ?>">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modal_delete_equipment" data-id="<?= $data->id ?>"
                                            data-name=" <?= $data->name ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
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
    <div id="modal_add_equipment" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $lang_add_equipment; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <form action="<?= base_url() ?>equipment/insert_equipment" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">

                                <div class="col-sm-6">
                                    <label><?php echo $lang_equipment_category; ?></label>
                                    <select name="categories_id" class="form-control" required autocomplete="off"
                                        required>
                                        <option value=""><?php echo $lang_choose_category; ?></option>
                                        <?php foreach ($get_category_data_active as $cat) { ?>
                                        <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label><?php echo $lang_equipment_name; ?></label>
                                    <input type="text" name="name" placeholder="Nama Alat..." class="form-control"
                                        required>
                                </div>

                                <div class="col-sm-12">
                                    <label><?php echo $lang_equipment_description; ?></label>
                                    <textarea name="description" class="form-control" required></textarea>
                                </div>

                                <div class="col-sm-6">
                                    <label><?php echo $lang_equipment_qty; ?></label>
                                    <input type="number" name="qty" placeholder="Total Stock" class="form-control"
                                        required>
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

    <div id="modal_delete_equipment" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $lang_delete_equipment; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <form action="<?= base_url() ?>equipment/delete_equipment" method="post">
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

    <div id="modal_add_stock" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <form action="<?= base_url() ?>equipment/add_stock" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" id="id" name="id">
                                <div class="col">
                                    <label>Stock</label>
                                    <input type="number" class="form-control" name="stock" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" aria-hidden="true"
                            data-dismiss="modal"><?php echo $lang_close; ?></button>
                        <button type="submit" class="btn bg-primary">Submit</button>
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

    $('#modal_delete_equipment').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this) // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
    });

    $('#modal_add_stock').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this) // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
    });
});
</script>