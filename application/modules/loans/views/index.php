<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Transaction</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Transaction <small>customer...</small></h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Point of Sale</h4>
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
            <form action="<?= base_url('dashboard/transaction/insert_transaction') ?>" method="POST" name="form-wizard"
                class="form-control-with-bg" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="card m-0 shadow bg-light">
                        <div class="card-body">
                            <div class="row">

                                <!-- Invoice dan Customer -->
                                <div class="col-md-3 pr-0 col-sm-12">

                                    <div class="card me-0">
                                        <div class="card-header bg-primary text-white">
                                            <div class="card-title p-0 m-0">
                                                <i class="fa fa-file me-2"></i> Invoice
                                            </div>
                                        </div>
                                        <div class="card-body px-2 py-1">
                                            <div class="table-responsive">
                                                <table class="table table-sm mb-0">
                                                    <tr>
                                                        <td>No Invoice</td>
                                                        <td><strong id="strong_no_invoice"></strong>
                                                            <input type="hidden" name="inovice">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal</td>
                                                        <td id="td_tanggal"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>User</td>
                                                        <td><?= $this->session->userdata('first_name'); ?>
                                                            <input type="hidden" name="user_id"
                                                                value="<?= $this->session->userdata('id'); ?>">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of card invoice -->

                                    <div class="card mt-3 mb-3">
                                        <div class="card-header bg-primary text-white">
                                            <div class="card-title p-0 m-0">
                                                <i class="fa fa-users me-2"></i>Penunjang
                                            </div>
                                        </div>
                                        <div class="card-body px-2 py-1">
                                            <div class="table-responsive">
                                                <table class="table table-sm mb-1">
                                                    <tr>
                                                        <td>Tanggal Pinjam</td>
                                                        <td>
                                                            <input type="date" class="form-control" name="start_date"
                                                                required />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Dikembalikan</td>
                                                        <td>
                                                            <input type="date" class="form-control" name="start_date"
                                                                required />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tujuan Peminjaman</td>
                                                        <td>
                                                            <textarea class="form-control" name="objective"
                                                                required></textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of card custome -->

                                </div>
                                <!-- endInvoice dan Customer -->

                                <div class="col-md-9">

                                    <div class="table-responsive">
                                        <table id="tblTransaksi"
                                            class="table table-sm table-hover table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="185px">Kode Barang</Oh>
                                                    <th>Nama Barang</Oh>
                                                    <th>Harga</th>
                                                    <th width="85x">Qty</th>
                                                    <th>Subtotal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                <tr>
                                                    <td width="282px" colspan="2">
                                                        <input type="hidden" name="product_id[]" id="product_id">
                                                        <input type="text" name="product_idx[]" id="product_idx"
                                                            class="form-control" placeholder="Kode / Nama Barang"
                                                            autofocus value="" tabindex="1">
                                                    </td>

                                                    <td width="153px">
                                                        <input type="text" name="price[]" id="price"
                                                            class="form-control" placeholder="Rp(harga)"
                                                            style="cursor: not-allowed;">
                                                    </td>

                                                    <td width="83px">
                                                        <input type="number" name="quantity[]" id="quantity"
                                                            class="hanya-angka form-control" placeholder="Qty" min="1"
                                                            tabindex="2">
                                                    </td>

                                                    <td>
                                                        <input type="text" name="amount[]" id="amount"
                                                            class="form-control" placeholder="Rp(subtotal)"
                                                            style="cursor: not-allowed;">
                                                    </td>

                                                    <td width="60px">
                                                        <button class="btn btn-primary tambah-form" id="btnAdd"
                                                            tabindex="3">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </thead>

                                            <tbody id="tbodyTransaksi">

                                            </tbody>
                                        </table>
                                    </div>

                                    <button type="button" id="jumlahkolom" value="1" style="display:none"></button>

                                    <div class="row justify-content-end">
                                        <div class="col-md-4 text-right mt-3">
                                            <button class="btn btn-primary ms-1" id="btnSimpan" type="submit">
                                                <i class="fa fa-save me-2"></i> Simpan
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end of row -->
                                </div>
                                <!-- end of col-md-9 -->
                            </div>
                            <!-- end of row -->
                        </div>
                        <!-- end of card-body(utama) -->
                    </div>
                    <!-- end of card m-0 -->
                </div>
            </form>
        </div>
    </div>
    <!-- end panel -->

    <p>
        <a href="javascript:history.back(-1);" class="btn btn-success">
            <i class="fa fa-arrow-circle-left"></i> Back to previous page
        </a>
    </p>

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">List Transaction</h4>
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
            <div class="table-responsive">
                <div class="col-xl-12">
                    <table id="tbl-transaction" class="table table-striped table-bordered table-td-valign-middle"
                        width="100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>TIMESTAMP</th>
                                <th>INVOICE NO</th>
                                <th>AMOUNT</th>
                                <th>STATUS TRX</th>
                                <th>INSTALLMENTS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end panel -->
</div>


<!-- Manage -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- jQuery UI JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script src="<?php echo base_url('assets/js/app-manage.js'); ?>"></script>

<script>
getNoInvoice()

setInterval('getDateTime()', 1000)

// mendapatkan tanggal sekarang
function getDateTime() {
    let now = new Date()
    let year = now.getFullYear()
    let month = now.getMonth() + 1
    let day = now.getDate()
    let hour = now.getHours()
    let minute = now.getMinutes()
    let second = now.getSeconds()

    if (month.toString().length == 1) {
        month = '0' + month
    }
    if (day.toString().length == 1) {
        day = '0' + day
    }
    if (hour.toString().length == 1) {
        hour = '0' + hour
    }
    if (minute.toString().length == 1) {
        minute = '0' + minute
    }
    if (second.toString().length == 1) {
        second = '0' + second
    }
    let dateTime = day + '/' + month + '/' + year + ' ' + hour + ':' + minute + ':' + second

    $('#td_tanggal').html(dateTime)

    $('input[name="tanggal"]').val(dateTime)
}

