<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jewelry;
use Session;

class JewelriesController extends Controller
{
    public function index()
    {
        $jewelries = Jewelry::where('status', '<>', 'Trash')->orderBy('id', 'desc');
        if (!empty($_REQUEST['item_name'])) {
            $item_name = $_REQUEST['item_name'];
            $jewelries->where(function ($query) use ($item_name) {
                $query->where('item_name', 'LIKE', "%$item_name%");
            });
        }
        if (!empty($_REQUEST['quality_type'])) {
            $quality_type = $_REQUEST['quality_type'];
            $jewelries->where(function ($query) use ($quality_type) {
                $query->where('quality_type', 'LIKE', "%$quality_type%");
            });
        }
        $jewelries = $jewelries->paginate(10);
        return view('jewelries.index', ['jewelries' => $jewelries]);
    }

    public function add()
    {
        return view('jewelries.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'item_name' => ['required'],
            'quality_type' => ['required'],
            'huid_number' => 'required_if:quality_type,HUID',
            'gross_weight' => ['required'],
        ]);
        $jewelries = new Jewelry();
        $jewelries->item_name = $request->item_name;
        $jewelries->quality_type = $request->quality_type;
        $jewelries->huid_number = ($request->quality_type == "HUID") ? $request->huid_number : "-";
        $jewelries->gross_weight = $request->gross_weight;
        $jewelries->status = "Active";
        $jewelries->save();
        Session::flash('message', 'Jewelries Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('jewelries.index', []);
    }

    public function view($id = null)
    {
        $jewelry = Jewelry::where('id', '=', $id)->first();
        return view('jewelries.view', ['jewelry' => $jewelry]);
    }

    public function edit($id = null)
    {
        $jewelry = Jewelry::where('id', '=', $id)->first();
        return view('jewelries.edit', ['jewelry' => $jewelry]);
    }

    public function update(Request $request, $id = null)
    {
        $validateData = $request->validate([
            'item_name' => ['required'],
            'quality_type' => ['required'],
            'huid_number' => 'required_if:quality_type,HUID',
            'gross_weight' => ['required'],
        ]);
        $jewelries = Jewelry::find($id);
        $jewelries->item_name = $request->item_name;
        $jewelries->quality_type = $request->quality_type;
        $jewelries->huid_number = ($request->quality_type == "HUID") ? $request->huid_number : "-";
        $jewelries->gross_weight = $request->gross_weight;
        $jewelries->status = "Active";
        $jewelries->save();
        Session::flash('message', 'Jewelries Details Updated!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('jewelries.index', []);
    }

}
