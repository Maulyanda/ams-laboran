$(document).ready(function () {

    var base_url = document.URL;

    if ($('#tbl-leads').length !== 0) {
        var url = base_url+'/getData';
        $('#tbl-leads').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    if ($('#tbl-kyc-notyet').length !== 0) {
        var url = base_url+'/getNotyetKyc';
        $('#tbl-kyc-notyet').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    if ($('#tbl-kyc-done').length !== 0) {
        var url = base_url+'/getDoneKyc';
        $('#tbl-kyc-done').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    $('#addKyc').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        
        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
        modal.find('#name').attr("value", div.data('name'));
        modal.find('#phone').attr("value", div.data('phone'));
        modal.find('#identity_card').attr("value", div.data('identity_card'));
        modal.find('#family_card').attr("value", div.data('family_card'));
        modal.find('#file_identity_cardx').attr("value", div.data('file_identity_card'));
        modal.find('#file_family_cardx').attr("value", div.data('file_family_card'));
        modal.find('#file_storex').attr("value", div.data('file_store'));
        modal.find('#home_address').val(div.data('home_address'));

    });

    if ($('#tbl-survey-notyet').length !== 0) {
        var url = base_url+'/getNotyetSurvey';
        $('#tbl-survey-notyet').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    if ($('#tbl-survey-high').length !== 0) {
        var url = base_url+'/getHighSurvey';
        $('#tbl-survey-high').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    if ($('#tbl-survey-low').length !== 0) {
        var url = base_url+'/getLowSurvey';
        $('#tbl-survey-low').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    $('#survey').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)

        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
        modal.find('#name').attr("value", div.data('name'));
        modal.find('#phone').attr("value", div.data('phone'));
        modal.find('#identity_card').attr("value", div.data('identity_card'));
        modal.find('#shop_location_sc').val(div.data('business_address'));

    });

    if ($('#tbl-notyet-leads').length !== 0) {
        var url = base_url+'/getNotyet';
        $('#tbl-notyet-leads').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    if ($('#tbl-approve-leads').length !== 0) {
        var url = base_url+'/getApprove';
        $('#tbl-approve-leads').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }
    
    if ($('#tbl-reject-leads').length !== 0) {
        var url = base_url+'/getReject';
        $('#tbl-reject-leads').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    if ($('#tbl-transaction').length !== 0) {
        var url = base_url+'/data_transaction';
        $('#tbl-transaction').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    if ($('#tbl-delivery').length !== 0) {
        var url = base_url+'/data_transaction';
        $('#tbl-delivery').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    $('#send').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)

        // Isi nilai pada field
        modal.find('#transaction_id').attr("value", div.data('transaction_id'));
        modal.find('#delivery_address').val(div.data('delivery_address'));

    });

    if ($('#tbl-send').length !== 0) {
        var url = base_url+'/data_delivery';
        $('#tbl-send').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    if ($('#tbl-complete').length !== 0) {
        var url = base_url+'/data_delivery';
        $('#tbl-complete').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    if ($('#tbl-installments').length !== 0) {
        var url = base_url+'/data_installments';
        $('#tbl-installments').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }
});