<?php

namespace App\Http\Controllers;

use App\Models\Logette;
use App\Models\Tension;
use Illuminate\Http\Request;

class TensionController extends Controller
{
    //get all tensions of a logette
    public function index($id)
    {
        $logette = Logette::find($id);

        if (!$logette) {
            return response([
                'message' => 'logette introuvable.'
            ], 403);
        }



        return response([
            'tensions' => $logette->tensions()->get()
        ], 200);
    }

    //create a tension
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
            'tension1' => 'required|string',
            'tension2' => 'required|string',
            'tension3' => 'required|string',
        ]);

        Tension::create([
            'tension1' => $attrs['tension1'],
            'tension2' => $attrs['tension2'],
            'tension3' => $attrs['tension3'],
            'logette_id' => $id,
        ]);

        return response([
            'message' => 'tension created.'
        ], 200);
    }
}
