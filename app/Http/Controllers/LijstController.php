<?php

namespace App\Http\Controllers;

use App\Lijst;
use App\Product;
use App\Unit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LijstController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lijsts = User::where('id', Auth::id())->first()->lijst()->get();
        return View::make('lijst.index')->with(compact('lijsts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('lijst.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $lijst = new Lijst;

        $lijst->name = $request->name;
        $lijst->done = false;
        $lijst->user_id = Auth::id();
        $lijst->save();

        return redirect('/lijst/'.$lijst->id.'/edit'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lijst  $lijst
     * @return \Illuminate\Http\Response
     */
    public function edit(Lijst $lijst)
    {
        $usedproducts = $lijst->products()->withPivot('quantity')->get();
        $unusedproducts = new Product;
        $unusedproducts = $unusedproducts->orderBy('name','asc')->get();
        $units = Unit::all();

        return View::make('lijst.edit')
        ->with(compact('lijst'))
        ->with(compact('usedproducts'))
        ->with(compact('unusedproducts'))
        ->with(compact('units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lijst  $lijst
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lijst $lijst)
    {
        $this->validate($request, [
            'name' => 'required|max:255', 
        ],['name.required' => 'De lijst heeft geen naam gekregen.']);

        $lijst->name = $request->name;

        $lijst->save();
        return redirect('/lijst/'.$lijst->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lijst  $lijst
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lijst $lijst)
    {
        $lijst->delete();

        return redirect('/lijst');
    }

}
