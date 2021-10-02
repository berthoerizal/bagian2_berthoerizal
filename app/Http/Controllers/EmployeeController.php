<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $title = "Employees";
        $emps = Employee::paginate(5);
        return view('employee.index', ['title' => $title, 'emps' => $emps]);
    }

    public function search_employees(Request $request)
    {
        $title = "Employees";
        $search = $request->search;

        if ($search) {
            $emps = DB::table('employees')
                ->where('name', 'like', "%" . $search . "%")
                ->orWhere('email', 'like', "%" . $search . "%")
                ->paginate(5);
        } else {
            return redirect('employees');
        }

        return view('employee.index', ['emps' => $emps, 'title' => $title]);
    }

    public function create()
    {
        $title = "Employee";
        $sub_title = "Add";
        $coms = Company::all();
        return view('employee.create', ['title' => $title, 'sub_title' => $sub_title, 'coms' => $coms]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:companies|email',
            'company_id' => 'required'
        ]);

        $emps = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $request->company_id
        ]);

        if (!$emps) {
            session()->flash('error', 'Data failed to add.');
            return redirect('/employees/create');
        } else {
            session()->flash('success', 'Data success to add.');
            return redirect('/employees');
        }
    }
}
