<?php

namespace App\Http\Controllers;

use App\Models\Drinkable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrinkableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $drinkables = $user->drinkables;
        return view('drinkables.index',compact('drinkables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('drinkables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:250',
            'size' => 'required|string|max:13',
            'brand' => 'required|string|max:250',
            'price'  =>'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        $user = Auth::user();
        $user->drinkables()->create($request->all());
        return back()->with('success','Drinkable Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $drinkable = Drinkable::find($id);
        if(!$drinkable){
            abort(404,'Not Found');
        }
        return view('drinkables.show',compact('drinkable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $drinkable = Drinkable::find($id);
        if(!$drinkable){
            abort(404,'Not Found');
        }
        return view('drinkables.edit',compact('drinkable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>'required|string|max:250',
            'size' => 'required|string|max:13',
            'brand' => 'required|string|max:250',
            'price'  =>'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        $drinkable = Drinkable::find($id);
        if(!$drinkable){
            abort(404,'Not Found');
        }
        $drinkable->update($request->all());
        return redirect('/drinkables');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $drinkable = Drinkable::find($id);
        if(!$drinkable){
            abort(404,'Not Found');
        }
        $drinkable->delete();
        return redirect('/drinkables');
    }
}
