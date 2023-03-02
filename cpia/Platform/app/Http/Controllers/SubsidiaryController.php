<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Subsidiary;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubsidaryRequest;

class SubsidiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    
    public function store(StoreSubsidaryRequest $request, Customer $customer)
    {
        Subsidiary::create($request->all());

        alert()->success('Sucursal creada correctamente');

        $id = $request->customer_id;
        $customer = Customer::find($id);

        $subsidiaries = Subsidiary::where('customer_id', '=', $id)->get();

        return view('subsidiaries.index', compact('subsidiaries', 'customer'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subsidiary  $subsidiary
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        $subsidiaries = Subsidiary::where('customer_id', '=', $id)->get();

        return view('subsidiaries.index', compact('subsidiaries', 'customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subsidiary  $subsidiary
     * @return \Illuminate\Http\Response
     */
    public function edit(Subsidiary $subsidiary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subsidiary  $subsidiary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subsidiary $subsidiary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subsidiary  $subsidiary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subsidiary $subsidiary)
    {
        //
    }
    

}
