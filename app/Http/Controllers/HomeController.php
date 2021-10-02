<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class HomeController extends Controller
{
    public function index()
    {
        $title = "TEST BAGIAN 2";
        $info = "CRUD Employees and Companies";
        $company_count = Company::count();
        $employee_count = Employee::count();
        return view('home.index', ['title' => $title, 'info' => $info, 'company_count' => $company_count, 'employee_count' => $employee_count]);
    }
}
