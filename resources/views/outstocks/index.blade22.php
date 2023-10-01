@extends('layouts.admin')
@section('content')
<!-- ========== Main Content Start ========== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Invoice Detail</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                                <li class="breadcrumb-item active">Invoice Detail</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-title">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="mb-4">
                                            <img src="{{URL::to('images/invoice.png')}}" alt="" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="py-2 mt-3">
                                <h5 class="font-size-15 text-center">TAX INVOICE</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h5 class="font-size-14 mb-2">Mr./Ms.Jamal Ahamed</h5>
                                        <p class="mb-1">Edappadi,Salem</p>
                                        <p class="mb-1"><b>Mobile No :</b> 8428937026</p>
                                        <p class="mb-1"><b>State :</b> Tamilnadu</p>

                                    </div>
                                </div>

                                <div class="offset-sm-3 col-sm-3">
                                    <div>
                                        <div>
                                            <p class="mb-1"><b>Bill No :</b> 01</p>
                                            <p class="mb-1"><b>Date :</b> 13-Apr-2023</p>
                                            <p class="mb-1"><b>Time :</b> 15:25:54</p>
                                            <p class="mb-1"><b>Gold Rate :</b> 4825.00/gm</p>
                                            <p class="mb-1"><b>Silver Rate :</b> 77.40/gm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="py-2 mt-3">
                                <h5 class="font-size-15 text-center">SALES BILL</h5>
                            </div>
                            <div class="p-4 border rounded">
                                <div class="table-responsive">
                                    <table class="table table-nowrap align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 70px;">S.NO</th>
                                                <th>HSN</th>
                                                <th>DESCRIPTION</th>
                                                <th>PCS</th>
                                                <th>GRS.WT (In Grams)</th>
                                                <th>NET.WT (In Grams)</th>
                                                <th class="text-end" style="width: 120px;">TAXABLE AMOUNT (&#8377)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">01</th>
                                                <td>7108</td>
                                                <td>
                                                    <h5 class="font-size-15 mb-1">Haram</h5>
                                                    <p class="font-size-13 text-muted mb-0">Huid : 789858 </p>
                                                </td>
                                                <td>1</td>
                                                <td>21.170</td>
                                                <td>21.170</td>
                                                <td class="text-end">154858.00</td>
                                            </tr>

                                            <tr>
                                                <th scope="row" colspan="3" class="text-center">Total</th>
                                                <td>2</td>
                                                <td>23.140</td>
                                                <td>23.140</td>
                                                <td class="text-end">175252.00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="6" class="border-0 text-end">
                                                    SGST @ 1.500 %</th>
                                                <td class="border-0 text-end">1535.00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="6" class="border-0 text-end">
                                                    CGST @ 1.500 %</th>
                                                <td class="border-0 text-end">1535.00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="6" class="border-0 text-end">Total Rs.</th>
                                                <td class="border-0 text-end">
                                                    <h4 class="m-0">185252.00</h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-print-none mt-3">
                                <div class="float-end">
                                    <!-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a> -->
                                    <a href="#" class="btn btn-primary w-md waves-effect waves-light">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



</div>
<!-- ========== Main Content End ========== -->
@endsection