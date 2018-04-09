<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($companyid, $type)
    {
        $persons = Person::where('company_id', $companyid)
            ->where(function ($query) use ($type){
                $query->where('person_type', $type)->orWhere('person_type', 'B');
            }
        )->orderBy('name', 'asc')->paginate(20);

        return view('persons.index', ['persons' => $persons, 'type' => $type]);
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
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return view('persons.show', ['person' => $person]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    public function state(Person $person){
        if($person->state == false){
            $state = true;
        }else{
            $state = false;
        }

        $person->update(['state' => $state]);

        if($person){
            return redirect()->route('persons.company', [
                'companyid' => $person->company_id, 
                'type' => $person->person_type])
            ->with('success', trans('adminlte::adminlte.update_succeeded'));
        }

        return back()->withInput()->with('errors', trans('adminlte::adminlte.update_error'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
