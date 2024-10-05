<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Informations</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Manage and control <small>your content seamlessly with our Dashboard...</small></h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Information Configurations</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                        class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                        class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                        class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="<?= base_url('informations/update_informations') ?>" enctype="multipart/form-data"
                method="POST">
                <input class="form-control" type="hidden" name="id" id="id" value="<?= $informations[0]->id ?>" />
                <fieldset>
                    <legend class="m-b-15">Profile</legend>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-7">
                            <input type="text" name="name" value="<?= $informations[0]->name ?>" class="form-control"
                                placeholder="Name" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Description</label>
                        <div class="col-md-7">
                            <input type="text" name="desc" value="<?= $informations[0]->desc ?>" class="form-control"
                                placeholder="Description" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Title</label>
                        <div class="col-md-7">
                            <input type="text" name="title" value="<?= $informations[0]->title ?>" class="form-control"
                                placeholder="Title" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Sub Title</label>
                        <div class="col-md-7">
                            <input type="text" name="sub_title" value="<?= $informations[0]->sub_title ?>"
                                class="form-control" placeholder="Sub Title" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-7">
                            <input type="email" name="email" value="<?= $informations[0]->email ?>" class="form-control"
                                placeholder="Email" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Whatsapp</label>
                        <div class="col-md-7">
                            <input type="text" name="whatsapp" value="<?= $informations[0]->whatsapp ?>"
                                class="form-control" placeholder="Nomor Whatsapp" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Address</label>
                        <div class="col-md-7">
                            <input type="text" name="address" value="<?= $informations[0]->address ?>"
                                class="form-control" placeholder="Address" />
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="m-b-15">Link</legend>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Facebook</label>
                        <div class="col-md-7">
                            <input type="text" name="facebook_link" value="<?= $informations[0]->facebook_link ?>"
                                class="form-control" placeholder="Facebook Link" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Instagram</label>
                        <div class="col-md-7">
                            <input type="text" name="instagram_link" value="<?= $informations[0]->instagram_link ?>"
                                class="form-control" placeholder="Instagram Link" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">LinkeIn</label>
                        <div class="col-md-7">
                            <input type="text" name="linkedin_link" value="<?= $informations[0]->linkedin_link ?>"
                                class="form-control" placeholder="LinkeIn Link" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Play Store</label>
                        <div class="col-md-7">
                            <input type="text" name="playstore_link" value="<?= $informations[0]->playstore_link ?>"
                                class="form-control" placeholder="Play Store Link" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">App Store</label>
                        <div class="col-md-7">
                            <input type="text" name="appstore_link" value="<?= $informations[0]->appstore_link ?>"
                                class="form-control" placeholder="App Store Link" />
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="m-b-15">Logo</legend>
                    <div class="form-group row m-b-15">
                        <div class="col-md-12">
                            <label class="col-md-3 col-form-label">Content Image</label>
                            <div class="mb-4 d-flex justify-content-center">
                                <img id="selectedImageContent" src="<?= base_url($informations[0]->content_image) ?>"
                                    alt="example placeholder" style="width: 300px;" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                    <input type="hidden" name="content_image_old"
                                        value="<?= $informations[0]->content_image ?>">
                                    <label class="form-label text-white m-1" for="content_image">Choose file</label>
                                    <input type="file" class="form-control d-none"
                                        accept="image/png, image/jpg, image/jpeg" id="content_image"
                                        name="content_image"
                                        onchange="displaySelectedImage(event, 'selectedImageContent')" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <div class="col-md-12">
                            <label class="col-md-3 col-form-label">Favicon Logo</label>
                            <div class="mb-4 d-flex justify-content-center">
                                <img id="selectedImageFav" src="<?= base_url($informations[0]->favicon_logo) ?>"
                                    alt="example placeholder" style="width: 300px;" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                    <input type="hidden" name="favicon_logo_old"
                                        value="<?= $informations[0]->favicon_logo ?>">
                                    <label class="form-label text-white m-1" for="favicon_logo">Choose file</label>
                                    <input type="file" class="form-control d-none"
                                        accept="image/png, image/jpg, image/jpeg, image/webp" id="favicon_logo"
                                        name="favicon_logo"
                                        onchange="displaySelectedImage(event, 'selectedImageFav')" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <div class="col-md-12">
                            <label class="col-md-3 col-form-label">Base Logo</label>
                            <div class="mb-4 d-flex justify-content-center">
                                <img id="selectedImageBase" src="<?= base_url($informations[0]->base_logo) ?>"
                                    alt="example placeholder" style="width: 300px;" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                    <label class="form-label text-white m-1" for="base_logo">Choose file</label>
                                    <input type="file" class="form-control d-none" id="base_logo" name="base_logo"
                                        onchange="displaySelectedImage(event, 'selectedImageBase')" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <div class="col-md-12">
                            <label class="col-md-3 col-form-label">Colored Logo</label>
                            <div class="mb-4 d-flex justify-content-center">
                                <img id="selectedImageColored" src="<?= base_url($informations[0]->colored_logo) ?>"
                                    alt="example placeholder" style="width: 300px;" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                    <label class="form-label text-white m-1" for="colored_logo">Choose file</label>
                                    <input type="file" class="form-control d-none" id="colored_logo" name="colored_logo"
                                        onchange="displaySelectedImage(event, 'selectedImageColored')" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <div class="col-md-12">
                            <label class="col-md-3 col-form-label">Footer Logo</label>
                            <div class="mb-4 d-flex justify-content-center">
                                <img id="selectedImageFooter" src="<?= base_url($informations[0]->footer_logo) ?>"
                                    alt="example placeholder" style="width: 300px;" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                    <label class="form-label text-white m-1" for="footer_logo">Choose file</label>
                                    <input type="file" class="form-control d-none" id="footer_logo" name="footer_logo"
                                        onchange="displaySelectedImage(event, 'selectedImageFooter')" />
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-md-7 offset-md-3">
                        <button type="submit" class="btn btn-sm btn-primary m-r-5">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end panel -->
</div>

<!-- Manage -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app-manage.js'); ?>"></script>

<script>
    function displaySelectedImage(event, elementId) {
        const selectedImage = document.getElementById(elementId);
        const fileInput = event.target;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                selectedImage.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    }

    // function displaySelectedContent(event, elementId) {
    //     const selectedImage = document.getElementById(elementId);
    //     const fileInput = event.target;

    //     if (fileInput.files && fileInput.files[0]) {
    //         const reader = new FileReader();

    //         reader.onload = function(e) {
    //             selectedImage.src = e.target.result;
    //         };

    //         reader.readAsDataURL(fileInput.files[0]);
    //     }
    // }

    // function displaySelectedFavicon(event, elementId) {
    //     const selectedImage = document.getElementById(elementId);
    //     const fileInput = event.target;

    //     if (fileInput.files && fileInput.files[0]) {
    //         const reader = new FileReader();

    //         reader.onload = function(e) {
    //             selectedImage.src = e.target.result;
    //         };

    //         reader.readAsDataURL(fileInput.files[0]);
    //     }
    // }
</script>