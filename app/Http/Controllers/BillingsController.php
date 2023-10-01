<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Dealer;
use Session;

class BillingsController extends Controller
{
    // Silver Billing Index
    public function index()
    {
        $billings = Billing::where('status', '<>', 'Trash')->orderBy('id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];
            $billings->where(function ($query) use ($s) {
                $query->where('customer_name', 'LIKE', "%$s%");
            });
        }
        $billings = $billings->paginate(10);
        return view('billings.index', ['billings' => $billings]);
    }

    // Silver Billing Add
    public function add()
    {
        return view('billings.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'customer_name' => 'required_if:customer_type,Customer',
            'total_weight' => 'required',
            'mobile_number' => 'required_if:customer_type,Customer',
            'jewels_item' => 'required',
            'dealer_name' => 'required_if:customer_type,Dealer'
        ]);
        $billings = new Billing();
        $billings->hsn_code = $request->hsn_code;
        $billings->customer_type = $request->customer_type;
        if ($request->customer_type == "Dealer") {
            $billings->customer_id = $request->dealer_name;
            $customer = Dealer::where('id', $request->dealer_name)->first();
            $billings->customer_name = $customer->dealer_name;
            $billings->mobile_number = $customer->mobile_number;
            $billings->address = $customer->address;
            $billings->state = $customer->state;
        } else if ($request->customer_type == "Customer") {
            $billings->customer_id = "0";
            $billings->customer_name = ucwords($request->customer_name);
            $billings->mobile_number = $request->mobile_number;
            if (!empty($request->address)) {
                $billings->address = ucwords($request->address);
            } else {
                $billings->address = "-";
            }
            if (!empty($request->state)) {
                $billings->state = ucwords($request->state);
            } else {
                $billings->state = "-";
            }                    
        }
        $billings->jewels_item = $request->jewels_item;
        $billings->total_weight = number_format((float)$request->total_weight, 3, '.', '');
        $billings->status = "Active";
        $billings->save();
        Session::flash('message', 'Silver Instock Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('billings.index', []);
    }

    // Silver Billing View
    public function view($id = null)
    {
        $billing = Billing::where('id', '=', $id)->first();
        return view('billings.view', ['billing' => $billing]);
    }

    // Silver Billing Edit
    public function edit($id = null)
    {
        $billing = Billing::where('id', '=', $id)->first();
        return view('billings.edit', ['billing' => $billing]);
    }

    public function update(Request $request, $id = null)
    {
        $validateData = $request->validate([
            'customer_name' => 'required',
            'date' => 'required',
            'weight' => 'required',
            'mobile_number' => 'required'
        ]);
        $billings = Billing::find($id);
        $billings->customer_name = ucwords($request->customer_name);
        $billings->mobile_number = $request->mobile_number;
        $billings->address = ucwords($request->address);
        $billings->date = $request->date;
        $billings->weight = $request->weight;
        $billings->added_by = "Admin";
        $billings->status = "Active";
        $billings->save();
        Session::flash('message', 'Billing Details Updated!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('billings.index', []);
    }

    // Silver Billing Delete
    public function delete($id = null)
    {
        $data = Billing::find($id);
        $data->delete();
        Session::flash('message', 'Deleted Sucessfully!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('billings.index', []);
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
