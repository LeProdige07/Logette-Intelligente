<?php

namespace App\Http\Controllers;

use App\Models\Energie;
use App\Models\Logette;
use Illuminate\Http\Request;

class EnergieController extends Controller
{
    //get all energies of a logette
    public function index($id)
    {
        $logette = Logette::find($id);

        if (!$logette) {
            return response([
                'message' => 'logette introuvable.'
            ], 403);
        }



        return response([
            'energies' => $logette->energies()->get()
        ], 200);
    }

    //create a energie
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
            'energie' => 'required|string',
        ]);

        Energie::create([
            'energie' => $attrs['energie'],
            'logette_id' => $id,
        ]);

        return response([
            'message' => 'Energie created.'
        ], 200);
    }
}
