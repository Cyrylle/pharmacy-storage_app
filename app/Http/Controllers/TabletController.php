<?php

namespace App\Http\Controllers;

use App\Models\Tablet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TabletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tablets = $user->tablets;
        return view('tablets.index',compact('tablets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tablets.create');
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
        $user->tablets()->create($request->all());
        return back()->with('success','Tablet Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tablet = Tablet::find($id);
        if(!$tablet){
            abort(404,'Not found');
        }
        return view('tablets.show',compact('tablet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tablet = Tablet::find($id);
        if(!$tablet){
            abort(404,'Not found');
        }
        return view('tablets.edit',compact('tablet'));
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
        $tablet = Tablet::find($id);
        if(!$tablet){
            abort(404,'Not found');
        }
        $tablet->update($request->all());
        return redirect('/tablets');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tablet = Tablet::find($id);
        if(!$tablet){
            abort(404,'Not found');
        }
        $tablet->delete();
        return redirect('/tablets');

    }
}
