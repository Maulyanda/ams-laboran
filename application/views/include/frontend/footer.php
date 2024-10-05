    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div style="margin-top: 1%; text-align:center;">
                        <img class="img-fluid" width="80%" src="<?= base_url($info[0]->footer_logo); ?>" width="60%">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div style="margin-top: 50px;">
                        <p><?= $info[0]->desc ?></p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h2 style="color:white">Social Media</h2>
                    <ul class="list-unstyled li-space-lg p-small">
                        <li>
                            <a href="<?= $info[0]->linkedin_link ?>" target="_blank" class="btn btn-lg btn-info">
                                <span class="d-flex align-items-center text-left">
                                    <i class="fa fa-linkedin fa-2x mr-8 text-white"></i>
                                </span>
                            </a>
                            <a href="<?= $info[0]->facebook_link ?>" target="_blank" class="btn btn-lg btn-primary">
                                <span class="d-flex align-items-center text-left">
                                    <i class="fa fa-facebook fa-2x mr-8 text-white"></i>
                                </span>
                            </a>
                            <a href="<?= $info[0]->instagram_link ?>" target="_blank" class="btn btn-lg btn-danger">
                                <span class="d-flex align-items-center text-left">
                                    <i class="fa fa-instagram fa-2x mr-8 text-white"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h2 style="color:white">Contact</h2>
                    <p class="section-subheading">
                        <span class="fa fa-whatsapp"></span> <?= $info[0]->whatsapp ?>
                    </p>
                    <p class="section-subheading">
                        <span class="fa fa-envelope"></span> <?= $info[0]->email ?>
                    </p>
                    <p class="section-subheading">
                        <span> <?= $info[0]->address ?></span>
                    </p>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->
    <!-- end of footer -->

    <!-- Copyright -->
    <div class="copyright" style="background-color: #F0F8FF;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="p-small" style="color: black;">
                        &copy; <?= date('Y'); ?> <?= $info[0]->name ?>
                    </span>
                </div>
            </div>
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
    <!-- end of copyright -->


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="<?php echo base_url('assets/frontend/custom/js/jquery.min.js'); ?>"></script>
    <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="<?php echo base_url('assets/frontend/custom/js/bootstrap.min.js'); ?>"></script>
    <!-- Bootstrap framework -->
    <script src="<?php echo base_url('assets/frontend/custom/js/scripts.js'); ?>"></script> <!-- Custom scripts -->

    <script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/theme/default.min.js'); ?>"></script>
    <!-- ================== END BASE JS ================== -->
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?php echo base_url('assets/plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>">
    </script>
    <script
        src="<?php echo base_url('assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables.net-buttons/js/buttons.flash.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables.net-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables.net-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/pdfmake/build/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/pdfmake/build/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jszip/dist/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/demo/table-manage-buttons.demo.js'); ?>"></script>

    <!-- v1 -->
    <script src="<?php echo base_url('assets/plugins/flot/jquery.flot.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot/jquery.flot.time.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot/jquery.flot.resize.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot/jquery.flot.pie.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-sparkline/jquery.sparkline.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jvectormap-next/jquery-jvectormap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js'); ?>">
    </script>
    <script src="<?php echo base_url('assets/js/demo/dashboard.js'); ?>"></script>

    <!-- icons  -->
    <script src="<?php echo base_url('assets/plugins/highlight.js/highlight.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/demo/render.highlight.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/select2/dist/js/select2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/moment/min/moment.min.js'); ?>"></script>
    <script
        src="<?php echo base_url('assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

    <!-- <script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script> -->
    <script
        src="<?php echo base_url('assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js'); ?>">
    </script>
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
    <script src="<?php echo base_url('assets/js/demo/form-wysiwyg.demo.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/parsleyjs/dist/parsley.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/smartwizard/dist/js/jquery.smartWizard.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/demo/form-wizards-validation.demo.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/d3/d3.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/nvd3/build/nv.d3.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/clipboard/dist/clipboard.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/demo/widget.demo.js'); ?>"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script>
    </body>

    </html>