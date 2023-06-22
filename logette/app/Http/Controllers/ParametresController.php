<?php

namespace App\Http\Controllers;

use App\Models\Logette;
use Illuminate\Http\Request;

class ParametresController extends Controller
{
    public function index($id){

        $logette = Logette::find($id);

        if (!$logette) {
            return response([
                'message' => 'logette introuvable.'
            ], 403);
        }



        return response([
            'temperatures' => $logette->temperatures()->get(),
            'puissances' => $logette->puissances()->get(),
            'tensions' => $logette->tensions()->get(),
            'humidites' => $logette->humiditys()->get(),
            'energies' => $logette->energies()->get(),
            'courants' => $logette->courants()->get()
        
        ], 200);
    }
}
