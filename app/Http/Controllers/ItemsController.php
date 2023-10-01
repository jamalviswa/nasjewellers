<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Item;
use Session;

class ItemsController extends Controller
{
    // Items Index
    public function index()
    {
        $items = Item::where('status', '<>', 'Trash')->orderBy('id', 'desc');
        if (!empty($_REQUEST['s'])) {
            $s = $_REQUEST['s'];
            $items->where(function ($query) use ($s) {
                $query->where('item_name', 'LIKE', "%$s%");
            });
        }
        $items = $items->paginate(10);
        return view('items.index', ['items' => $items]);
    }

    // Items Add
    public function add()
    {
        return view('items.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'item_name' => ['required', Rule::unique('items')->where(function ($query) use ($request) {
                return $query->where('item_name', $request->item_name)->where('status', '<>', 'Trash');
            })],
        ]);
        $items = new Item();
        $items->item_name = ucwords($request->item_name);
        $items->status = "Active";
        $items->save();
        Session::flash('message', 'Item Details Added!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('items.index', []);
    }

    // Items View
    public function view($id = null)
    {
        $item = Item::where('id', '=', $id)->first();
        return view('items.view', ['item' => $item]);
    }

    // Items Edit
    public function edit($id = null)
    {
        $item = Item::where('id', '=', $id)->first();
        return view('items.edit', ['item' => $item]);
    }

    public function update(Request $request, $id = null)
    {
        $validateData = $request->validate([
            'item_name' => ['required', Rule::unique('items')->where(function ($query) use ($request, $id) {
                return $query->where('item_name', $request->item_name)->where('id', '<>', $id)->where('status', '<>', 'Trash');
            })],
        ]);
        $items = Item::find($id);
        $items->item_name = ucwords($request->item_name);
        $items->status = "Active";
        $items->save();
        Session::flash('message', 'Item Details Updated!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('items.index', []);
    }

    // Items Delete
    public function delete($id = null)
    {
        $data = Item::find($id);
        $data->delete();
        Session::flash('message', 'Deleted Sucessfully!');
        Session::flash('alert-class', 'success');
        return \Redirect::route('items.index', []);
    }
}
