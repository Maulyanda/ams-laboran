<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb hidden-print float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Invoice</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header hidden-print">Invoice <small>peminjaman...</small></h1>
    <!-- end page-header -->
    <!-- begin invoice -->
    <div class="invoice">
        <!-- begin invoice-company -->
        <div class="invoice-company">
            <span class="pull-right hidden-print">
                <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10"><i
                        class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
            <img src="<?= base_url('assets/img/logo/logo_usk.png'); ?>" width="10%" />
        </div>
        <!-- end invoice-company -->
        <!-- begin invoice-header -->
        <div class="invoice-header">
            <div class="invoice-from">
                <small>Peminjam</small>
                <address class="m-t-5 m-b-5">
                    <strong class="text-inverse"><?= $loans->first_name ?></strong><br />
                    Nip/Npm: <?= $loans->username ?><br />
                    Email: <?= $loans->email ?><br />
                </address>
            </div>
            <div class="invoice-to">
                <small>Tanggal</small>
                <address class="m-t-5 m-b-5">
                    Pinjam:
                    <?= date_format(date_create($loans->start_date), "F d, Y") ?><br />
                    Pengembalian:
                    <?= date_format(date_create($loans->end_date), "F d, Y") ?><br />
                    Dikembalikan:
                    <?= $loans->return_date == NULL ? '' : date_format(date_create($loans->return_date), "F d, Y") ?><br />
                </address>
            </div>
            <div class="invoice-date">
                <small>Invoice / <?php $date = date_create($loans->created_at);
                                    echo date_format($date, "F") ?> period</small>
                <div class="date text-inverse m-t-5"><?php $date = date_create($loans->created_at);
                                                        echo date_format($date, "F d, Y") ?></div>
                <div class="invoice-detail">
                    <font class="font-weight-bold" style="color: #FE7E2D;">#<?= $loans->invoice ?></font>
                </div>
            </div>
        </div>
        <!-- end invoice-header -->
        <!-- begin invoice-content -->
        <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
                <table class="table table-invoice">
                    <thead>
                        <tr>
                            <th>Alat</th>
                            <th class="text-center" width="10%">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail_loans as $r) { ?>
                        <tr>
                            <td>
                                <span class="text-inverse"><?= $r->name ?></span><br />
                            </td>
                            <td class="text-right"><?= $r->qty ?> Item</td>
                        <tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class="invoice-price">
                <div class="invoice-price-left">
                    <div class="invoice-price-row">
                    </div>
                </div>
                <div class="invoice-price-right">
                    <small>TOTAL</small> <span class="f-w-600"><?= $loans->amount ?> Item</span>
                </div>
            </div>
            <!-- end invoice-price -->
        </div>
        <div class="invoice-header">
            <div class="invoice-from">
                <small>History Peminjam</small>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-invoice">
                <thead>
                    <tr>
                        <th>User</th>
                        <th class="text-left" width="10%">Status</th>
                        <th class="text-left" width="15%">Datetime</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($loans_history as $r) { ?>
                    <tr>
                        <td>
                            <span class="text-inverse"><?= $r->first_name ?></span><br />
                        </td>
                        <td class="text-left"><?= $r->status ?></td>
                        <td class="text-left"><?= $r->date ?></td>
                    <tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- end invoice-content -->
        <!-- begin invoice-note -->
        <div class="invoice-note">
            Invoice ini sah dan diproses oleh komputer<br />
            Silahkan hubungi <font class="font-weight-bold" style="color: #FE7E2D;">Call Center</font> apabila kamu
            membutuhkan bantuan
        </div>
        <!-- end invoice-note -->
        <!-- begin invoice-footer -->
        <div class="invoice-footer">
            <p class="text-right">
                <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> <?= site_url() ?></span>
                <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> +6281234567890</span>
            </p>
        </div>
        <!-- end invoice-footer -->
    </div>
    <!-- end invoice -->
</div>
<!-- end #content -->