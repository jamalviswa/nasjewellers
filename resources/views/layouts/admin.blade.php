<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>N.A.S Jewellers - Salem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="N.A.S Jewellers,Idappadi,Salem" name="description" />
    <meta content="N.A.S" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{URL::to('images/logo.png')}}">

    <!-- preloader css -->
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/preloader.min.css') }}" type="text/css" /> -->

    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('libs/flatpickr/flatpickr.min.css') }}">

    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="{{ URL::asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="{{ URL::asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Sweetalert Css-->
    <link rel="stylesheet" href="{{ URL::asset('css/sweetalert.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

</head>

<body data-sidebar="light" data-layout-mode="light" data-topbar="light">

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== Header Start ========== -->
        @include('header')
        <!-- ========== Header End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('sidebar')
        <!-- ========== Left Sidebar End ========== -->

        <!-- ========== Main Content Start ========== -->
        @yield('content')
        <!-- ========== Main Content End ========== -->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ URL::asset('libs/feather-icons/feather.min.js') }}"></script>

    <!-- pace js -->
    <script src="{{ URL::asset('libs/pace-js/pace.min.js') }}"></script>

    <!-- datepicker js -->
    <script src="{{ URL::asset('libs/flatpickr/flatpickr.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ URL::asset('js/app.js') }}"></script>

    <!-- Sweetalert JS -->
    <script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>



    <?php
    if (session()->has('message')) {
        $success = session()->get('message');
        $type = session()->get('alert-class');
    ?>
        <script>
            swal({
                title: "<?php echo ($type == 'success') ? 'Success' : "Error" ?>",
                text: "<?php echo $success; ?>",
                type: "<?php echo $type; ?>",
                showCancelButton: false,
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    <?php }
    ?>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure, Do you want Delete this Record?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <a class="btn btn-primary" href="javascript:;">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteModal').modal('show');
            $('#deleteModal').find('.btn-primary').attr('href', $(this).attr('href'));
        });

        $('.customer').hide();
        $('.dealer').show();
        $(document).on('click', '.dealers', function() {
            if ($(this).val() == 'Dealer' && $(this).is(':checked')) {
                $('.customer').hide();
                $('.dealer').show();
                $('.customer input').val('');
                $('.dealer input').val('');
                $('.type[value="Customer"]').prop("checked", false);
            } else if ($(this).val() == 'Customer' && $(this).is(':checked')) {
                $('.customer').show();
                $('.dealer').hide();
                $('.customer input').val('');
                $('.dealer input').val('');
                $('.type[value="Dealer"]').prop("checked", false);
            } else {
                $('.customer').hide();
                $('.dealer').show();
                $('.customer input').val('');
                $('.dealer input').val('');
                $('.type[value="Dealer"]').prop("checked", false);
                $('.type[value="Customer"]').prop("checked", false);
            }
        });

        $('#customer').change(function() {
            var customer = $(this).val();
            $.ajax({
                url: "{{route('instocks.ajax')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "mobile_number": customer
                },
                dataType: 'html',
                success: function(data) {
                    $("#mobile").html(data);
                }
            });
        });
        $('#customer').change(function() {
            var customer = $(this).val();
            $.ajax({
                url: "{{route('instocks.ajax')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "address": customer
                },
                dataType: 'html',
                success: function(data) {
                    $("#address").html(data);
                }
            });
        });
        $('#customer').change(function() {
            var customer = $(this).val();
            $.ajax({
                url: "{{route('instocks.ajax')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "state": customer
                },
                dataType: 'html',
                success: function(data) {
                    $("#state").html(data);
                }
            });
        });

        $('#goldweight').change(function() {
            var weight = $(this).val();
            $.ajax({
                url: "{{route('outstocks.ajax')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "weight": weight
                },
                dataType: 'html',
                success: function(data) {
                    $("#goldweight1").html(data);
                }
            });
        });

        $(document).ready(function() {
            $('#addgoldweight').on('click', function() {
                var html = '';
                html += '<li>';
                html += '<div class="row">';
                html += '<div class="col-md-6">';
                html += '<div class="mb-3">';
                html += '<label class="form-label">Weight<span class="text-danger"> *</span></label>';
                html += '<div class="input-group">';
                html += '<input type="text" class="form-control weightjam" id="weight1" autocomplete="off" name="weight[]" value="">';
                html += '<div class="input-group-text">Grams</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-6">';
                html += '<div class="mb-3">';
                html += '<label class="form-label">HUID Number<span class="text-danger"> *</span></label>';
                html += '<input type="text" class="form-control text-uppercase" maxlength="6" minlength="6" autocomplete="off" name="huid_number[]" value="">';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '<button style="margin-bottom:15px;" type="button" class="btn btn-danger removebtn" onclick="parentNode.parentNode.removeChild(parentNode)"><i class="fa fa-minus" aria-hidden="true"></i></button>';
                html += '</li>';
                $('#gold_weight').append(html);
            })
        });

        $('.silvercustomer').hide();
        $('.silverdealer').show();
        $(document).on('click', '.silverdealers', function() {
            if ($(this).val() == 'Dealer' && $(this).is(':checked')) {
                $('.silvercustomer').hide();
                $('.silverdealer').show();
                $('.silvercustomer input').val('');
                $('.silverdealer input').val('');
                $('.type[value="Customer"]').prop("checked", false);
            } else if ($(this).val() == 'Customer' && $(this).is(':checked')) {
                $('.silvercustomer').show();
                $('.silverdealer').hide();
                $('.silvercustomer input').val('');
                $('.silverdealer input').val('');
                $('.type[value="Dealer"]').prop("checked", false);
            } else {
                $('.silvercustomer').hide();
                $('.silverdealer').show();
                $('.silvercustomer input').val('');
                $('.silverdealer input').val('');
                $('.type[value="Dealer"]').prop("checked", false);
                $('.type[value="Customer"]').prop("checked", false);
            }
        });

        $('#dealer').change(function() {
            var customer = $(this).val();
            $.ajax({
                url: "{{route('billings.ajax')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "mobile_number": customer
                },
                dataType: 'html',
                success: function(data) {
                    $("#dealer_mobile").html(data);
                }
            });
        });
        $('#dealer').change(function() {
            var customer = $(this).val();
            $.ajax({
                url: "{{route('billings.ajax')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "address": customer
                },
                dataType: 'html',
                success: function(data) {
                    $("#dealer_address").html(data);
                }
            });
        });
        $('#dealer').change(function() {
            var customer = $(this).val();
            $.ajax({
                url: "{{route('billings.ajax')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "state": customer
                },
                dataType: 'html',
                success: function(data) {
                    $("#dealer_state").html(data);
                }
            });
        });

        $(document).ready(function() {
            var interval = setInterval(function() {
                var momentNow = moment();
                $('#time-part').html(momentNow.format('hh:mm:ss A'));
            }, 100);
        });
    </script>

    <!-- Silver invoice section script start -->
    <script>
        $(document).ready(function() {
            var final_total_amt = $('#final_total_amount').text();
            var count = 1;
            $(document).on('click', '#add_invoice', function() {
                count = count + 1;
                $('#total_item').val(count);
                var html = '';
                html += '<tr id="row_id_' + count + '">';
                html += '<td><span id="sr_no">' + count + '</span></td>';
                html += '<td><span id="hsn_no">7106</span></td>';
                html += '<td><input type="text" class="form-control" autocomplete="off" id="description' + count + '" name="description[]"></td>';
                html += '<td><input type="text" class="form-control quantity" autocomplete="off" data-srno="' + count + '" id="quantity' + count + '" name="quantity[]"></td>';
                html += '<td><input type="text" class="form-control weight" autocomplete="off" data-srno="' + count + '" id="weight' + count + '" name="weight[]"></td>';
                html += '<td><input type="text" class="form-control amount" readonly  data-srno="' + count + '" id="amount' + count + '" name="amount[]"></td>';
                html += '<td><button type="button" id="' + count + '" class="btn btn-danger remove_row"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
                html += '</tr>';
                $('#invoice-item-table').append(html);
            });

            $(document).on('click', '.remove_row', function() {
                var row_id = $(this).attr("id");
                var total_item_amount = $('#amount' + row_id).val();
                var total_item_quantity = $('#quantity' + row_id).val();
                var total_item_weight = $('#weight' + row_id).val();
                var final_amount = $('#final_total_amount').val();
                var final_quantity = $('#final_total_quantity').val();
                var final_weight = $('#final_total_weight').val();
                var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
                var result_sgst_amount = (parseFloat(result_amount) * 1.5) / 100;
                var result_cgst_amount = (parseFloat(result_amount) * 1.5) / 100;
                var final_net_amount = parseFloat(result_amount) + parseFloat(result_sgst_amount) + parseFloat(result_cgst_amount);
                var result_quantity = parseFloat(final_quantity) - parseFloat(total_item_quantity);
                var result_weight = parseFloat(final_weight) - parseFloat(total_item_weight);
                $('#final_total_amount').val((result_amount).toFixed(2));
                $('#sgst_amount').val((result_sgst_amount).toFixed(2));
                $('#cgst_amount').val((result_cgst_amount).toFixed(2));
                $('#net_amount').val((final_net_amount).toFixed(2));
                $('#final_total_quantity').val(result_quantity);
                $('#final_total_weight').val((result_weight).toFixed(3));
                $('#row_id_' + row_id).remove();
                count = count - 1;
                $('#total_item').val(count);
            });

            function cal_final_total(count) {
                var final_item_total = 0;
                var final_total_quantity = 0;
                var final_total_weight = 0;
                for (j = 1; j <= count; j++) {
                    var quantity = 0;
                    var weight = 0;
                    var amount = 0;
                    quantity = $('#quantity' + j).val();
                    if (quantity > 0) {
                        weight = $('#weight' + j).val();
                        if (weight > 0) {
                            amount = parseFloat(quantity) * parseFloat(weight);
                        }
                        item_total = parseFloat($('#silverrate').val()) * parseFloat(amount);
                        final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                        final_total_quantity = parseFloat(final_total_quantity) + parseFloat(quantity);
                        final_total_weight = parseFloat(final_total_weight) + parseFloat(weight);
                        $('#amount' + j).val((item_total).toFixed(2));
                    }
                }
                $('#final_total_amount').val((final_item_total).toFixed(2));
                $('#final_total_quantity').val(final_total_quantity);
                $('#final_total_weight').val((final_total_weight).toFixed(3));
                sgst_amount = (parseFloat(final_item_total) * 1.5) / 100;
                $('#sgst_amount').val((sgst_amount).toFixed(2));
                cgst_amount = (parseFloat(final_item_total) * 1.5) / 100;
                $('#cgst_amount').val((cgst_amount).toFixed(2));
                net_amount = parseFloat(final_item_total) + parseFloat(sgst_amount) + parseFloat(cgst_amount);
                $('#net_amount').val((net_amount).toFixed(2));
            }

            $(document).on('blur', '.weight', function() {
                cal_final_total(count);
            });
        });
    </script>
    <!-- Silver invoice section script end -->

    <!-- Gold instock section script start -->
    <script>
        $(document).ready(function() {
            var final_total_amt = $('#final_total_weight').text();
            var count = 1;
            $(document).on('click', '#add_weight', function() {
                count = count + 1;
                $('#total_item_weight').val(count);
                var html = '';
                html += '<tr id="row_id_' + count + '">';
                html += '<td style="border-bottom-color: transparent !important;"><span id="sr_no">' + count + '</span></td>';
                html += '<td style="border-bottom-color: transparent !important;"><div class="input-group"><input type="text" class="form-control instockweight" autocomplete="off" id="instockweight' + count + '" name="weight[]"><div class="input-group-text">Grams</div></div></td>';
                html += '<td style="border-bottom-color: transparent !important;"><input type="text" class="form-control" autocomplete="off" data-srno="' + count + '" id="instockhuidnumber' + count + '" name="huid_number[]"></td>';
                html += '<td style="border-bottom-color: transparent !important;"><button type="button" id="' + count + '" class="btn btn-danger remove_row_weight"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
                html += '</tr>';
                $('#weight-table').append(html);
            });

            $(document).on('click', '.remove_row_weight', function() {
                var row_id = $(this).attr("id");
                var total_item_weight = $('#instockweight' + row_id).val();
                var final_weight = $('#final_total_weight').val();
                var result_weight = parseFloat(final_weight) - parseFloat(total_item_weight);
                $('#final_total_weight').val((result_weight).toFixed(3));
                $('#row_id_' + row_id).remove();
                count = count - 1;
                $('#total_item_weight').val(count);
            });

            function cal_final_total_weight(count) {
                var final_total_weight = 0;
                for (j = 1; j <= count; j++) {
                    var weight = 0;
                    weight = $('#instockweight' + j).val();
                    if (weight > 0) {
                        final_total_weight = parseFloat(final_total_weight) + parseFloat(weight);
                    }
                }
                $('#final_total_weight').val((final_total_weight).toFixed(3));
            }

            $(document).on('blur', '.instockweight', function() {
                cal_final_total_weight(count);
            });
        });
    </script>
    <!-- Gold instock section script end -->


    <script>
        $(document).ready(function() {
            var final_total_amt = $('#gold_final_total_amount').text();
            var count = 1;
            $(document).on('click', '#gold_add_invoice', function() {
                count = count + 1;
                $('#gold_total_item').val(count);
                var html = '';
                html += '<tr id="row_id_' + count + '">';
                html += '<td><span id="sr_no">' + count + '</span></td>';
                html += '<td><span id="hsn_no">7108</span></td>';
                html += '<td><input type="text" class="form-control" autocomplete="off" id="huidnumber' + count + '" name="huid_number[]"></td>';
                html += '<td><input type="text" class="form-control" autocomplete="off" id="golddescription' + count + '" name="description[]"></td>';
                html += '<td><input type="text" class="form-control goldquantity" autocomplete="off" data-srno="' + count + '" id="goldquantity' + count + '" name="quantity[]"></td>';
                html += '<td><input type="text" class="form-control goldweight" autocomplete="off" data-srno="' + count + '" id="goldweight' + count + '" name="weight[]"></td>';
                html += '<td><input type="text" class="form-control goldamount" readonly  data-srno="' + count + '" id="goldamount' + count + '" name="amount[]"></td>';
                html += '<td><button type="button" id="' + count + '" class="btn btn-danger gold_remove_row"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
                html += '</tr>';
                $('#gold-invoice-item-table').append(html);
            });

            $(document).on('click', '.gold_remove_row', function() {
                var row_id = $(this).attr("id");
                var total_item_amount = $('#goldamount' + row_id).val();
                var total_item_quantity = $('#goldquantity' + row_id).val();
                var total_item_weight = $('#goldweight' + row_id).val();
                var final_amount = $('#gold_final_total_amount').val();
                var final_quantity = $('#gold_final_total_quantity').val();
                var final_weight = $('#gold_final_total_weight').val();
                var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
                var result_sgst_amount = (parseFloat(result_amount) * 1.5) / 100;
                var result_cgst_amount = (parseFloat(result_amount) * 1.5) / 100;
                var final_net_amount = parseFloat(result_amount) + parseFloat(result_sgst_amount) + parseFloat(result_cgst_amount);
                var result_quantity = parseFloat(final_quantity) - parseFloat(total_item_quantity);
                var result_weight = parseFloat(final_weight) - parseFloat(total_item_weight);
                $('#gold_final_total_amount').val((result_amount).toFixed(2));
                $('#gold_sgst_amount').val((result_sgst_amount).toFixed(2));
                $('#gold_cgst_amount').val((result_cgst_amount).toFixed(2));
                $('#gold_net_amount').val((final_net_amount).toFixed(2));
                $('#gold_final_total_quantity').val(result_quantity);
                $('#gold_final_total_weight').val((result_weight).toFixed(3));
                $('#row_id_' + row_id).remove();
                count = count - 1;
                $('#gold_total_item').val(count);
            });

            function cal_final_total(count) {
                var final_item_total = 0;
                var final_total_quantity = 0;
                var final_total_weight = 0;
                for (j = 1; j <= count; j++) {
                    var quantity = 0;
                    var weight = 0;
                    var amount = 0;
                    quantity = $('#goldquantity' + j).val();
                    if (quantity > 0) {
                        weight = $('#goldweight' + j).val();
                        if (weight > 0) {
                            amount = parseFloat(quantity) * parseFloat(weight);
                        }
                        item_total = parseFloat($('#goldrate').val()) * parseFloat(amount);
                        final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                        final_total_quantity = parseFloat(final_total_quantity) + parseFloat(quantity);
                        final_total_weight = parseFloat(final_total_weight) + parseFloat(weight);
                        $('#goldamount' + j).val((item_total).toFixed(2));
                    }
                }
                $('#gold_final_total_amount').val((final_item_total).toFixed(2));
                $('#gold_final_total_quantity').val(final_total_quantity);
                $('#gold_final_total_weight').val((final_total_weight).toFixed(3));
                sgst_amount = (parseFloat(final_item_total) * 1.5) / 100;
                $('#gold_sgst_amount').val((sgst_amount).toFixed(2));
                cgst_amount = (parseFloat(final_item_total) * 1.5) / 100;
                $('#gold_cgst_amount').val((cgst_amount).toFixed(2));
                net_amount = parseFloat(final_item_total) + parseFloat(sgst_amount) + parseFloat(cgst_amount);
                $('#gold_net_amount').val((net_amount).toFixed(2));
            }

            $(document).on('blur', '.goldweight', function() {
                cal_final_total(count);
            });
        });
    </script>

    <style>
        .jam_time {
            resize: none;
        }
    </style>

</body>

</html>