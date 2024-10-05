<section class="page-section m-5" id="register">
    <div class="container">
        <div class="text-center">
            <h4 class="monst">Register</h4>
            <p class="section-subheading text-muted">Data Customer</p>
        </div>
        <div class="row text-center">
            <form action="<?= base_url('register/leds') ?>" method="POST" name="form-wizard"
                class="form-control-with-bg" enctype="multipart/form-data">
                <!-- begin wizard -->
                <div id="wizard">
                    <!-- begin wizard-step -->
                    <ul>
                        <li>
                            <a href="#step-1">
                                <span class="number">1</span>
                                <span class="info">
                                    Data Diri
                                    <small></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2">
                                <span class="number">2</span>
                                <span class="info">
                                    Upload Dokumen
                                    <small></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3">
                                <span class="number">3</span>
                                <span class="info">
                                    Lokasi Usaha
                                    <small></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-4">
                                <span class="number">4</span>
                                <span class="info">
                                    Simpan
                                    <small></small>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <!-- end wizard-step -->
                    <!-- begin wizard-content -->
                    <div>
                        <!-- begin step-1 -->
                        <div id="step-1">
                            <!-- begin fieldset -->
                            <fieldset>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-8 -->
                                    <div class="col-xl-8 offset-xl-2">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">
                                            Personal info</legend>

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Nama<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="text" name="name" pattern="[A-Z a-z]{3,50}"
                                                    placeholder="Nama Sesuai KTP" data-parsley-group="step-1"
                                                    data-parsley-required="true" class="form-control"
                                                    value="<?= $this->input->get('name') ?>" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Email <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="email" name="email" placeholder="Email"
                                                    data-parsley-group="step-1" data-parsley-required="true"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Nomor Handphone <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="tel" pattern="^628[0-9]{8,}$" name="phone"
                                                    placeholder="628xxxxxxxxx" data-parsley-group="step-1"
                                                    data-parsley-required="true" data-parsley-type="number"
                                                    class="form-control" value="<?= $this->input->get('phone') ?>" />
                                                <span style="font-size: 12px;">Note: 628xxxxxxxxx (Terdiri dari panjang
                                                    minimal 10 dan selalu dimulai dengan 628)</span>
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">No Induk KTP <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="text" pattern="^[0-9]{16,}$" name="identity_card"
                                                    placeholder="No Induk KTP" data-parsley-group="step-1"
                                                    data-parsley-required="true" data-parsley-type="number"
                                                    class="form-control" />
                                                <span style="font-size: 12px;">Nomor KTP 16 Digit.</span>
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">No Induk KK <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="text" pattern="^[0-9]{16,}$" name="family_card"
                                                    placeholder="No Induk KK" data-parsley-group="step-1"
                                                    data-parsley-required="true" data-parsley-type="number"
                                                    class="form-control" />
                                                <span style="font-size: 12px;">Nomor KK 16 Digit.</span>
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Apakah anda pernah
                                                mengajukan pinjaman? <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control" name="loan" searchable="Search here.."
                                                    data-parsley-group="step-1" data-parsley-required="true">
                                                    <option value="" disabled selected>Choose your status</option>
                                                    <option value="Ya : sudah selesai dan mengalami kredit macet">Ya :
                                                        sudah selesai dan mengalami kredit macet</option>
                                                    <option value="Ya : sudah selesai dan lancar">Ya : sudah selesai dan
                                                        lancar</option>
                                                    <option value="Ya : sedang berjalan dan mengalami kredit macet">Ya :
                                                        sedang berjalan dan pernah mengalami kredit macet</option>
                                                    <option value="Ya : sedang berjalan dan tidak pernah macet">Ya :
                                                        sedang berjalan dan tidak pernah macet</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Alamat Rumah<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <textarea name="home_address" placeholder="Alamat Lengkap Rumah"
                                                    data-parsley-group="step-1" data-parsley-required="true"
                                                    class="form-control" rows="4" cols="50"></textarea>
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">RT<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="text" pattern="^[0-9]{3,}$" name="home_rt" placeholder="RT"
                                                    data-parsley-group="step-1" data-parsley-required="true"
                                                    data-parsley-type="number" class="form-control" />
                                                <span style="font-size: 12px;">Nomor RT 3 Digit.</span>
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">RW<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="text" pattern="^[0-9]{3,}$" name="home_rw" placeholder="RW"
                                                    data-parsley-group="step-1" data-parsley-required="true"
                                                    data-parsley-type="number" class="form-control" />
                                                <span style="font-size: 12px;">Nomor RW 3 Digit.</span>
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">No. Rumah<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="text" name="home_no" placeholder="Nomor Rumah"
                                                    data-parsley-group="step-1" data-parsley-required="true"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                    </div>
                                    <!-- end col-8 -->
                                </div>
                                <!-- end row -->
                            </fieldset>
                            <!-- end fieldset -->
                        </div>
                        <!-- end step-1 -->

                        <!-- begin step-2 -->
                        <div id="step-2">
                            <!-- begin fieldset -->
                            <fieldset>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-8 -->
                                    <div class="col-xl-8 offset-xl-2">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Upload
                                            Dokumen Anda</legend>
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Upload Foto KTP Anda
                                                <span class="text-danger">Asli *</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="file" name="file_identity_card"
                                                    accept="image/png, image/jpg, image/jpeg" ata-parsley-group="step-2"
                                                    data-parsley-required="true" class="form-control" />
                                                <span style="font-size: 12px;">Note : Ukuran Foto KTP max.
                                                    2000kb.</span>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Upload Foto KK Anda
                                                <span class="text-danger">Asli *</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="file" name="file_family_card"
                                                    accept="image/png, image/jpg, image/jpeg" ata-parsley-group="step-2"
                                                    data-parsley-required="true" class="form-control" />
                                                <span style="font-size: 12px;">Note : Ukuran Foto KK max. 2000kb.</span>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                    </div>
                                    <!-- end col-8 -->
                                </div>
                                <!-- end row -->
                            </fieldset>
                            <!-- end fieldset -->
                        </div>
                        <!-- end step-2 -->

                        <!-- begin step-3 -->
                        <div id="step-3">
                            <!-- begin fieldset -->
                            <fieldset>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-8 -->
                                    <div class="col-xl-8 offset-xl-2">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Lokasi
                                            Usaha Anda</legend>
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Alamat Usaha<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <textarea name="business_address" placeholder="Alamat Lengkap Rumah"
                                                    data-parsley-group="step-3" data-parsley-required="true"
                                                    class="form-control" rows="4" cols="50"></textarea>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">RT Usaha<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="text" pattern="^[0-9]{3,}$" name="business_rt"
                                                    placeholder="RT" data-parsley-group="step-3"
                                                    data-parsley-required="true" data-parsley-type="number"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">RW Usaha<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="text" pattern="^[0-9]{3,}$" name="business_rw"
                                                    placeholder="RW" data-parsley-group="step-3"
                                                    data-parsley-required="true" data-parsley-type="number"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">No. Rumah Usaha<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="text" name="business_no" placeholder="Nomor Rumah Usaha"
                                                    data-parsley-group="step-3" data-parsley-required="true"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Provinsi <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select name="province" id="province" class="form-control"
                                                    data-parsley-group="step-3" data-parsley-required="true">
                                                    <option value="">Pilih Provinsi</option>
                                                    <?php
													foreach ($provinsi as $row) {
														echo '<option value="' . $row->id . '">' . $row->name . '</option>';
													}
													?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Kabupaten/Kota <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select name="regency" id="regency" class="form-control"
                                                    data-parsley-group="step-3" data-parsley-required="true">
                                                    <option value="">Pilih Kabupaten</option>
                                                    <?php

													?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Kecamatan <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select name="district" id="district" class="form-control"
                                                    data-parsley-group="step-3" data-parsley-required="true">
                                                    <option value="">Pilih Kecamatan</option>
                                                    <?php

													?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Kodepos <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="text" pattern="^[0-9]{5,}$" name="postal_code"
                                                    placeholder="postal_code" data-parsley-group="step-3"
                                                    data-parsley-required="true" data-parsley-type="number"
                                                    class="form-control" />
                                                <span style="font-size: 12px;">Kode Pos 5 Digit.</span>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Upload tampak depan
                                                toko <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="file" name="file_store"
                                                    accept="image/png, image/jpg, image/jpeg" ata-parsley-group="step-3"
                                                    data-parsley-required="true" class="form-control" />
                                                <span style="font-size: 12px;">Note : Ukuran Foto max. 2000kb.</span>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Kode Referral <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select name="referral_code" id="referral_code" class="form-control"
                                                    data-parsley-group="step-3" data-parsley-required="true">
                                                    <option value="">Pilih Referral</option>
                                                    <option value="INSTAGRAM">INSTAGRAM</option>
                                                    <option value="YOUTUBE">YOUTUBE</option>
                                                    <option value="FACEBOOK">FACEBOOK</option>
                                                    <option value="GOOGLE">GOOGLE</option>
                                                    <option value="WHATSAPP">WHATSAPP</option>
                                                    <option value="TEMAN/KERABAT">TEMAN/KERABAT</option>
                                                    <option value="KOMUNITAS">KOMUNITAS</option>
                                                    <option value="AMEN">AMEN</option>
                                                    <option value="PHRI">PHRI</option>
                                                    <option value="LAINNYA">LAINNYA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <div class="initial">
                                            <div class="form-group row m-b-10">
                                                <label class="col-lg-3 text-lg-right col-form-label">Kode Referral
                                                    Lainnya<span class="text-danger">*</span></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" name="referral_code2"
                                                        placeholder="Kode Referral Lainnya" data-parsley-group="step-3"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-8 -->
                                </div>
                                <!-- end row -->
                            </fieldset>
                            <!-- end fieldset -->
                        </div>
                        <!-- end step-3 -->

                        <!-- begin step-4 -->
                        <div id="step-4">
                            <div class="jumbotron m-b-0 text-center">
                                <h2 class="display-4">Apakah Anda Yakin Dengan Data Anda ?</h2>
                                <p class="lead mb-4">Jika sudah Yakin, Klik button Simpan di bawah ini.</p>
                                <p>
                                <div class="form-check">

                                    <label class="form-check-label" for="term_condition">
                                        <input class="form-check-input" type="checkbox" value="1" name="term_condition"
                                            id="term_condition" required>
                                        I agree to the
                                        <a href="javascript:;" data-toggle="modal" data-target="#termsconditions"
                                            style="color: blue">
                                            terms dan conditions
                                        </a>
                                    </label>
                                </div>
                                </p>
                                <p><button type="submit" class="btn btn-primary btn-lg">Simpan</button></p>
                            </div>
                        </div>
                        <!-- end step-4 -->
                    </div>
                    <!-- end wizard-content -->
                </div>
                <!-- end wizard -->
            </form>
        </div>
    </div>
</section>

<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script>
function validateform() {
    var email = $('#txt_emailID').val();
    if (email == null || email == "") {
        alert("Email Should Be Complusory");
        return false;
    }
}

$(document).ready(function() {

    //request data kabupaten
    $('#province').change(function() {
        var provinsi_id = $('#province').val(); //ambil value id dari provinsi

        if (provinsi_id != '') {
            $.ajax({
                url: '<?= base_url(); ?>register/get_kabupaten',
                method: 'POST',
                data: {
                    provinsi_id: provinsi_id
                },
                success: function(data) {
                    $('#regency').html(data)
                }
            });
        }
    });

    //request data kecamatan
    $('#regency').change(function() {
        var kabupaten_id = $('#regency').val(); // ambil value id dari kabupaten
        if (kabupaten_id != '') {
            $.ajax({
                url: '<?= base_url(); ?>register/get_kecamatan',
                method: 'POST',
                data: {
                    kabupaten_id: kabupaten_id
                },
                success: function(data) {
                    $('#district').html(data)
                }
            });
        }
    });
});

$('#referral_code').on('change', function() {
    if (this.value == 'LAINNYA') {
        $('.initial').show();
    } else {
        $(".initial").hide();
    }
});

$(".initial").hide();
</script>