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
                        <h4 class="mb-sm-0 font-size-18">View Gold Invoice</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Gold Invoice</li>
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
                            <a href="{{ route('outstocks.index') }}" class="btn btn-dark"><i class="bx bx-left-arrow-alt me-1"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end back button -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">View Gold Invoice Details</h4>
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
                                        <h5 class="font-size-14 mb-2">Mr./Ms.{{$outstock->customer_name}}</h5>
                                        <p class="mb-1">{{$outstock->address}}</p>
                                        <p class="mb-1"><b>Mobile No :</b> {{$outstock->mobile_number}}</p>
                                        <p class="mb-1"><b>State :</b> {{$outstock->state}}</p>

                                    </div>
                                </div>

                                <div class="offset-sm-3 col-sm-3">
                                    <div>
                                        <div>
                                            <p class="mb-1"><b>Bill No :</b> {{$outstock->bill_number}}</p>
                                            <p class="mb-1"><b>Date :</b> {{$outstock->date}}</p>
                                            <p class="mb-1"><b>Time :</b> {{$outstock->time}}</p>
                                            <p class="mb-1"><b>Gold Rate :</b> Rs.{{$outstock->gold_rate}}/gm</p>                                    
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
                                            <?php $goldinvoices = App\Models\Goldinvoice::where('outstock_id', $outstock['id'])->where('status', 'Active')->get(); 
                                            $i = 1;
                                            ?>
                                            @foreach($goldinvoices as $goldinvoice)
                                            <tr>
                                                <th scope="row">{{$i++}}</th>
                                                <td>{{$goldinvoice->hsn_no}}</td>
                                                <td>
                                                    <h5 class="font-size-15 mb-1">{{$goldinvoice->description}}</h5>
                                                    <p class="font-size-13 text-muted mb-0">Huid : {{$goldinvoice->huid_number}} </p>
                                                </td>
                                                <td>{{$goldinvoice->quantity}}</td>
                                                <td>{{$goldinvoice->weight}}</td>
                                                <td>{{$goldinvoice->weight}}</td>
                                                <td class="text-end">{{$goldinvoice->amount}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th scope="row" colspan="3" class="text-center">Total</th>
                                                <td><b>{{$outstock->total_quantity}}</b></td>
                                                <td><b>{{$outstock->total_weight}}</b></td>
                                                <td><b>{{$outstock->total_weight}}</b></td>
                                                <td class="text-end"><b>{{$outstock->total_amount}}</b></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="6" class="border-0 text-end">
                                                    SGST @ 1.500 %</th>
                                                <td class="border-0 text-end">{{$outstock->sgst_amount}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="6" class="border-0 text-end">
                                                    CGST @ 1.500 %</th>
                                                <td class="border-0 text-end">{{$outstock->cgst_amount}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="6" class="border-0 text-end">Total Rs.</th>
                                                <td class="border-0 text-end">
                                                    <h4 class="m-0">{{$outstock->total_final_amount}}</h4>
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