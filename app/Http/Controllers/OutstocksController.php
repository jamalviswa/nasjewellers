<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outstock;
use App\Models\Instock;
use App\Models\Goldweight;
use App\Models\Goldinvoice;
use Session;

class OutstocksController extends Controller
{
    // Gold Outstock Index
    public function index()
    {
        $outstocks = Outstock::where('status', '<>', 'Trash')->orderBy('id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];
            $outstocks->where(function ($query) use ($s) {
                $query->where('customer_name', 'LIKE', "%$s%");
            });
        }
        $outstocks = $outstocks->paginate(10);
        return view('outstocks.index', ['outstocks' => $outstocks]);
    }

    // Gold Outstock Add
    public function add()
    {
        return view('outstocks.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'customer_name' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'state' => 'required',
        ]);
        $outstocks = new Outstock();
        $outstocks->customer_name = ucwords($request->customer_name);
        $outstocks->mobile_number = $request->mobile_number;
        $outstocks->address = ucwords($request->address);
        $outstocks->state = ucwords($request->state);
        $outstocks->bill_number = $request->bill_number;
        $outstocks->date = $request->date;
        $outstocks->time = $request->time;
        $outstocks->gold_rate = number_format((float)$request->gold_rate, 2, '.', '');
        $outstocks->total_quantity = $request->total_quantity;
        $outstocks->total_weight = $request->total_weight;
        $outstocks->total_amount = $request->total_amount;
        $outstocks->sgst_amount = $request->sgst_amount;
        $outstocks->cgst_amount = $request->cgst_amount;
        $outstocks->total_final_amount = $request->total_final_amount;
        $outstocks->status = "Active";
        $outstocks->save();
        $last_id = $outstocks->id;
        if (!empty($request->amount)) {
            if (!empty($request->weight)) {
                if (!empty($request->quantity)) {
                    if (!empty($request->huid_number)) {
                        if (!empty($request->description)) {
                            $n = sizeof((array)$request['description']);
                            $amount = $request->amount;
                            $weight = $request->weight;
                            $quantity = $request->quantity;
                            $description = $request->description;
                            $huid_number = $request->huid_number;
                            for ($i = 0; $i < $n; $i++) {
                                $data = new Goldinvoice();
                                $data->outstock_id = $last_id;
                                $data->hsn_no = "7108";
                                $data->huid_number = $huid_number[$i] ? $huid_number[$i] : "";
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
        }
        Session::flash('message', 'Gold Invoice Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('outstocks.index', []);
    }


    public function ajax(Request $request)
    {
        if (!empty($_REQUEST['weight'])) {
            $id = $_REQUEST['weight'];
            $numbers = Goldweight::where('huid_number', $id)->where('status', 'Active')->get();
            foreach ($numbers as $number) {
                echo  '<td>';
                echo '<input type="text" readonly class="form-control"  name="weight[]" value="' . $number->weight . '"> ';
                echo '</td>';
            }
            exit;
        }
    }

    // Gold Outstock View
    public function view($id = null)
    {
        $outstock = Outstock::where('id', '=', $id)->first();
        return view('outstocks.view', ['outstock' => $outstock]);
    }

    // Gold Outstock Delete
    public function delete($id = null)
    {
        $data = Outstock::find($id);
        $data->delete();
        $invoices = Goldinvoice::where('outstock_id', '=', $id)->get();
        foreach ($invoices as $invoice) {
            $last = $invoice['id'];
            $data = Goldinvoice::findOrFail($last);
            $data->delete();
        }
        Session::flash('message', 'Deleted Sucessfully!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('outstocks.index', []);
    }

}
