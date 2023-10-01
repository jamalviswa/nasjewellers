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

            <!-- start Add new button -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="card-title">Gold Instock List</h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                        <div>
                            <a href="{{ route('instocks.add') }}" class="btn btn-dark"><i class="bx bx-plus me-1"></i> Add New</a>
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
                                    <a href="{{ route('instocks.index') }}" class="btn btn-danger"><i class="bx bx-x"></i></a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end serach  -->

            <!-- start table -->
            <?php if ($instocks->count() > '0') { ?>
                <div class="table-responsive mb-4">
                    <table class="table align-middle dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead style="color: #fff;background-color: #343a40;border-color: #343a40;">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">HSN Code</th>
                                <th scope="col" class="text-center">Customer Type</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Mobile Number</th>
                                <th scope="col" class="text-center">Address</th>
                                <th scope="col" class="text-center">State</th>
                                <th scope="col" class="text-center">Date</th>
                                <th scope="col" class="text-center">Jewels Item</th>
                                <th scope="col" class="text-center">Weight (in Grams)</th>
                                <th scope="col" class="text-center">HUID Number</th>
                                <th scope="col" class="text-center">Total Weight (in Grams)</th>
                                <th style="width: 80px; min-width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($instocks->currentpage() - 1) * $instocks->perpage() + 1; ?>
                            @foreach($instocks as $instock_gold)
                            <tr>
                                <?php $instock = App\Models\Instock::where('id', $instock_gold['instock_id'])->where('status', 'Active')->first(); ?>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center">@if(!empty($instock['hsn_code'])) {{$instock['hsn_code']}} @else {{"-"}} @endif</td>
                                <td class="text-center">@if(!empty($instock['customer_type'])) {{$instock['customer_type']}} @else {{"-"}} @endif</td>
                                <td class="text-center">@if(!empty($instock['customer_name'])) {{$instock['customer_name']}} @else {{"-"}} @endif</td>
                                <td class="text-center">@if(!empty($instock['mobile_number'])) {{$instock['mobile_number']}} @else {{"-"}} @endif</td>
                                <td class="text-center">@if(!empty($instock['address'])) {{$instock['address']}} @else {{"-"}} @endif</td>
                                <td class="text-center">@if(!empty($instock['state'])) {{$instock['state']}} @else {{"-"}} @endif</td>

                                <td class="text-center">@if(!empty($instock['created_at'])) {{date('d-m-Y',strtotime($instock['created_at']))}} @else {{"-"}} @endif</td>
                                <td class="text-center">
                                    <?php $items = App\Models\Item::where('id', $instock['jewels_item'])->where('status', 'Active')->first(); ?>
                                    @if(!empty($items['item_name'])) {{$items['item_name']}} @else {{"-"}} @endif
                                </td>
                                <td class="text-center">
                                    @if(!empty($instock_gold['weight'])) {{$instock_gold['weight']}} @else {{"-"}} @endif <br>
                                </td>
                                <td class="text-center">
                                    @if(!empty($instock_gold['huid_number'])) {{$instock_gold['huid_number']}} @else {{"-"}} @endif <br>
                                </td>
                                <td class="text-center">@if(!empty($instock['total_weight'])) {{$instock['total_weight']}} @else {{"-"}} @endif</td>
                                <td>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <!-- <a type="button" href="{{ route('instocks.edit', $instock['id']) }}" class="btn btn-success waves-light waves-effect" title="Edit"><i class="fas fa-edit"></i></a> -->
                                        <a type="button" href="{{ route('instocks.view', $instock['id']) }}" class="btn btn-dark waves-light waves-effect" title="View"><i class="fa fa-eye"></i></a>
                                        <a rel="tooltip" data-value="{{$instock['id']}}" href="{{ route('instocks.delete',$instock['id']) }}" class="delete btn btn-danger waves-light waves-effect" title="Delete"><i class="far fa-trash-alt"></i></a>
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
                        <p> Showing {{$instocks->firstItem()}} to {{$instocks->lastItem()}} of {{$instocks->total()}} entries</p>
                    </div>
                    <div class="col-xl-6">
                        <nav aria-label="...">
                            {{ $instocks->links('layouts.pagination') }}
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