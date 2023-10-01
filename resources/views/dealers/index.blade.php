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

            <!-- start Add new button -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="card-title">Dealers List</h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                        <div>
                            <a href="{{ route('dealers.add') }}" class="btn btn-dark"><i class="bx bx-plus me-1"></i> Add New</a>
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
                                        <input type="text" name="s" class="form-control text-capitalize" placeholder="Search..." autocomplete="off" @if(isset($_REQUEST['s'])) value="{{ $_REQUEST['s'] }}" @else value="" @endif>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mt-2 mb-3">
                                    <button type="submit" class="btn btn-success" name="search"><i class="bx bx-search"></i></button>
                                    @if (isset($_REQUEST['search']))
                                    <a href="{{ route('dealers.index') }}" class="btn btn-danger"><i class="bx bx-x"></i></a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end serach  -->

            <!-- start table -->
            <?php if ($dealers->count() > '0') { ?>
                <div class="table-responsive mb-4">
                    <table class="table align-middle dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead style="color: #fff;background-color: #343a40;border-color: #343a40;">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Dealer Name</th>
                                <th scope="col" class="text-center">Mobile Number</th>
                                <th scope="col" class="text-center">Address</th>
                                <th scope="col" class="text-center">State</th>
                                <th scope="col" class="text-center">Jewels Type</th>
                                <th style="width: 80px; min-width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($dealers->currentpage() - 1) * $dealers->perpage() + 1; ?>
                            @foreach($dealers as $dealer)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center">
                                    <a href="javascript: void(0);" class="text-dark fw-medium">@if(!empty($dealer['dealer_name'])) {{$dealer['dealer_name']}} @else {{"-"}} @endif</a>
                                </td>
                                <td class="text-center">@if(!empty($dealer['mobile_number'])) {{$dealer['mobile_number']}} @else {{"-"}} @endif</td>
                                <td class="text-center">@if(!empty($dealer['address'])) {{$dealer['address']}} @else {{"-"}} @endif</td>
                                <td class="text-center">@if(!empty($dealer['state'])) {{$dealer['state']}} @else {{"-"}} @endif</td>
                                <td class="text-center">
                                    <?php if ($dealer->jewels_type == "Gold") { ?>
                                        <div class="badge badge-soft-warning font-size-14">{{$dealer->jewels_type}}</div>
                                    <?php } else if ($dealer->jewels_type == "Silver") { ?>
                                        <div class="badge badge-soft-secondary font-size-14">{{$dealer->jewels_type}}</div>
                                    <?php } else if ($dealer->jewels_type == "All") { ?>
                                        <div class="badge badge-soft-warning font-size-14">Gold</div> <div class="badge badge-soft-secondary font-size-14">Silver</div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <a type="button" href="{{ route('dealers.edit', $dealer['id']) }}" class="btn btn-success waves-light waves-effect" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a type="button" href="{{ route('dealers.view', $dealer['id']) }}" class="btn btn-dark waves-light waves-effect" title="View"><i class="fa fa-eye"></i></a>
                                        <a rel="tooltip" data-value="{{$dealer['id']}}" href="{{ route('dealers.delete',$dealer['id']) }}" class="delete btn btn-danger waves-light waves-effect" title="Delete"><i class="far fa-trash-alt"></i></a>
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
                        <p> Showing {{$dealers->firstItem()}} to {{$dealers->lastItem()}} of {{$dealers->total()}} entries</p>
                    </div>
                    <div class="col-xl-6">
                        <nav aria-label="...">
                            {{ $dealers->links('layouts.pagination') }}
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