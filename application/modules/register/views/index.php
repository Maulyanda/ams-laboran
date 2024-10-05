<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $info[0]->title ?> - <?= $info[0]->name ?></title>
    <link rel="icon" href="<?= base_url($info[0]->favicon_logo); ?>">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/default/app.min.css'); ?>">
    <!-- ================== END BASE CSS STYLE ================== -->
</head>

<body class="pace-top">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin register -->
        <div class="register register-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image"
                    style="background-image: url(<?php echo base_url('assets/img/login-bg/login-bg-1.jpg'); ?>)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><?= $info[0]->title ?></h4>
                    <p>
                        <?= $info[0]->desc ?>
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin register-header -->
                <h1 class="register-header">
                    Sign Up
                    <small>Create your account.</small>
                </h1>
                <!-- end register-header -->
                <!-- begin register-content -->
                <div class="register-content">
                    <form action="<?= base_url('register/insert_data'); ?>" method="POST" class="margin-bottom-0"
                        enctype="multipart/form-data">
                        <label class="control-label">Name <span class="text-danger">*</span></label>
                        <div class="row row-space-10">
                            <div class="col-md-6 m-b-15">
                                <input type="text" class="form-control" name="first_name" placeholder="First name"
                                    required />
                            </div>
                            <div class="col-md-6 m-b-15">
                                <input type="text" class="form-control" name="last_name" placeholder="Last name"
                                    required />
                            </div>
                        </div>
                        <label class="control-label">NIP/NPM <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="username" placeholder="Nip/Npm"
                                    required />
                            </div>
                        </div>
                        <label class="control-label">Email <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="email" class="form-control" name="email" placeholder="Email address"
                                    required />
                            </div>
                        </div>
                        <label class="control-label">Identity card <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="identity_card"
                                    accept="image/png, image/jpg, image/jpeg" required />
                            </div>
                        </div>
                        <label class="control-label">Password <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" data-toggle="password" required />
                            </div>
                        </div>
                        <label class="control-label">Password Konfirmasi <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="konfirmasi_password"
                                    placeholder="Password" data-toggle="password" required />
                            </div>
                        </div>
                        <div class="checkbox checkbox-css m-b-30">
                            <div class="checkbox checkbox-css m-b-30">
                                <input type="checkbox" id="agreement_checkbox" value="">
                                <label for="agreement_checkbox">
                                    By clicking Sign Up, you agree to our <a href="javascript:;">Terms</a> and that you
                                    have read our <a href="javascript:;">Data Policy</a>, including our <a
                                        href="javascript:;">Cookie Use</a>.
                                </label>
                            </div>
                        </div>
                        <div class="register-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                        </div>
                        <div class="m-t-30 m-b-30 p-b-30">
                            Already a member? Click <a href="<?= base_url('dashboard/login') ?>">here</a> to login.
                        </div>
                        <hr />
                        <p class="text-center mb-0">
                            &copy; <?= $info[0]->name ?> All Right Reserved <?= date('Y') ?>
                        </p>
                    </form>
                </div>
                <!-- end register-content -->
            </div>
            <!-- end right-content -->
        </div>
        <!-- end register -->
    </div>
</body>

<script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/theme/default.min.js'); ?>"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>

<script type="text/javascript">
$("#password").password('toggle');
</script>


<script type="text/javascript">
window.onload = function() {
    document.getElementById("password").onchange = validatePassword;
    document.getElementById("konfirmasi_password").onchange = validatePassword;
}

function validatePassword() {
    var pass2 = document.getElementById("konfirmasi_password").value;
    var pass1 = document.getElementById("password").value;
    console.log(pass2);
    console.log(pass1);
    console.log(pass1 == pass2);

    if (pass1.length >= 6)
        document.getElementById("password").setCustomValidity('');
    else
        document.getElementById("password").setCustomValidity("Password Kurang dari 6 character");


    if (pass1 != pass2)
        document.getElementById("konfirmasi_password").setCustomValidity("Password Tidak Sama, Coba Lagi");
    else
        document.getElementById("konfirmasi_password").setCustomValidity('');
}
</script>

</html>