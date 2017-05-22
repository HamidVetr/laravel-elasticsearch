<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Item;

class ItemSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
//            dd($request->all());
            $items = Item::search($request->input('search'))->get();
//            dd($items);
            return view('ItemSearch',compact('items'));
        }
//        dd($items);
        return view('ItemSearch');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $item = Item::create($request->all());
        $item->addToIndex();

        return redirect()->back();
    }
}
