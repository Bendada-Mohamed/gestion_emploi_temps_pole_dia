<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFormateurRequest;
use App\Http\Requests\UpdateFormateurRequest;
use App\Models\Formateur;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formateurs = Formateur::paginate(10);
        return view('admin.formateurs.index', compact('formateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.formateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormateurRequest $request)
    {
        Formateur::create($request->validated());

        return redirect()->route('admin.formateurs.index')
                         ->with('success', 'Formateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formateur $formateur)
    {
        return view('admin.formateurs.show', compact('formateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formateur $formateur)
    {
        return view('admin.formateurs.edit', compact('formateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormateurRequest $request, Formateur $formateur)
    {
        $formateur->update($request->validated());
        return redirect()->route('admin.formateurs.index')
                        ->with('success', 'Formateur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formateur $formateur)
    {
        $formateur->delete();

        return redirect()->route('admin.formateurs.index')
                         ->with('success', 'Formateur Supprimé avec succes');
    }
}
