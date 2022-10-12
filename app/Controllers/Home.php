<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('tampil_login');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
}
