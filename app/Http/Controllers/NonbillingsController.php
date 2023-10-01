<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nonbilling;
use App\Models\Silverinvoice;
use Session;
use PDF;

class NonbillingsController extends Controller
{
    // Silver Non Billing Index
    public function index()
    {
        $nonbillings = Nonbilling::where('status', '<>', 'Trash')->orderBy('id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];
            $nonbillings->where(function ($query) use ($s) {
                $query->where('customer_name', 'LIKE', "%$s%");
            });
        }
        $nonbillings = $nonbillings->paginate(10);
        return view('nonbillings.index', ['nonbillings' => $nonbillings]);
    }

    // Silver Non Billing Add
    public function add()
    {
        return view('nonbillings.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'customer_name' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'state' => 'required',
        ]);
        $nonbillings = new Nonbilling();
        $nonbillings->customer_name = ucwords($request->customer_name);
        $nonbillings->mobile_number = $request->mobile_number;
        $nonbillings->address = ucwords($request->address);
        $nonbillings->state = ucwords($request->state);
        $nonbillings->bill_number = $request->bill_number;
        $nonbillings->date = $request->date;
        $nonbillings->time = $request->time;
        $nonbillings->silver_rate = number_format((float)$request->silver_rate, 2, '.', '');
        $nonbillings->total_quantity = $request->total_quantity;
        $nonbillings->total_weight = $request->total_weight;
        $nonbillings->total_amount = $request->total_amount;
        $nonbillings->sgst_amount = $request->sgst_amount;
        $nonbillings->cgst_amount = $request->cgst_amount;
        $nonbillings->total_final_amount = $request->total_final_amount;
        $nonbillings->status = "Active";
        $nonbillings->save();
        $last_id = $nonbillings->id;
        if (!empty($request->amount)) {
            if (!empty($request->weight)) {
                if (!empty($request->quantity)) {
                    if (!empty($request->description)) {
                        $n = sizeof((array)$request['description']);
                        $amount = $request->amount;
                        $weight = $request->weight;
                        $quantity = $request->quantity;
                        $description = $request->description;
                        for ($i = 0; $i < $n; $i++) {
                            $data = new Silverinvoice();
                            $data->nonbilling_id = $last_id;
                            $data->hsn_no = "7106";
                            $data->description = $description[$i] ? $description[$i] : "";
                            $data->quantity = $quantity[$i] ? $quantity[$i] : "";
                            $data->weight = $weight[$i] ? $weight[$i] : "";
                            $data->amount = $amount[$i] ? $amount[$i] : "";
                            $data->status = "Active";
                            $data->save();
                        }
                    }
                }
            }
        }
        Session::flash('message', 'Silver Invoice Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('nonbillings.index', []);
    }

    // Silver Non Billing View
    public function view($id = null)
    {
        $nonbilling = Nonbilling::where('id', '=', $id)->first();
        return view('nonbillings.view', ['nonbilling' => $nonbilling]);
    }

    // Silver Outstock Delete
    public function delete($id = null)
    {
        $data = Nonbilling::find($id);
        $data->delete();
        $invoices = Silverinvoice::where('nonbilling_id', '=', $id)->get();
        foreach ($invoices as $invoice) {
            $last = $invoice['id'];
            $data = Silverinvoice::findOrFail($last);
            $data->delete();
        }
        Session::flash('message', 'Deleted Sucessfully!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('nonbillings.index', []);
    }


    public function invoicepdf($id = null)
    {
        $pdf = PDF::loadView('nonbillings.receiptform', ['id' => $id]);
        //print_r($pdf);exit;
        $file_name =  'Invoice_' . date('ymd') . $id;
        return $pdf->download($file_name . '.pdf');
    }

    public function receiptform($id = null)
    {
        return view('nonbillings.receiptform', ['id' => $id]);
    }
}
