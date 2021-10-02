<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use PDF;

class EmployeeController extends Controller
{
    public function index()
    {
        $title = "Employees";
        $emps = DB::table('employees')
            ->leftJoin('companies', 'employees.company_id', '=', 'companies.id')
            ->select('employees.*', 'companies.name as company_name')
            ->paginate(5);
        return view('employee.index', ['title' => $title, 'emps' => $emps]);
    }

    public function search_employees(Request $request)
    {
        $title = "Employees";
        $search = $request->search;

        if ($search) {
            $emps = DB::table('employees')
                ->leftJoin('companies', 'employees.company_id', '=', 'companies.id')
                ->where('employees.name', 'like', "%" . $search . "%")
                ->orWhere('employees.email', 'like', "%" . $search . "%")
                ->select('employees.*', 'companies.name as company_name')
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

    public function edit($id)
    {
        $emp = Employee::find($id);
        $title = "Employees";
        $sub_title = "Edit";
        $coms = Company::all();
        return view('employee.edit', ['title' => $title, 'sub_title' => $sub_title, 'emp' => $emp, 'coms' => $coms]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies,email,' . $id,
            'company_id' => 'required'
        ]);

        $emp = Employee::find($id);
        $emp->update([
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $request->company_id
        ]);

        if (!$emp) {
            session()->flash('error', 'Data failed to update.');
            return redirect('/employees/{{$id}}/edit');
        } else {
            session()->flash('success', 'Data success to update.');
            return redirect('/employees');
        }
    }

    public function destroy($id)
    {
        $emp = Employee::find($id);
        $emp->delete();

        if (!$emp) {
            session()->flash('error', 'Data failed to update.');
            return redirect('/employees');
        } else {
            session()->flash('success', 'Data success to update.');
            return redirect('/employees');
        }
    }

    public function createPDF()
    {
        $emps = DB::table('employees')
            ->leftJoin('companies', 'employees.company_id', '=', 'companies.id')
            ->select('employees.*', 'companies.name as company_name')
            ->get();
        $title = "Employees";

        // return view('employee.pdf_view', ['emps' => $emps, 'title' => $title]);
        $pdf = PDF::loadView('employee.pdf_view', ['emps' => $emps, 'title' => $title])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('employees.pdf');
    }
}
