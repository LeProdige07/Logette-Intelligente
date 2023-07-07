<?php

namespace App\Http\Controllers;

use App\Models\Humidity;
use App\Models\Logette;
use Illuminate\Http\Request;

class HumidityController extends Controller
{
    //get all humidities of a logette

    public function index($id)
    {
        $logette = Logette::find($id);

        if (!$logette) {
            return response([
                'message' => 'logette introuvable.'
            ], 403);
        }



        return response([
            'humidités' => $logette->humiditys()->get()
        ], 200);
    }

    //create a humidity
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
            'humidity' => 'required|string',
        ]);

        Humidity::create([
            'humidity' => $attrs['humidity'],
            'logette_id' => $id,
        ]);

        return response([
            'message' => 'humidité created.'
        ], 200);
    }
}
