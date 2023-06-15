<?php

namespace App\Http\Controllers;

use App\Models\Logette;
use App\Models\Temperature;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    //get all temperatures of a logette
    public function index($id)
    {
        $logette = Logette::find($id);

        if (!$logette) {
            return response([
                'message' => 'logette introuvable.'
            ], 403);
        }



        return response([
            'temperatures' => $logette->temperatures()->get()
        ], 200);
    }

    //create a temperature
    public function store(Request $request, $id)
    {
        $logette = Logette::find($id);

        if (!$logette) {
            return response([
                'message' => 'logette introuvable.'
            ], 403);
        }

        // validate fields
        $attrs = $request->validate([
            'temperature' => 'required|string',
        ]);

        Temperature::create([
            'temperature' => $attrs['temperature'],
            'logette_id' => $id,
        ]);

        return response([
            'message' => 'temperature created.'
        ], 200);
    }
}
