<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Maulyanda">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="<?= $info[0]->name ?>" /> <!-- website name -->
    <meta property="og:site" content="<?= $info[0]->title ?>" /> <!-- website link -->
    <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <!-- Webpage Title -->
    <title><?= $info[0]->title ?> - <?= $info[0]->name ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="<?php echo base_url('assets/frontend/custom/css/bootstrap.css'); ?>" rel="stylesheet"> -->
    <link href="<?php echo base_url('assets/frontend/custom/css/swiper.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/custom/css/styles.css'); ?>" rel="stylesheet">

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="<?php echo base_url('assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css'); ?>"
        rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>"
        rel="stylesheet" />
    <link
        href="<?php echo base_url('assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css'); ?>"
        rel="stylesheet" />
    <link
        href="<?php echo base_url('assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet'); ?>" />

    <!-- v1 -->
    <link href="<?php echo base_url('assets/plugins/jvectormap-next/jquery-jvectormap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'); ?>"
        rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/gritter/css/jquery.gritter.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" />
    <link
        href="<?php echo base_url('assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); ?>"
        rel="stylesheet" />

    <link href="<?php echo base_url('assets/plugins/smartwizard/dist/css/smart_wizard.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/nvd3/build/nv.d3.css'); ?>" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url($info[0]->favicon_logo); ?>">

    <style type='text/css'>
        /*<![CDATA[*/
        @font-face {
            font-family: "fontfutura";
            src: url("https://fonts.googleapis.com/css?family=Open+Sans") format("ttf");
            font-weight: normal;
            font-style: normal;
        }

        a.btn-google {
            color: #fff
        }

        .btn {
            padding: 10px 16px;
            margin: 5px;
            font-size: 18px;
            line-height: 1.3333333;
            border-radius: 6px;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            font-weight: 500;
            text-decoration: none;
            display: inline-block
        }

        .btn:active:focus,
        .btn:focus {
            outline: 0
        }

        .btn:focus,
        .btn:hover {
            color: #333;
            text-decoration: none;
            outline: 0
        }

        .btn:active {
            outline: 0;
            -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
            box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125)
        }

        .btn-google {
            color: #fff;
            background-color: #111;
            border-color: #000;
            padding: 15px 16px 5px 40px;
            position: relative;
            font-family: fontfutura;
            font-weight: 600
        }

        .btn-google:focus {
            color: #fff;
            background-color: #555;
            border-color: #000
        }

        .btn-google:active,
        .btn-google:hover {
            color: #fff;
            background-color: #555;
            border-color: #000;
        }

        .btn-google:before {
            content: "";
            background-image: url(https://4.bp.blogspot.com/-52U3eP2JDM4/WSkIT1vbUxI/AAAAAAAArQA/iF1BeARv2To-2FGQU7V6UbNPivuv_lccACLcB/s30/nexus2cee_ic_launcher_play_store_new-1.png);
            background-size: cover;
            background-repeat: no-repeat;
            width: 30px;
            height: 30px;
            position: absolute;
            left: 6px;
            top: 50%;
            margin-top: -15px
        }

        .btn-google:after {
            content: "GET IT ON";
            position: absolute;
            top: 5px;
            left: 40px;
            font-size: 10px;
            font-weight: 400;
        }

        /*]]>*/
    </style>
</head>

<body data-spy="scroll" data-target=".fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <div class="container">
            <!-- Image Logo -->
            <a class="navbar-brand" href="#" target="_blank">
                <img src="<?php echo base_url($info[0]->colored_logo); ?>" alt="" width="100%" height="40"
                    class="d-inline-block align-text-top">
            </a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- <span> -->
            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#register">Register</a>
                    </li>
                </ul>
            </div> <!-- end of navbar-collapse -->
            <!-- </span> -->

            <a class="btn btn-google" href="<?= $info[0]->playstore_link ?>" target="_blank" title="Google Play">Google
                Play</a>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row p-5">
                <div class="col-lg-6 col-xl-6">
                    <div class="image-container">
                        <img class="img-fluid" src="<?= base_url($info[0]->content_image); ?>" width="60%">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6 col-xl-5">
                    <div class="text-container">
                        <h1 class="brand"><?= $info[0]->title ?></h1>
                        <p class="p-large"><?= $info[0]->sub_title ?></p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->

            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->