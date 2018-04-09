<?php

namespace App\Http\Controllers;

use App\Item;
use App\Location;
use App\Unit;
use App\Tax;
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
        
        $items = Item::where('company_id', $companyid)->orderBy('name', 'asc')->paginate(20);

        return view('items.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($companyid)
    {
        $item = new Item;
        $locations = Location::where('company_id', $companyid)->get();
        $units = Unit::where('company_id', $companyid)->get();
        $taxes = Tax::where('company_id', $companyid)->get();
        return view('items.create', [
            'item'      => $item, 
            'locations' => $locations, 
            'units'     => $units, 
            'taxes'     => $taxes,
            'company_id' => $companyid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateItemRequest $request)
    {
        $item = Item::create([
            'id_item'       => $request->input('id_item'),
            'name'          => $request->input('name'),
            'description'   => $request->input('description'),
            'company_id'    => $request->input('company_id'),
            'location_id'   => $request->input('location_id'),
            'cost'          => $request->input('cost'),
            'price'         => $request->input('price'),
            'unit_id'       => $request->input('unit_id'),
            'stock'         => $request->input('stock'),
            'stock_min'     => $request->input('stock_min'),
            'stock_max'     => $request->input('stock_max'),
            'tax_id'        => $request->input('tax_id'),
            'included_tax'  => $request->has('included_tax'),
            'max_discount'  => $request->input('max_discount'),
            'state'         => $request->has('state'),
        ]);

        if($request->hasFile('image')){
            $item->image = $request->file('image')->store('public');
        }
        $item->save();

        if($item){
            return redirect()->route('items.company', $item->company_id)->with('success', trans('adminlte::adminlte.update_succeeded'));
        }

        return back()->withInput()->with('errors', tranas('adminlte::adminlte.update_error'));
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
        $taxes = Tax::where('company_id', $item->company_id)->get();
        return view('items.edit', [
            'item'      => $item, 
            'locations' => $locations, 
            'units'     => $units,
            'taxes'     => $taxes,
        ]);
    }

    public function state(Item $item){
        if($item->state == false){
            $state = true;
        }
        else{
            $state = false;
        }

        $item->update([
            'state' => $state,
        ]);

        if($item){
            return redirect()->route('items.company', [$item->company_id])->with('success', trans('adminlte::adminlte.update_succeeded'));
        }

        return back()->withInput()->with('errors', trans('adminlte::adminlte.update_error'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {

        //dd($request);
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
            'tax_id'        => $request->input('tax_id'),
            'included_tax'  => $request->has('included_tax'),
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
