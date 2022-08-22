<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaPrincipal extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
