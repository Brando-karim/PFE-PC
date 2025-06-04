<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PCPartSpecs;

class PCPartSpecsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pcpartspecs = PCPartSpecs::paginate(25);
        return view('pcpartspecs.index', compact('pcpartspecs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $specs = PCPartSpecs::find($id);
        $specs->delete();
        return back()->with(
            'success', 'PC Part Specs deleted successfully.'
        );
    }
}
