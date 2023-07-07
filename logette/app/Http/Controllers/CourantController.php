<?php

namespace App\Http\Controllers;

use App\Models\Courant;
use App\Models\Logette;
use Illuminate\Http\Request;

class CourantController extends Controller
{
    //get all courants of a logette
    public function index($id)
    {
        $logette = Logette::find($id);

        if (!$logette) {
            return response([
                'message' => 'logette introuvable.'
            ], 403);
        }



        return response([
            'courants' => $logette->courants()->get()
        ], 200);
    }

    //create a courant
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
            'courant1' => 'required|string',
            'courant2' => 'required|string',
            'courant3' => 'required|string',
        ]);

        Courant::create([
            'courant1' => $attrs['courant1'],
            'courant2' => $attrs['courant2'],
            'courant3' => $attrs['courant3'],
            'logette_id' => $id,
        ]);

        return response([
            'message' => 'courant created.'
        ], 200);
    }
}
