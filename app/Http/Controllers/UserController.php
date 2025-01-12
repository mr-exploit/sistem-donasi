<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('users.index');
    }

    public function programView() 
    {
        return view('users.program');
    }

    public function beritaView() 
    {
        return view('users.berita');
    }
  
}
