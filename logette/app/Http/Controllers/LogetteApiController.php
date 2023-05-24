<?php

namespace App\Http\Controllers;

use App\Models\Logette;
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
        return Logette::where('libelle', 'like','%'.$libelle.'%')->get();
    }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logette(Request $request){
        Storage::append("arduino-log.txt", 
        "Time : " .now()->format("Y-m-d H:i:s") . ','.
        "Temperature: " . $request->get("temperature", "n/a") . '°C, '. 
        "Humidity : " . $request->get("humidity", "n/a") . '%');
    }
}
