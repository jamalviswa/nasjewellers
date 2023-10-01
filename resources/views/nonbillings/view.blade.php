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
                        <h4 class="mb-sm-0 font-size-18">View Silver Invoice</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Silver Invoice</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- start back button -->
            <div class="row align-items-center">
                <div class="offset-md-6 col-md-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                        <div>
                            <a href="{{ route('nonbillings.index') }}" class="btn btn-dark"><i class="bx bx-left-arrow-alt me-1"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end back button -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">View Silver Invoice Details</h4>
                        </div>
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
                                        <h5 class="font-size-14 mb-2">Mr./Ms.{{$nonbilling->customer_name}}</h5>
                                        <p class="mb-1">{{$nonbilling->address}}</p>
                                        <p class="mb-1"><b>Mobile No :</b> {{$nonbilling->mobile_number}}</p>
                                        <p class="mb-1"><b>State :</b> {{$nonbilling->state}}</p>

                                    </div>
                                </div>

                                <div class="offset-sm-3 col-sm-3">
                                    <div>
                                        <div>
                                            <p class="mb-1"><b>Bill No :</b> {{$nonbilling->bill_number}}</p>
                                            <p class="mb-1"><b>Date :</b> {{$nonbilling->date}}</p>
                                            <p class="mb-1"><b>Time :</b> {{$nonbilling->time}}</p>
                                            <p class="mb-1"><b>Gold Rate :</b> Rs.{{$nonbilling->silver_rate}}/gm</p>                                    
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
                                                <th style="width: 120px;">HSN</th>
                                                <th style="width: 120px;">DESCRIPTION</th>
                                                <th style="width: 120px;">PCS</th>
                                                <th style="width: 120px;">GRS.WT <br>(In Grams)</th>
                                                <th style="width: 120px;">NET.WT <br>(In Grams)</th>
                                                <th class="text-end" style="width: 120px;">TAXABLE AMOUNT (&#8377)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $silverinvoices = App\Models\Silverinvoice::where('nonbilling_id', $nonbilling['id'])->where('status', 'Active')->get(); 
                                            $i = 1;
                                            ?>
                                            @foreach($silverinvoices as $silverinvoice)
                                            <tr>
                                                <th scope="row">{{$i++}}</th>
                                                <td>{{$silverinvoice->hsn_no}}</td>
                                                <td>
                                                    <h5 class="font-size-15 mb-1">{{$silverinvoice->description}}</h5>
                                                   
                                                </td>
                                                <td>{{$silverinvoice->quantity}}</td>
                                                <td>{{$silverinvoice->weight}}</td>
                                                <td>{{$silverinvoice->weight}}</td>
                                                <td class="text-end">{{$silverinvoice->amount}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th scope="row" colspan="3" class="text-center">Total</th>
                                                <td><b>{{$nonbilling->total_quantity}}</b></td>
                                                <td><b>{{$nonbilling->total_weight}}</b></td>
                                                <td><b>{{$nonbilling->total_weight}}</b></td>
                                                <td class="text-end"><b>{{$nonbilling->total_amount}}</b></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="6" class="border-0 text-end">
                                                    SGST @ 1.500 %</th>
                                                <td class="border-0 text-end">{{$nonbilling->sgst_amount}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="6" class="border-0 text-end">
                                                    CGST @ 1.500 %</th>
                                                <td class="border-0 text-end">{{$nonbilling->cgst_amount}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="6" class="border-0 text-end">Total Rs.</th>
                                                <td class="border-0 text-end">
                                                    <h4 class="m-0">{{$nonbilling->total_final_amount}}</h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-print-none mt-3">
                                <div class="float-end">
                                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                    <!-- <a href="#" class="btn btn-primary w-md waves-effect waves-light">Download</a> -->
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