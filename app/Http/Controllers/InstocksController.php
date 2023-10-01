<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instock;
use App\Models\Dealer;
use App\Models\Goldweight;
use Session;

class InstocksController extends Controller
{
    // Gold Instock Index
    public function index()
    {
        $instocks = Goldweight::where('status', '<>', 'Trash')->orderBy('id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];
            $instocks->where(function ($query) use ($s) {
                $query->where('huid_number', 'LIKE', "%$s%");
            });
        }
        $instocks = $instocks->paginate(10);
        return view('instocks.index', ['instocks' => $instocks]);
    }

    // Gold Instock Add
    public function add()
    {
        return view('instocks.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'customer_name' => 'required_if:customer_type,Customer',
            'mobile_number' => 'required_if:customer_type,Customer',
            'jewels_item' => 'required',
            'dealer_name' => 'required_if:customer_type,Dealer'
        ]);
        $instocks = new Instock();
        $instocks->hsn_code = $request->hsn_code;
        $instocks->customer_type = $request->customer_type;
        if ($request->customer_type == "Dealer") {
            $instocks->customer_id = $request->dealer_name;
            $customer = Dealer::where('id', $request->dealer_name)->first();
            $instocks->customer_name = $customer->dealer_name;
            $instocks->mobile_number = $customer->mobile_number;
            $instocks->address = $customer->address;
            $instocks->state = $customer->state;
        } else if ($request->customer_type == "Customer") {
            $instocks->customer_id = "0";
            $instocks->customer_name = ucwords($request->customer_name);
            $instocks->mobile_number = $request->mobile_number;
            if (!empty($request->address)) {
                $instocks->address = ucwords($request->address);
            } else {
                $instocks->address = "-";
            }
            if (!empty($request->state)) {
                $instocks->state = ucwords($request->state);
            } else {
                $instocks->state = "-";
            }              
        }
        $instocks->jewels_item = $request->jewels_item;
        $instocks->total_weight = $request->total_weight;
        $instocks->status = "Active";
        $instocks->save();
        $last_id = $instocks->id;
        if (!empty($request->weight)) {
            if (!empty($request->huid_number)) {
                $n = sizeof((array)$request['huid_number']);
                $weight = $request->weight;
                $huid_number = $request->huid_number;
                for ($i = 0; $i < $n; $i++) {
                    $data = new Goldweight();
                    $data->instock_id = $last_id;
                    $data->weight = $weight[$i] ? number_format((float)$weight[$i], 3, '.', '') : "0.000";
                    $data->huid_number = $huid_number[$i] ? $huid_number[$i] : "None";
                    $data->status = "Active";
                    $data->save();
                }
            }
        }     
        Session::flash('message', 'Gold Instock Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('instocks.index', []);
    }

    // Gold Instock View
    public function view($id = null)
    {
        $instock = Instock::where('id', '=', $id)->first();
        return view('instocks.view', ['instock' => $instock]);
    }

    // Gold Instock Edit
    public function edit($id = null)
    {
        $instock = Instock::where('id', '=', $id)->first();
        return view('instocks.edit', ['instock' => $instock]);
    }

    public function update(Request $request, $id = null)
    {
        $validateData = $request->validate([
            'customer_name' => 'required',
            'date' => 'required',
            'weight' => 'required',
            'mobile_number' => 'required'
        ]);
        $instocks = Instock::find($id);
        $instocks->customer_name = ucwords($request->customer_name);
        $instocks->mobile_number = $request->mobile_number;
        $instocks->address = ucwords($request->address);
        $instocks->date = $request->date;
        $instocks->weight = $request->weight;
        $instocks->added_by = "Admin";
        $instocks->status = "Active";
        $instocks->save();
        Session::flash('message', 'Instock Details Updated!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('instocks.index', []);
    }

    // Gold Instock Delete
    public function delete($id = null)
    {
        $data = Instock::find($id);
        $data->delete();
        $weights = Goldweight::where('instock_id', '=', $id)->get();
        foreach ($weights as $weight) {
            $last = $weight['id'];
            $data = Goldweight::findOrFail($last);
            $data->delete();
        }
        Session::flash('message', 'Deleted Sucessfully!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('instocks.index', []);
    }


    public function ajax(Request $request)
    {
        if (!empty($_REQUEST['mobile_number'])) {
            $id = $_REQUEST['mobile_number'];
            $numbers = Dealer::where('id', $id)->where('status', 'Active')->get();
            foreach ($numbers as $number) {
                echo  '<div class="input-group">';
                echo '<input type="text" disabled class="form-control"  name="mobile_number" value="' . $number->mobile_number . '"> ';
                echo '<div class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></div>';
                echo '</div>';
            }
            exit;
        } else if (!empty($_REQUEST['address'])) {
            $id = $_REQUEST['address'];
            $address = Dealer::where('id', $id)->where('status', 'Active')->get();
            foreach ($address as $add) {
                echo '<textarea disabled class="form-control" rows="5" name="address">' . $add->address . '</textarea> ';
            }
            exit;
        } else if (!empty($_REQUEST['state'])) {
            $id = $_REQUEST['state'];
            $states = Dealer::where('id', $id)->where('status', 'Active')->get();
            foreach ($states as $state) {
                echo '<input type="text" disabled class="form-control" name="state" value="' . $state->state . '"> ';
            }
            exit;
        }
    }
}
