<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $info[0]->title ?> - <?= $info[0]->name ?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/default/app.min.css'); ?>">
    <!-- ================== END BASE CSS STYLE ================== -->
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

    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image"
                    style="background-image: url(<?php echo base_url('assets/img/login-bg/login-bg-1.jpg'); ?>)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><?= $info[0]->title ?></h4>
                    <p>
                        <?= $info[0]->desc ?>.
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span> <b><?= $info[0]->title ?></b>
                        <small><?= $info[0]->desc ?></small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in-alt"></i>
                    </div>
                </div>
                <!-- end login-header -->
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
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            Not a member yet? Click <a href="<?= base_url('dashboard/register') ?>">here</a> to
                            register.
                        </div>
                        <hr />
                        <p class="text-center mb-0">
                            &copy; <?= $info[0]->name ?> All Right Reserved <?= date('Y') ?>
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
    </div>
</body>

<script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/theme/default.min.js'); ?>"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>

<script type="text/javascript">
$("#password").password('toggle');
</script>

</html>