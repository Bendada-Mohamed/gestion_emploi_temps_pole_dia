<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Groupe;
use App\Models\Filiere;
use App\Models\Option;

use App\Http\Requests\StoreGroupeRequest;
use App\Http\Requests\UpdateGroupeRequest;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Groupe::paginate(10);
        return view('admin.groupes.index', compact('groupes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filieres = Filiere::all();
        $options = Option::all();
        return view('admin.groupes.create', compact('filieres', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupeRequest $request)
    {
        Groupe::create($request->validated());
        return redirect()->route('admin.groupes.index')
                         ->with('success', 'Groupe créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Groupe $groupe)
    {
        return view('admin.groupes.show', compact('groupe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Groupe $groupe)
    {
        $filieres = Filiere::all();
        $options = Option::all();
        return view('admin.groupes.edit', compact('groupe', 'filieres', 'options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupeRequest $request, Groupe $groupe)
    {
        $groupe->update($request->validated());

        return redirect()->route('admin.groupes.index')
                        ->with('succes', 'Groupe modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groupe $groupe)
    {
        $groupe->delete();
        return redirect()->route('admin.groupes.index')
                        ->with('success', 'Groupe Supprimé avec succes');
    }
}
