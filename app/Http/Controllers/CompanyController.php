<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use PDF;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Companies";
        $coms = Company::paginate(5);
        return view('company.index', ['title' => $title, 'coms' => $coms]);
    }

    public function search_company(Request $request)
    {
        $title = "Companies";
        $search = $request->search;

        if ($search) {
            $coms = DB::table('companies')
                ->where('name', 'like', "%" . $search . "%")
                ->orWhere('email', 'like', "%" . $search . "%")
                ->paginate(5);
        } else {
            return redirect('companies');
        }

        return view('company.index', ['coms' => $coms, 'title' => $title]);
    }

    public function create()
    {
        $title = "Company";
        $sub_title = "Add";
        return view('company.create', ['title' => $title, 'sub_title' => $sub_title]);
    }

    public function edit($id)
    {
        $title = "Company";
        $sub_title = "Edit";
        $com = Company::find($id);
        return view('company.edit', ['title' => $title, 'sub_title' => $sub_title, 'com' => $com]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies,email,' . $id,
            'website' => 'required|url',
            'logo' => 'image|mimes:png|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        if ($request->hasFile('logo')) {
            $resorce  = $request->file('logo');
            $logo   = date("s") . '-' . $resorce->getClientOriginalName();
            $resorce->move(public_path('/images'), $logo);

            $com = Company::find($id);
            if ($com->logo != 'default-image.jpg') {
                unlink("images/" . $com->logo);
            }

            $com->update([
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
                'logo' => $logo
            ]);

            if (!$com) {
                session()->flash('error', 'Data failed to update.');
                return redirect("/companies/{{$id}}/edit");
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect("/companies");
            }
        } else {
            $com = Company::find($id);
            $com->update([
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
            ]);

            if (!$com) {
                session()->flash('error', 'Data failed to update.');
                return redirect("/companies/{{$id}}/edit");
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect("/companies");
            }
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:companies|email',
            'website' => 'required|url',
            'logo' => 'required|image|mimes:png|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        if ($request->hasFile('logo')) {
            $resorce  = $request->file('logo');
            $logo   = date("s") . '-' . $resorce->getClientOriginalName();
            $resorce->move(public_path('/images'), $logo);

            $com = Company::create([
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
                'logo' => $logo
            ]);

            if (!$com) {
                session()->flash('error', 'Data failed to add.');
                return redirect('/companies/create');
            } else {
                session()->flash('success', 'Data success to add.');
                return redirect('/companies');
            }
        }
    }

    public function destroy($id)
    {
        $com = Company::find($id);
        if ($com->logo != 'default-image.jpg') {
            unlink("images/" . $com->logo);
        }
        $com->delete();

        if (!$com) {
            session()->flash('error', 'Data failedd to delete.');
            return redirect('/companies');
        } else {
            session()->flash('success', 'Data success to delete');
            return redirect('/companies');
        }
    }

    public function createPDF($company_id)
    {
        $emps = DB::table('employees')
            ->leftJoin('companies', 'employees.company_id', '=', 'companies.id')
            ->where('company_id', $company_id)
            ->select('employees.*', 'companies.name as company_name')
            ->get();
        $com = Company::find($company_id);
        $title = "Employees";
        $sub_title = $com->name;

        $pdf = PDF::loadView('company.pdf_view', ['emps' => $emps, 'title' => $title, 'sub_title' => $sub_title])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('employees_company.pdf');
    }
}
