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

            <!-- start Add new button -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="card-title">Gold Jewelries List</h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                        <div>
                            <a href="{{ route('jewelries.add') }}" class="btn btn-dark"><i class="bx bx-plus me-1"></i> Add New</a>
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
                                <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                                    <select class="form-select" name="item_name">
                                        <?php
                                        $items = App\Models\Item::where('status', 'Active')->orderby('id', 'asc')->get();
                                        ?>
                                        <option value="">Select Gold Item</option>
                                        <?php foreach ($items as $item) { ?>
                                            <option @if(isset($_REQUEST['item_name']) && $_REQUEST['item_name']==$item['id']) selected @endif value="{{ $item['id'] }}">{{ $item['item_name'] }}</option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                                    <select class="form-select" name="quality_type">
                                        <option value="">Select Quality Type</option>
                                        <option @if(isset($_REQUEST['quality_type']) && $_REQUEST['quality_type']=='Halmark' ) selected @endif value="Halmark">Halmark</option>
                                        <option @if(isset($_REQUEST['quality_type']) && $_REQUEST['quality_type']=='HUID' ) selected @endif value="HUID">HUID</option>
                                    </select>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mt-2 mb-3">
                                    <button type="submit" class="btn btn-success" name="search"><i class="bx bx-search"></i></button>
                                    @if (isset($_REQUEST['search']))
                                    <a href="{{ route('jewelries.index') }}" class="btn btn-danger"><i class="bx bx-x"></i></a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end serach  -->

            <!-- start table -->
            <?php if ($jewelries->count() > '0') { ?>
                <div class="table-responsive mb-4">
                    <table class="table align-middle dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead style="color: #fff;background-color: #343a40;border-color: #343a40;">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Item Name</th>
                                <th scope="col" class="text-center">Quality Type</th>
                                <th scope="col" class="text-center">HUID Number</th>
                                <th scope="col" class="text-center">Gross Weight</th>
                                <th style="width: 80px; min-width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($jewelries->currentpage() - 1) * $jewelries->perpage() + 1; ?>
                            @foreach($jewelries as $jewelry)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <?php $items = App\Models\Item::where('id', $jewelry['item_name'])->first(); ?>
                                <td class="text-center">{{$items->item_name}}</td>
                                <td class="text-center">{{$jewelry->quality_type}}</td>
                                <td class="text-center">{{$jewelry->huid_number}}</td>
                                <td class="text-center">{{$jewelry->gross_weight}}</td>
                                <td>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <a type="button" href="{{ route('jewelries.edit', $jewelry['id']) }}" class="btn btn-success waves-light waves-effect" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a type="button" href="{{ route('jewelries.view', $jewelry['id']) }}" class="btn btn-dark waves-light waves-effect" title="View"><i class="fa fa-eye"></i></a>
                                        <a rel="tooltip" data-value="{{$jewelry['id']}}" href="{{ route('jewelries.delete',$jewelry['id']) }}" class="delete btn btn-danger waves-light waves-effect" title="Delete"><i class="far fa-trash-alt"></i></a>
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
                        <p> Showing {{$jewelries->firstItem()}} to {{$jewelries->lastItem()}} of {{$jewelries->total()}} entries</p>
                    </div>
                    <div class="col-xl-6">
                        <nav aria-label="...">
                            {{ $jewelries->links('layouts.pagination') }}
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