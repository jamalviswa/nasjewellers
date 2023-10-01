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
                        <h4 class="mb-sm-0 font-size-18">Add Silver Invoice</h4>
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
                            <h4 class="card-title">Add Silver Invoice Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="invoice-title">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="mb-4">
                                            <img src="{{URL::to('images/invoice.png')}}" alt="" width="1200" height="300">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 mt-3">
                                <h5 class="font-size-15 text-center">TAX INVOICE</h5>
                            </div>
                            <form id="basic-form" action="{{ route('nonbillings.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <div class="col-sm-8">
                                                <div class="mb-3">
                                                    <label class="form-label">Customer Name<span class="text-danger"> *</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control text-capitalize" maxlength="100" autocomplete="off" name="customer_name" value="{{old('customer_name')}}">
                                                        <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                                                    </div>
                                                    @error('customer_name')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile Number<span class="text-danger"> *</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" autocomplete="off" name="mobile_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" minlength="10" value="{{old('mobile_number')}}">
                                                        <div class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                                    </div>
                                                    @error('mobile_number')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Address<span class="text-danger"> *</span></label>
                                                    <textarea class="form-control text-capitalize" rows="5" name="address">{{ old('address')}}</textarea>
                                                    @error('address')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">State<span class="text-danger"> *</span></label>
                                                    <input type="text" class="form-control" autocomplete="off" name="state" maxlength="100" value="{{old('state')}}">
                                                    @error('state')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>
                                            <div>
                                                <div class="offset-sm-4 col-sm-8">
                                                    <div class="mb-3">
                                                        <?php $nonbilling = App\Models\Nonbilling::count();
                                                        $billno = $nonbilling + 1;
                                                        ?>
                                                        <label class="form-label">Bill Number<span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control" readonly autocomplete="off" name="bill_number" value="<?php echo $billno; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Date<span class="text-danger"> *</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" readonly autocomplete="off" name="date" value="<?php echo date('d-m-Y'); ?>">
                                                            <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Time<span class="text-danger"> *</span></label>
                                                        <div class="input-group">
                                                            <textarea class="form-control jam_time" rows="1" readonly name="time" id="time-part">{{ old('time')}}</textarea>
                                                            <div class="input-group-text"><i class="fa fa-clock" aria-hidden="true"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Silver Rate<span class="text-danger"> *</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control silverrate" autocomplete="off" name="silver_rate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4" minlength="4" value="{{old('silver_rate')}}">
                                                            <div class="input-group-text">gm</div>
                                                        </div>
                                                        @error('silver_rate')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2 mt-3">
                                    <h5 class="font-size-15 text-center">SALES BILL</h5>
                                </div>
                                <div class="p-4 border rounded">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap align-middle mb-0" id="silvercalc">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>HSN</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>PCS</th>
                                                    <th>GRS.WT (In Grams)</th>
                                                    <th class="text-end" style="width: 120px;">TAXABLE AMOUNT (&#8377)</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" readonly autocomplete="off" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" readonly autocomplete="off" name="hsn_code1" value="7106">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" autocomplete="off" name="description1" value="{{old('description')}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control silverpcs1" autocomplete="off" name="pcs1" value="{{old('pcs')}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control silverweight1" id="silweight" autocomplete="off" name="weight1" value="{{old('gross_weight')}}">
                                                    </td>
                                                    <td class="text-end">
                                                        <input type="text" class="form-control text-end" id="silveramount1" readonly autocomplete="off" name="amount1" value="{{old('rate')}}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" readonly autocomplete="off" value="2">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" readonly autocomplete="off" name="hsn_code2" value="7106">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" autocomplete="off" name="description2" value="{{old('description')}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control silverpcs2" autocomplete="off" name="pcs2" value="{{old('pcs')}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control silverweight2" id="silweight" autocomplete="off" name="weight2" value="{{old('gross_weight')}}">
                                                    </td>
                                                    <td class="text-end">
                                                        <input type="text" class="form-control text-end" id="silveramount2" readonly autocomplete="off" name="amount2" value="{{old('rate')}}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" readonly autocomplete="off" value="3">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" readonly autocomplete="off" name="hsn_code3" value="7106">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" autocomplete="off" name="description3" value="{{old('description')}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control silverpcs3" autocomplete="off" name="pcs3" value="{{old('pcs')}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control silverweight3" autocomplete="off" name="weight3" value="{{old('gross_weight')}}">
                                                    </td>
                                                    <td class="text-end">
                                                        <input type="text" class="form-control text-end" id="silveramount3" readonly autocomplete="off" name="amount3" value="{{old('rate')}}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="3" class="text-end">Total</th>
                                                    <td>
                                                        <input type="text" class="form-control" id="totalpieces" readonly name="total_pcs" value="{{old('total_pcs')}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="totalweights" readonly name="total_weight" value="{{old('total_weight')}}">
                                                    </td>
                                                    <td class="text-end">
                                                        <input type="text" class="form-control" readonly name="total_amount" value="{{old('total_amount')}}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="5" class="border-0 text-end">
                                                        SGST @ 1.500 %</th>
                                                    <td class="border-0 text-end">
                                                        <input type="text" class="form-control" readonly autocomplete="off" name="sgst_amount" value="{{old('sgst_rate')}}">
                                                        @error('sgst_rate')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="5" class="border-0 text-end">
                                                        CGST @ 1.500 %</th>
                                                    <td class="border-0 text-end">
                                                        <input type="text" class="form-control" readonly autocomplete="off" name="cgst_amount" value="{{old('cgst_rate')}}">
                                                        @error('cgst_rate')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="5" class="border-0 text-end">Total Rs.</th>
                                                    <td class="border-0 text-end">
                                                        <input type="text" class="form-control" readonly autocomplete="off" name="net_amount" value="{{old('net_rate')}}">
                                                        @error('net_rate')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- <div class="invoice-title">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <div class="mb-4">
                                                <img src="{{URL::to('images/invoicebottom.png')}}" alt="" width="1200" height="">
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="d-print-none mt-3">
                                    <div class="float-end">
                                        <!-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a> -->
                                        <button type="submit" class="btn btn-primary w-md waves-effect waves-light">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ========== Main Content End ========== -->
@endsection