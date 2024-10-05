<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb hidden-print float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Invoice</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header hidden-print">Invoice <small>transaction...</small></h1>
    <!-- end page-header -->
    <!-- begin invoice -->
    <div class="invoice">
        <!-- begin invoice-company -->
        <div class="invoice-company">
            <span class="pull-right hidden-print">
                <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
            <img src="<?= base_url('assets/img/logo/lorem_ipsum.png'); ?>" width="15%" />
        </div>
        <!-- end invoice-company -->
        <!-- begin invoice-header -->
        <div class="invoice-header">
            <div class="invoice-from">
                <small>from</small>
                <address class="m-t-5 m-b-5">
                    <strong class="text-inverse">ExDrogoz</strong><br />
                    Jl. Rajabrana<br />
                    Jawa Barat, 16453<br />
                    Phone: 08123456789
                </address>
            </div>
            <div class="invoice-to">
                <small>to</small>
                <address class="m-t-5 m-b-5">
                    <strong class="text-inverse"><?= $transaction->shop ?></strong><br />
                    <?= $transaction->delivery_address ?><br />
                    Name: <?= $transaction->name ?><br />
                    Phone: <?= $transaction->phone ?><br />
                </address>
            </div>
            <div class="invoice-date">
                <small>Invoice / <?php $date = date_create($transaction->created_at);
                                    echo date_format($date, "F") ?> period</small>
                <div class="date text-inverse m-t-5"><?php $date = date_create($transaction->created_at);
                                                        echo date_format($date, "F d, Y") ?></div>
                <div class="invoice-detail">
                    <font class="font-weight-bold" style="color: #FE7E2D;">#<?= $transaction->invoice_no ?></font>
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
                            <th>PRODUCT</th>
                            <th class="text-center" width="10%">SKU</th>
                            <th class="text-center" width="10%">HARGA</th>
                            <th class="text-center" width="10%">QUANTITY</th>
                            <th class="text-right" width="20%">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($det_transaction as $r) { ?>
                            <tr>
                                <td>
                                    <span class="text-inverse"><?= $r->name ?></span><br />
                                </td>
                                <td class="text-center"><?= $r->sku ?></td>
                                <td class="text-right"><?= number_format($r->price, 0) ?></td>
                                <td class="text-center"><?= $r->quantity ?></td>
                                <td class="text-right"><?= number_format($r->quantity * $r->price, 0) ?></td>
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
                    <small>TOTAL</small> <span class="f-w-600"><?= number_format($transaction->amount, 2) ?></span>
                </div>
            </div>
            <!-- end invoice-price -->
        </div>
        <!-- end invoice-content -->
        <!-- begin invoice-note -->
        <div class="invoice-note">
            Invoice ini sah dan diproses oleh komputer<br />
            Silahkan hubungi <font class="font-weight-bold" style="color: #FE7E2D;">Call Center</font> apabila kamu membutuhkan bantuan
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