<?php $date = date('Ymd'); ?>

// membuat random string untuk no invoice
function getNoInvoice() {
    let r = Math.floor(Math.random() * 1000000);
    upR = 'INV/' + <?= $date ?> + '/' + r
    $('#strong_no_invoice').html(upR)
    $('input[name="invoice_no"]').val(upR)
}
</script>

<script>
$(document).ready(function() {
    var i = 2;

    $(".tambah-form").on('click', function() {
        let dataTrx = '<tr class="rec-element" id="listbarang">' +

            '<td width="282px" colspan="2">' +
            '<input type="hidden" name="product_id[]" id="product_id' + i + '">' +
            '<select id="product_idx' + i +
            '" name="product_idx[]" class="form-control select2bs4_daftar" style="width: 100%;" required>' +
            '</td>' +

            '<td width="153px">' +
            '<input type="text" name="price[]" id="price' + i +
            '" class="form-control" placeholder="Rp(harga)"  style="cursor: not-allowed;">' +
            '</td>' +

            '<td width="83px">' +
            '<input type="number" name="quantity[]" id="quantity' + i +
            '" class="hanya-angka form-control" placeholder="Qty"  min="1" tabindex="2">' +
            '</td>' +

            '<td>' +
            '<input type="text" name="amount[]" id="amount' + i +
            '" class="form-control" placeholder="Rp(subtotal)" style="cursor: not-allowed;">' +
            '</td>' +

            '<td width="60px">' +
            '<button type="button" class="btn btn-danger del-element"><i class="fa fa-window-close"></i></button>' +
            '<td>' +

            '</tr>';

        $(dataTrx).insertBefore("#tbodyTransaksi");

        $('#jumlahkolom').val(i + 1);

        var apa = i + 1 - 1;

        $('#product_idx' + apa).select2({
            placeholder: "Pilih Product",
            theme: 'bootstrap4',
            ajax: {
                dataType: 'json',
                delay: 250,
                url: '<?= base_url('admin/transaction/dataProduct'); ?>',
                data: function(params) {
                    return {
                        searchTerm: params.term
                    }
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(obj) {
                            return {
                                id: obj.id,
                                text: obj.name
                            };
                        })
                    };
                },
            },
        });

        $('#product_idx' + apa).change(function() {

            var product = $('#product_idx' + apa).val(); //ambil value id dari provinsi

            $.ajax({
                url: '<?= base_url(); ?>admin/transaction/listProduct',
                method: 'POST',
                data: {
                    searchTerm: product
                },
                success: function(data) {
                    const obj = JSON.parse(data)
                    console.log(obj.id);
                    jQuery("#product_id" + apa).val(obj.product_id);
                    jQuery("#price" + apa).val(obj.price);
                    jQuery("#quantity" + apa).val(1);
                    jQuery("#amount" + apa).val(1 * obj.price);

                }
            });

            $('#quantity' + apa).on('keyup change', function() {
                $('#amount' + apa).val(parseInt($('#quantity' + apa).val()) * parseInt(
                    $('#price' + apa).val()))
            })

        });
        i++;
    });

    $(document).on('click', '.del-element', function(e) {
        e.preventDefault()
        i--;
        //$(this).parents('.rec-element').fadeOut(400);
        $(this).parents('.rec-element').remove();
        $('#jumlahkolom').val(i - 1);
    });
});
</script>

<script>
$(function() {
    $(document).on("click", "#submit", function(e) {
        var leads = $('#field-autocomplete').val();
        if (leads == null || leads == "") {
            alert("Silahkan pilih Customer");
            return false;
        }
    });
});

// autocomplete functionality
if (jQuery('input#leads_idx').length > 0) {
    jQuery('input#leads_idx').typeahead({
        displayText: function(item) {
            return item.name + ' | ' + item.identity_card
        },
        afterSelect: function(item) {
            this.$element[0].value = item.name;
            jQuery("input#field-autocomplete").val(item.id);
            jQuery("input#leads_id").val(item.id);
            jQuery("#delivery_address").val(item.business_address);
            jQuery("#delivery_latitude").val(item.delivery_latitude);
            jQuery("#delivery_longitude").val(item.delivery_longitude);
        },
        source: function(query, process) {
            jQuery.ajax({
                url: "<?php echo base_url('admin/transaction/getCustomer'); ?>",
                data: {
                    query: query.toUpperCase()
                },
                dataType: "json",
                type: "POST",
                success: function(data) {
                    process(data)
                }
            })
        }
    });
}

if (jQuery('input#product_idx').length > 0) {
    jQuery('input#product_idx').typeahead({
        displayText: function(item) {
            return item.sku + ' | ' + item.name
        },
        afterSelect: function(item) {
            this.$element[0].value = item.name;
            jQuery("#product_id").val(item.id);
            jQuery("#price").val(item.price);
            jQuery("#quantity").val(1);
            jQuery("#amount").val(1 * item.price);
        },
        source: function(query, process) {
            jQuery.ajax({
                url: "<?php echo base_url('admin/transaction/getProduct'); ?>",
                data: {
                    query: query.toUpperCase()
                },
                dataType: "json",
                type: "POST",
                success: function(data) {
                    process(data)
                }
            })
        }
    });

    $('#quantity').on('keyup change', function() {
        $('#amount').val(parseInt($('#quantity').val()) * parseInt($('#price').val()))
    })
}
</script>