<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $this->session->userdata('apps_title') ?> - <?= $this->session->userdata('apps_name') ?></title>
    <link rel="icon" type="image/png" href="<?= base_url($this->session->userdata('apps_favicon')); ?>">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="<?= base_url('assets/css/default/app.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/default/invoice-print.min.css'); ?>" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="<?= base_url('assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css'); ?>"
        rel="stylesheet" />
    <link href="<?= base_url('assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>"
        rel="stylesheet" />
    <link href="<?= base_url('assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css'); ?>"
        rel="stylesheet" />
    <link
        href="<?= base_url('assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet'); ?>" />

    <!-- v1 -->
    <link href="<?= base_url('assets/plugins/jvectormap-next/jquery-jvectormap.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'); ?>"
        rel="stylesheet" />
    <link href="<?= base_url('assets/plugins/gritter/css/jquery.gritter.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/plugins/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" />
    <link
        href="<?= base_url('assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); ?>"
        rel="stylesheet" />

    <link href="<?= base_url('assets/plugins/smartwizard/dist/css/smart_wizard.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/plugins/nvd3/build/nv.d3.css'); ?>" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> -->
</head>

<body>
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <div id="page-container"
        class="<?= $this->uri->segment(2) == 'transaction' && $this->uri->segment(3) == '' ? 'fade page-without-sidebar page-header-fixed' : 'fade page-sidebar-fixed page-header-fixed' ?>">