<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rayons.index', [
            'title' => 'AbsenSee | Rayons',
            'rayons' => Rayon::orderBy('nama_rayon')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rayons.create', [
            'rayons' => Rayon::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_rayon' => 'required',
            'pembimbing_rayon' => 'required'
        ]);

        Rayon::create($request->all());
        return redirect('/rayons')->with('success', 'Rayons Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function edit(Rayon $rayon)
    {
        return view('rayons.edit', [
            'rayon' => $rayon
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rayon $rayon)
    {
        $validatedData = $request->validate([
            'nama_rayon' => 'required',
            'pembimbing_rayon' => 'required'
        ]);

        $rayon->update($validatedData);

        return redirect()->route('rayons.index')->with('success', 'Update Has Been Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rayon $rayon)
    {
        $rayon->delete();

        return redirect()->route('rayons.index')->with('success', 'Rayon Delete Successfully !');
    }
}
