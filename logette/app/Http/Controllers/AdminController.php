<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {

        $users = User::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->pluck('data', 'month');

        $labels = $users->keys();
        $data = $users->values();

        return view('admin.dashboard', compact('labels', 'data'));
    }
}
