<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = "TEST BAGIAN 2";
        $info = "CRUD Employees and Companies";
        return view('home.index', ['title' => $title, 'info' => $info]);
    }
}
