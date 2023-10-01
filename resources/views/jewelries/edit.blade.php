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
                        <h4 class="mb-sm-0 font-size-18">Gold Jewelries Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Gold</li>
                                <li class="breadcrumb-item active">Gold Jewelries Details</li>
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
                            <a href="{{ route('jewelries.index') }}" class="btn btn-dark"><i class="bx bx-left-arrow-alt me-1"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end back button -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Gold Jewelries Details</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="offset-lg-3 col-lg-6">
                                    <div class="mt-4 mt-lg-0">
                                        <form id="basic-form" action="{{ route('jewelries.update',$jewelry['id']) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-4">
                                                <label class="col-sm-3 col-form-label">Item name<span class="text-danger"> *</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-select" name="item_name">
                                                        <option value="">Select Gold Item</option>
                                                        <?php
                                                        $items = App\Models\Item::where('status', 'Active')->get();
                                                        foreach ($items as $item) {
                                                        ?>
                                                            <option @if(($item['item_name']) && $jewelry['item_name']==$item['id']) selected @endif value="<?php echo $item->id ?>"><?php echo $item->item_name ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                    @error('item_name')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-sm-3 col-form-label">Quality Type<span class="text-danger"> *</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-select qualitytype" name="quality_type">
                                                        <option value="">Select Gold Quality Type</option>
                                                        <option {{ $jewelry['quality_type']=="Halmark"?"selected":"" }} value="Halmark">Halmark</option>
                                                        <option {{ $jewelry['quality_type']=="HUID"?"selected":"" }} value="HUID">HUID</option>
                                                    </select>
                                                    @error('quality_type')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-4" id="huid" style="display:none;">
                                                <label class="col-sm-3 col-form-label">HUID Number<span class="text-danger"> *</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" autocomplete="off" name="huid_number" value="{{$jewelry['huid_number']}}">
                                                    @error('huid_number')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-sm-3 col-form-label">Gross Weight <br>(in gram)<span class="text-danger"> *</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" autocomplete="off" name="gross_weight" value="{{$jewelry['gross_weight']}}">
                                                    @error('gross_weight')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row justify-content-end">
                                                <div class="col-sm-9">
                                                    <div>
                                                        <button type="submit" class="btn btn-success w-md">Update</button>
                                                        <a href="{{ route('jewelries.index') }}" class="btn btn-danger w-md">Cancel</a>
                                                    </div>
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
        </div>
    </div>
</div>
<!-- ========== Main Content End ========== -->
@endsection