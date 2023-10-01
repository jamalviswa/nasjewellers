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
                        <h4 class="mb-sm-0 font-size-18">Instock Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Gold</li>
                                <li class="breadcrumb-item active">Instock Details</li>
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
                            <a href="{{ route('instocks.index') }}" class="btn btn-dark"><i class="bx bx-left-arrow-alt me-1"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end back button -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Gold Instock Details</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="offset-lg-3 col-lg-6">
                                    <div class="mt-4 mt-lg-0">
                                        <form id="basic-form" action="{{ route('instocks.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">HSN Code<span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" readonly autocomplete="off" name="hsn_code" value="7108">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Customer Type<span class="text-danger"> *</span></label>
                                                <div>
                                                    <div class="form-check-inline">
                                                        <input class="form-check-input dealers" id="formRadios1" type="radio" checked {!! (old('customer_type')=="Dealer" ) ? "checked" : "" !!} name="customer_type" value="Dealer">
                                                        <label class="form-check-label" for="formRadios1">Dealer</label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input class="form-check-input dealers" id="formRadios2" type="radio" name="customer_type" {!! (old('customer_type')=="Customer" ) ? "checked" : "" !!} value="Customer">
                                                        <label class="form-check-label" for="formRadios2">Customer</label><br />
                                                    </div>
                                                </div>
                                                @error('customer_type')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 dealer">
                                                <label class="form-label">Dealer Name<span class="text-danger"> *</span></label>
                                                <select class="form-select" name="dealer_name" id="customer">
                                                    <option value="">Select Dealer Name</option>
                                                    <?php
                                                    $dealers = App\Models\Dealer::where('jewels_type', '!=', 'Silver')->where('status', 'Active')->get();
                                                    foreach ($dealers as $dealer) {
                                                    ?>
                                                        <option @if((old('dealer_name')) && old('dealer_name')==$dealer['id']) selected @endif value="<?php echo $dealer->id ?>"><?php echo $dealer->dealer_name ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                @error('dealer_name')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 dealer">
                                                <label class="form-label">Mobile Number<span class="text-danger"> *</span></label>
                                                <div id="mobile">
                                                    <div class="input-group">
                                                        <input type="text" autocomplete="off" class="form-control">
                                                        <div class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 dealer">
                                                <label class="form-label">Address</label>
                                                <div id="address">
                                                    <textarea class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 dealer">
                                                <label class="form-label">State</label>
                                                <div id="state">
                                                    <input type="text" autocomplete="off" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 customer">
                                                <label class="form-label">Customer Name<span class="text-danger"> *</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control text-capitalize" maxlength="100" autocomplete="off" name="customer_name" value="{{old('customer_name')}}">
                                                    <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                                                </div>
                                                @error('customer_name')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 customer">
                                                <label class="form-label">Mobile Number<span class="text-danger"> *</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" autocomplete="off" name="mobile_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" minlength="10" value="{{old('mobile_number')}}">
                                                    <div class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                                </div>
                                                @error('mobile_number')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 customer">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-control text-capitalize" rows="5" name="address">{{ old('address')}}</textarea>
                                            </div>
                                            <div class="mb-3 customer">
                                                <label class="form-label">State</label>
                                                <input type="text" class="form-control" autocomplete="off" name="state" maxlength="100" value="{{old('state')}}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jewels Item<span class="text-danger"> *</span></label>
                                                <select class="form-select" name="jewels_item">
                                                    <option value="">Select Jewels Item</option>
                                                    <?php
                                                    $items = App\Models\Item::where('status', 'Active')->get();
                                                    foreach ($items as $item) {
                                                    ?>
                                                        <option @if((old('jewels_item')) && old('jewels_item')==$item['id']) selected @endif value="<?php echo $item->id ?>"><?php echo $item->item_name ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                @error('jewels_item')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <table class="table table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr>
                                                        <th style="border-bottom-color: transparent !important;">S.NO</th>
                                                        <th style="border-bottom-color: transparent !important;">WEIGHT<span class="text-danger"> *</span></th>
                                                        <th style="border-bottom-color: transparent !important;">HUID NUMBER<span class="text-danger"> *</span></th>
                                                        <th style="border-bottom-color: transparent !important;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="weight-table">
                                                    <tr>
                                                        <td style="border-bottom-color: transparent !important;">
                                                            <span id="sr_no">1</span>
                                                        </td>
                                                        <td style="border-bottom-color: transparent !important;">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control instockweight" autocomplete="off" id="instockweight1" name="weight[]">
                                                                <div class="input-group-text">Grams</div>
                                                            </div>
                                                        </td>
                                                        <td style="border-bottom-color: transparent !important;">
                                                            <input type="text" class="form-control" id="instockhuidnumber1" data-srno="1" autocomplete="off" name="huid_number[]">
                                                        </td>
                                                        <td style="border-bottom-color: transparent !important;">
                                                            <button type="button" id="add_weight" class="btn btn-success btn-green"><i class="fa fa-plus"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="mb-3">
                                                <label class="form-label">Total Weight<span class="text-danger"> *</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="final_total_weight" readonly autocomplete="off" name="total_weight" value="{{old('total_weight')}}">
                                                    <div class="input-group-text">Grams</div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <input type="hidden" name="total_item_weight" id="total_item_weight" value="1">
                                                <input type="submit" name="create_invoice" id="create_invoice" class="btn btn-success w-md" value="Submit">

                                                <button type="reset" class="btn btn-danger w-md">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ========== Main Content End ========== -->
@endsection