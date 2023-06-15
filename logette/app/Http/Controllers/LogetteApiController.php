<?php

namespace App\Http\Controllers;

use App\Models\Logette;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogetteApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Logette::all();
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
            'etat' => 'required',
        ]);

        return Logette::create([
            'libelle' => $request->input('libelle'),
            'user_id' => $request->input('user_id'),
            'etat' => $request->input('etat'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Logette::find($id);
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
        $validated = $request->validate([
            'etat' => 'required',
        ]);

        $logette = Logette::find($id);

        $logette->update($request->all());

        return $logette;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Logette::destroy($id);
    }

    /**
     * Search for a libelle.
     *
     * @param  string  $libelle
     * @return \Illuminate\Http\Response
     */
    public function search($libelle)
    {
        return Logette::where('libelle', 'like', '%' . $libelle . '%')->get();
    }
    //     /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function logette(Request $request){
    //     Storage::append("arduino-log.txt", 
    //     "Time : " .now()->format("Y-m-d H:i:s") . ','.
    //     "Temperature: " . $request->get("temperature", "n/a") . '°C, '. 
    //     "Humidity : " . $request->get("humidity", "n/a") . '%');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logettes_by_user()
    {
        //get all logettes of a user
        $test = 0;
        foreach (auth()->user()->roles as $role) {
            if ($role == 'abonne') {
                $test = 1;
            }
        }

        if ($test) {
            return response([
                'message' => 'l\'utilisateur n\'est pas un abonné.'
            ], 403);
        }

        return response([
            'logettes' => auth()->user()->logettes()->get()
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function etat_logette(Request $request, $id)
    {

        $logette = Logette::find($id);

        if (!$logette) {
            return response([
                'message' => 'Logette introuvable.'
            ], 403);
        }

        // validate fields
        $attrs = $request->validate([
            'etat' => 'required|integer'
        ]);

        $logette->update([
            'etat' => $attrs['etat']
        ]);

        if ($logette->etat == 0) {
            return response([
                'message' => 'Logette éteinte.'
            ], 200);
        } else {
            return response([
                'message' => 'Logette allumée.'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function etat_status($id){

        $logette = Logette::find($id);

        if (!$logette) {
            return response([
                'message' => 'logette introuvable.'
            ], 403);
        }



        return response([
            'etat' => $logette->etat
        ], 200);
    }
}
