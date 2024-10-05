<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $info[0]->title ?> - <?= $info[0]->name ?></title>
    <link rel="icon" type="image/png" href="<?= base_url($info[0]->favicon_logo); ?>">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- <link href="assets/css/default/app.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/default/app.min.css'); ?>">
</head>
<style type="text/css">
.lingkaran {
    width: 100px;
    height: 100px;
}
</style>

<body class="pace-top">
    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>

    <!-- begin login-cover -->
    <div class="login-cover">
        <div class="login-cover-image"
            style="background-image: url(<?php echo base_url('assets/img/login-bg/login-bg-1.jpg'); ?>)"
            data-id="login-cover-image"></div>
        <div class="login-cover-bg"></div>
    </div>
    <!-- end login-cover -->

    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> <b><?= $info[0]->title ?></b>
                    <small>&copy; <?= date('Y') ?> <?= $info[0]->name ?></small>
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
                <form action="<?= base_url('login/proses'); ?>" method="POST" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control form-control-lg inverse-mode" name="username"
                            placeholder="NIP/NPM" required />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" class="form-control form-control-lg inverse-mode" name="password"
                            placeholder="Password" data-toggle="password" required />
                    </div>
                    <center><b><?php echo $this->session->flashdata('error') ?></b></center>
                    <br>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Login</button>
                    </div>
                    <br>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->


        <!-- begin login-bg -->
        <ul class="login-bg-list clearfix">
            <li class="active"><a href="javascript:;" data-click="change-bg"
                    data-img="<?php echo base_url('assets/img/login-bg/login-bg-1.jpg'); ?>"
                    style="background-image: url(<?php echo base_url('assets/img/login-bg/login-bg-1.jpg'); ?>)"></a>
            </li>
            <li><a href="javascript:;" data-click="change-bg"
                    data-img="<?php echo base_url('assets/img/login-bg/login-bg-2.jpg'); ?>"
                    style="background-image: url(<?php echo base_url('assets/img/login-bg/login-bg-2.jpg'); ?>)"></a>
            </li>

        </ul>
        <!-- end login-bg -->
    </div>


    <script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/theme/default.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/demo/login-v2.demo.js'); ?>"></script>
</body>

</html>

<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>

<script type="text/javascript">
$("#password").password('toggle');
</script>