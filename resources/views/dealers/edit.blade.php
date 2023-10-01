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
                        <h4 class="mb-sm-0 font-size-18">Dealer Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dealer Details</li>
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
                            <a href="{{ route('dealers.index') }}" class="btn btn-dark"><i class="bx bx-left-arrow-alt me-1"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end back button -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Dealer Details</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="offset-lg-3 col-lg-6">
                                    <div class="mt-4 mt-lg-0">
                                        <form id="basic-form" action="{{ route('dealers.update',$dealer['id']) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class=" mb-3">
                                                <label class="form-label">Jewels Type<span class="text-danger"> *</span></label>
                                                <div>
                                                    <div class="form-check-inline">
                                                        <input class="form-check-input" id="formRadios1" type="radio" {!! ($dealer['jewels_type']=="Gold" ) ? "checked" : "" !!} name="jewels_type" value="Gold">
                                                        <label class="form-check-label" for="formRadios1">Gold</label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input class="form-check-input" id="formRadios2" type="radio" name="jewels_type" {!! ($dealer['jewels_type']=="Silver" ) ? "checked" : "" !!} value="Silver">
                                                        <label class="form-check-label" for="formRadios2">Silver</label><br />
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input class="form-check-input" id="formRadios3" type="radio" name="jewels_type" {!! ($dealer['jewels_type']=="All" ) ? "checked" : "" !!} value="All">
                                                        <label class="form-check-label" for="formRadios3">All</label>
                                                    </div>
                                                </div>
                                                @error('jewels_type')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Dealer Name<span class="text-danger"> *</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control text-capitalize" maxlength="100" autocomplete="off" name="dealer_name" value="{{$dealer['dealer_name']}}">
                                                    <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                                                </div>
                                                @error('dealer_name')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Mobile Number<span class="text-danger"> *</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" autocomplete="off" name="mobile_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" minlength="10" value="{{$dealer['mobile_number']}}">
                                                    <div class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                                </div>
                                                @error('mobile_number')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-control text-capitalize" rows="5" name="address">@if($dealer['address'] == "-") {{""}} @else {{$dealer['address']}} @endif</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">State</label>
                                                <input type="text" class="form-control" autocomplete="off" name="state" maxlength="100" value="@if($dealer['state'] == "-") {{""}} @else {{$dealer['state']}} @endif">
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-success w-md">Update</button>
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