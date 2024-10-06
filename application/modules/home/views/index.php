<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item active"><?= $this->session->userdata('apps_title') ?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Dashboard</h1>
    <div class="d-sm-flex align-items-center mb-3">
        <a href="#" class="btn btn-inverse mr-2 text-truncate" id="daterange-filter">
            <i class="fa fa-calendar fa-fw text-white-transparent-5 ml-n1"></i>
            <span><?php echo date("d/m/Y"); ?></span>
        </a>
    </div>
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>TOTAL PENGAJUAN</h4>
                </div>
                <div class="stats-number"><?= $loans[0]->total_all ?></div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 100%;"></div>
                </div>
                <div class="stats-desc">Total hari ini (<?= $loans[0]->total_today ?>)</div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-spinner"></i></div>
                <div class="stats-info">
                    <h4>TOTAL DISETUJUI</h4>
                </div>
                <div class="stats-number"><?= $loans_approved[0]->total_all ?></div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 100%;"></div>
                </div>
                <div class="stats-desc">Total hari ini (<?= $loans_approved[0]->total_today ?>)</div>
            </div>
        </div>
        <!-- end col-3 -->

        <div class="col-xl-2 col-md-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-inbox"></i></div>
                <div class="stats-info">
                    <h4>TOTAL PEMINJAMAN</h4>
                </div>
                <div class="stats-number"><?= $loans_loaned[0]->total_all ?></div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 100%;"></div>
                </div>
                <div class="stats-desc">Total hari ini (<?= $loans_loaned[0]->total_today ?>)</div>
            </div>
        </div>

        <div class="col-xl-2 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-check"></i></div>
                <div class="stats-info">
                    <h4>TOTAL SELESAI</h4>
                </div>
                <div class="stats-number"><?= $loans_completed[0]->total_all ?></div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 100%;"></div>
                </div>
                <div class="stats-desc">Total hari ini (<?= $loans_completed[0]->total_today ?>)</div>
            </div>
        </div>

        <div class="col-xl-2 col-md-6">
            <div class="widget widget-stats bg-danger">
                <div class="stats-icon"><i class="fa fa-times"></i></div>
                <div class="stats-info">
                    <h4>TOTAL REJECTED</h4>
                </div>
                <div class="stats-number"><?= $loans_rejected[0]->total_all ?></div>
                <div class="stats-progress progress">
                    <div class="progress-bar" style="width: 100%;"></div>
                </div>
                <div class="stats-desc">Total hari ini (<?= $loans_rejected[0]->total_today ?>)</div>
            </div>
        </div>

    </div>
    <!-- end row -->
</div>