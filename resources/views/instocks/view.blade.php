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
                            <h4 class="card-title">View Gold Instock Details</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="offset-lg-3 col-lg-6">
                                    <div class="mt-4 mt-lg-0">
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Customer Name</label>
                                            <div class="col-sm-9">
                                                <label class="col-sm-3 col-form-label">@if(!empty($instock['customer_name'])) {{$instock['customer_name']}} @else {{"-"}} @endif</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Mobile Number</label>
                                            <div class="col-sm-9">
                                                <label class="col-sm-3 col-form-label">@if(!empty($instock['mobile_number'])) {{$instock['mobile_number']}} @else {{"-"}} @endif</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <label class="col-sm-3 col-form-label">@if(!empty($instock['address'])) {{$instock['address']}} @else {{"-"}} @endif</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Date</label>
                                            <div class="col-sm-9">
                                                <label class="col-sm-3 col-form-label">@if(!empty($instock['date'])) {{$instock['date']}} @else {{"-"}} @endif</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Weight (in Grams)</label>
                                            <div class="col-sm-9">
                                                <label class="col-sm-3 col-form-label">@if(!empty($instock['weight'])) {{$instock['weight']}} @else {{"-"}} @endif</label>
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
    </div>
</div>
<!-- ========== Main Content End ========== -->
@endsection