<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
class OffreControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Offre.Offre');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
            $request->validate([
                'titre' => 'required|string',
                'description' => 'required|string',
                'image' => 'nullable|file|mimes:jpg,jpeg,png',
                'status' => 'required|string',
            ]);

            $offre = new Offre();
            $offre->titre = $request->titre;
            $offre->description = $request->description;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time(). '.'. $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $offre->image = $imageName;
            }

            $offre->status = $request->status;
            $offre->save();

            return redirect()->route('dash')->with('success', 'Offre ajoutée avec succès!');

    }


    public function store(Request $request)
    {

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
        //
    }
}
