<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePersonRequest;
use App\Http\Requests\CreatePersonRequest;

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
    public function create($companyid, $type)
    {
        $person = new Person;
        $person->state = true;
        return view('persons.create', [
            'person' => $person, 
            'company_id' => $companyid,
            'type' => $type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePersonRequest $request)
    {
        $person_type = 'C';
        if($request->has('customer_type') == true){
            $person_type = 'C';
            if($request->has('supplier_type') == true){
                $person_type = 'B';
            }
        }elseif($request->has('supplier_type') == true){
            $person_type = 'S';
            if($request->has('customer_type') == true){
                $person_type = 'B';
            }
        }

        $person = Person::create([
            'id_person'             => $request->input('id_person'),
            'verification_digit'    => $request->input('verification_digit'),
            'name'                  => $request->input('name'),
            'address'               => $request->input('address'),
            'city_name'             => $request->input('city_name'),
            'email'                 => $request->input('email'),
            'phone_number_1'        => $request->input('phone_number_1'),
            'phone_number_2'        => $request->input('phone_number_2'),
            'cellphone_number_1'    => $request->input('cellphone_number_1'),
            'credit_limit'          => $request->input('credit_limit'),
            'credit_used'           => $request->input('credit_used'),
            'person_type'           => $person_type,
            'comments'              => $request->input('comments'),
            'company_id'            => $request->input('company_id'),
            'state'                 => $request->has('state'),
        ]);

        if($person){
            return redirect()->route('persons.company', ['companyid' => $person->company_id, 'type' => $person->person_type])->with('success', trans('adminlte::adminlte.update_succeeded'));
        }

        return back()->withInput()->with('errors', trans('adminlte::adminlte.update_errors'));
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
        return view('persons.edit', ['person' => $person, 'type' => $person->person_type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        $person_type = 'C';
        if($request->has('customer_type') == true){
            $person_type = 'C';
            if($request->has('supplier_type') == true){
                $person_type = 'B';
            }
        }elseif($request->has('supplier_type') == true){
            $person_type = 'S';
            if($request->has('customer_type') == true){
                $person_type = 'B';
            }
        }

        $person->update([
            'id_person'             => $request->input('id_person'),
            'verification_digit'    => $request->input('verification_digit'),
            'name'                  => $request->input('name'),
            'address'               => $request->input('address'),
            'city_name'             => $request->input('city_name'),
            'email'                 => $request->input('email'),
            'phone_number_1'        => $request->input('phone_number_1'),
            'phone_number_2'        => $request->input('phone_number_2'),
            'cellphone_number_1'    => $request->input('cellphone_number_1'),
            'credit_limit'          => $request->input('credit_limit'),
            'credit_used'           => $request->input('credit_used'),
            'person_type'           => $person_type,
            'comments'              => $request->input('comments'),
            'state'                 => $request->has('state'),
        ]);

        if($person){
            return redirect()->route('persons.company', ['companyid' => $person->company_id, 'type' => $person->person_type])->with('success', trans('adminlte::adminlte.update_succeeded'));
        }

        return back()->withInput()->with('errors', trans('adminlte::adminlte.update_errors'));
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
