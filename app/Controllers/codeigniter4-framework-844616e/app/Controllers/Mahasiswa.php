<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    public function index(): string
    {
        return view('profilku');
    }
    public function input(): string
    {
        return view('inputnilai');
    }
    
}
