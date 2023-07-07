<?php

namespace App\Http\Controllers;

use App\Models\Logette;
use App\Models\Puissance;
use Illuminate\Http\Request;

class PuissanceController extends Controller
{
    //get all puissances of a logette
    public function index($id)
    {
        $logette = Logette::find($id);

        if (!$logette) {
            return response([
                'message' => 'logette introuvable.'
            ], 403);
        }



        return response([
            'puissances' => $logette->puissances()->get()
        ], 200);
    }

    //create a puissance
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
            'puissance' => 'required|string'
        ]);

        Puissance::create([
            'puissance' => $attrs['puissance'],
            'logette_id' => $id,
        ]);

        return response([
            'message' => 'Puissance created.'
        ], 200);
    }
}
