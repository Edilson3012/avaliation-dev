<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $qtd = Usuario::all()->count();
        return view('index', [
            'usuario' => $qtd
        ]);
    }
}
