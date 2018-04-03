<?php

namespace App\Http\Controllers;

use App\Item;
use App\Location;
use App\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($companyid)
    {
        
        $items = Item::where('company_id', $companyid)->paginate(10);

        return view('items.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //dd($item);
        return view('items.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $locations = Location::where('company_id', $item->company_id)->get();
        $units = Unit::where('company_id', $item->company_id)->get();
        return view('items.edit', ['item' => $item, 'locations' => $locations, 'units' => $units]);
    }

    public function state(Item $item){
        return 'Esto es state en controller';
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        if($request->hasFile('image')){
            $item->image = $request->file('image')->store('public');
        }

        $item->update([
            'id_item'       => $request->input('id_item'),
            'name'          => $request->input('name'),
            'description'   => $request->input('description'),
            'location_id'   => $request->input('location_id'),
            'cost'          => $request->input('cost'),
            'price'         => $request->input('price'),
            'unit_id'       => $request->input('unit_id'),
            'stock'         => $request->input('stock'),
            'stock_min'     => $request->input('stock_min'),
            'stock_max'     => $request->input('stock_max'),
            'include_iva'   => $request->has('include_iva'),
            'tax_iva'       => $request->input('tax_iva'),
            'max_discount'  => $request->input('max_discount'),
            'state'         => $request->has('state'),
        ]);

        if($item){
            return redirect()->route('items.show', ['item' => $item])->with('success', trans('adminlte::adminlte.update_succeeded'));
        }

        return back()->withInput()->with('errors', trans('adminlte::adminlte.update_error'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
