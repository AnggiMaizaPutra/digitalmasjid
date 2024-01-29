<?php

namespace App\Controllers;

class Mhs extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function mhs()
    {
        return view('tabelmhs');
    }
}