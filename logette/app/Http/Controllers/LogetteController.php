<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logette;
use App\Models\User;

class LogetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logettes = Logette::all();
        $users = User::all()->pluck('name','id');

        return view('admin.logettes.index', compact('logettes','users'));
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required',
            'user_id' => 'required',
        ]);


        $input = $request->all();
        $logette = new Logette();
        $logette->libelle = $input['libelle'];
        $logette->user_id = $input['user_id'];
        $logette->etat = 0;
        $logette->save();

        return redirect()->route('logettes.index')
                        ->with('status','Logette créée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logette = Logette::find($id);

        return view('admin.logette_by_user.show', compact('logette'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function allumer($id){

        $logette = Logette::find($id);
        $logette->etat = 1;

        $logette->update();

        return back()->with('success', 'Logette allumée avec succès !!!');
    }
    public function eteindre($id){
        
        $logette = Logette::find($id);
        $logette->etat = 0;

        $logette->update();

        return back()->with('status', 'Logette éteinte avec succès !!!');
    }
}
