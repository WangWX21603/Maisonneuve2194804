<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::select()
        ->simplePaginate(10);
        return view('etudiant.index', ['etudiants'=>$etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return View('etudiant.create', ['villes' => $villes]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nom' => 'required|min:2|max:30',
            'adresse'=> 'required|max:100',
            'phone' => 'required|min:6|regex:/^\\+?\\d{1,4}?[-.\\s]?\\(?\\d{1,3}?\\)?[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,9}$/',
            'email' => 'required|email',
            'dateNaissance' => 'required|date|before:today',
            'villeId' => 'required|exists:villes,id',
        ]);


        $newPost = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'dateNaissance' => $request->dateNaissance,
            'villeId' => $request->villeId           
        ]);

        return redirect()->back()->withSuccess(trans('lang.msg_success_stu'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        return View('etudiant.show', ['etudiant' => $etudiant]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return View('etudiant.edit', ['etudiant' => $etudiant, 'villes' => $villes]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {

        $request->validate([
            'nom' => 'required|min:2|max:30',
            'adresse'=> 'required|max:100',
            'phone' => 'required|min:6|regex:/^\\+?\\d{1,4}?[-.\\s]?\\(?\\d{1,3}?\\)?[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,9}$/',
            'email' => 'required|email',
            'dateNaissance' => 'required|date|before:today',
            'villeId' => 'required|exists:villes,id',
        ]);
        
        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'dateNaissance' => $request->dateNaissance,
            'villeId' => $request->villeId  
        ]);

        return redirect()->back()->withSuccess(trans('lang.msg_success_stu'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return  redirect(route('etudiant.index'));
    }
}
