<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dealer;
use Session;

class DealersController extends Controller
{
    public function index()
    {
        $dealers = Dealer::where('status', '<>', 'Trash')->orderBy('id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];
            $dealers->where(function ($query) use ($s) {
                $query->where('dealer_name', 'LIKE', "%$s%");
            });
        }
        $dealers = $dealers->paginate(10);
        return view('dealers.index', ['dealers' => $dealers]);
    }

    public function add()
    {
        return view('dealers.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'dealer_name' => 'required',
            'mobile_number' => 'required'
        ]);
        $dealers = new Dealer();
        $dealers->jewels_type = $request->jewels_type;
        $dealers->dealer_name = ucwords($request->dealer_name);
        $dealers->mobile_number = $request->mobile_number;
        if (!empty($request->address)) {
            $dealers->address = ucwords($request->address);
        } else {
            $dealers->address = "-";
        }
        if (!empty($request->state)) {
            $dealers->state = ucwords($request->state);
        } else {
            $dealers->state = "-";
        }
        $dealers->status = "Active";
        $dealers->save();
        Session::flash('message', 'Dealer Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('dealers.index', []);
    }

    public function edit($id = null)
    {
        $dealer = Dealer::where('id', '=', $id)->first();
        return view('dealers.edit', ['dealer' => $dealer]);
    }

    public function update(Request $request, $id = null)
    {
        $validateData = $request->validate([
            'dealer_name' => 'required',
            'mobile_number' => 'required'
        ]);
        $dealers = Dealer::find($id);
        $dealers->jewels_type = $request->jewels_type;
        $dealers->dealer_name = ucwords($request->dealer_name);
        $dealers->mobile_number = $request->mobile_number;
        if (!empty($request->address)) {
            $dealers->address = ucwords($request->address);
        } else {
            $dealers->address = "-";
        }
        if (!empty($request->state)) {
            $dealers->state = ucwords($request->state);
        } else {
            $dealers->state = "-";
        }
        $dealers->status = "Active";
        $dealers->save();
        Session::flash('message', 'Dealer Details Updated!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('dealers.index', []);
    }

    public function view($id = null)
    {
        $dealer = Dealer::where('id', '=', $id)->first();
        return view('dealers.view', ['dealer' => $dealer]);
    }

    public function delete($id = null)
    {
        $data = Dealer::find($id);
        $data->delete();
        Session::flash('message', 'Deleted Sucessfully!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('dealers.index', []);
    }
}
