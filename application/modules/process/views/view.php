<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="#">Process</a></li>
        <li class="breadcrumb-item"><a href="#">Data</a></li>
    </ol>
    <h1 class="page-header"><b>List Pengajuan - Berhasil dipinjamkan</b></h1>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
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
                                    <th>Invoice</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Total Alat</th>
                                    <th>Kebutuhan</th>
                                    <th>Mata Kuliah</th>
                                    <th>Status</th>
                                    <th>Action</th>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                <?php foreach ($get_data as $data) { ?>
                                <tr class="odd gradeX">
                                    <td width="1%" class="f-s-600 text-inverse"> <?php echo ++$no ?> </td>
                                    <td><?= $data->invoice ?></td>
                                    <td><?= $data->start_date ?></td>
                                    <td><?= $data->end_date ?></td>
                                    <td><?= $data->amount ?> Item</td>
                                    <td><?= $data->needs_name ?></td>
                                    <td><?= $data->course_name ?></td>=
                                    <td><?= $data->status ?></td>
                                    <td>
                                        <a href="<?= base_url('dashboard/loans/detail?id=' . $data->id) ?>"
                                            class="btn btn-sm btn-primary"><i class="fa fas fa-eye"></i></a>
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
</div>

<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>