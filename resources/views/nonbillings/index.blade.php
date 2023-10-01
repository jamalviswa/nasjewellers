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
                        <h4 class="mb-sm-0 font-size-18">Non Billing Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Silver</li>
                                <li class="breadcrumb-item active">Non Billing Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- start Add new button -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="card-title">Silver Non Billing List</h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                        <div>
                            <a href="{{ route('nonbillings.add') }}" class="btn btn-dark"><i class="bx bx-plus me-1"></i> Add New</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Add new button -->

            <!-- start serach  -->
            <div class="body">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <form method="GET" action="#">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 mt-2 mb-3">
                                    <div class="input-group">
                                        <input type="text" name="s" class="form-control" placeholder="Search..." autocomplete="off" @if(isset($_REQUEST['s'])) value="{{ $_REQUEST['s'] }}" @else value="" @endif>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mt-2 mb-3">
                                    <button type="submit" class="btn btn-success" name="search"><i class="bx bx-search"></i></button>
                                    @if (isset($_REQUEST['search']))
                                    <a href="{{ route('nonbillings.index') }}" class="btn btn-danger"><i class="bx bx-x"></i></a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end serach  -->

            <!-- start table -->
            <?php if ($nonbillings->count() > '0') { ?>
                <div class="table-responsive mb-4">
                    <table class="table align-middle dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead style="color: #fff;background-color: #343a40;border-color: #343a40;">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center" style="width: 120px;">Invoice ID</th>
                                <th scope="col" class="text-center">Customer Name</th>
                                <th scope="col" class="text-center">Mobile Number</th>
                                <th scope="col" class="text-center">Date</th>
                                <th scope="col" class="text-center">Total Amount(Rs.)</th>
                                <!-- <th scope="col" class="text-center" style="width: 150px;">Download Pdf</th> -->
                                <th style="width: 80px; min-width: 80px;">Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php $i = ($nonbillings->currentpage() - 1) * $nonbillings->perpage() + 1; ?>
                            @foreach($nonbillings as $nonbilling)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center text-dark fw-medium">{{$nonbilling->bill_number}}</td>
                                <td class="text-center">{{$nonbilling->customer_name}}</td>
                                <td class="text-center">{{$nonbilling->mobile_number}}</td>
                                <td class="text-center">{{$nonbilling->date}}</td>
                                <td class="text-center">{{$nonbilling->total_final_amount}}</td>
                                <!-- <td class="text-center">
                                    <div>
                                        <button type="button" class="btn btn-soft-light btn-sm w-xs waves-effect btn-label waves-light"><i class="bx bx-download label-icon"></i> Pdf</button>
                                    </div>
                                </td> -->
                                <td>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <!-- <a type="button" href="{{ route('nonbillings.edit', $nonbilling['id']) }}" class="btn btn-success waves-light waves-effect" title="Edit"><i class="fas fa-edit"></i></a> -->
                                        <a type="button" href="{{ route('nonbillings.view', $nonbilling['id']) }}" class="btn btn-dark waves-light waves-effect" title="View"><i class="fa fa-eye"></i></a>
                                        <a rel="tooltip" data-value="{{$nonbilling['id']}}" href="{{ route('nonbillings.delete',$nonbilling['id']) }}" class="delete btn btn-danger waves-light waves-effect" title="Delete"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table -->

                <!-- start pagination -->
                <div class="row">
                    <div class="col-xl-6">
                        <p> Showing {{$nonbillings->firstItem()}} to {{$nonbillings->lastItem()}} of {{$nonbillings->total()}} entries</p>
                    </div>
                    <div class="col-xl-6">
                        <nav aria-label="...">
                            {{ $nonbillings->links('layouts.pagination') }}
                        </nav>
                    </div>
                </div>
                <!-- end pagination -->
            <?php } else { ?>
                <div class="text-center">
                    <img src="{{URL::to('images/no-record.png')}}">
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- ========== Main Content End ========== -->
@endsection