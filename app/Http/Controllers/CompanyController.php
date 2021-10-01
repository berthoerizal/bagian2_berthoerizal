<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $title = "Companies";
        $coms = Company::paginate(5);
        return view('company.index', ['title' => $title, 'coms' => $coms]);
    }

    public function create()
    {
        $title = "Company";
        $sub_title = "Add";
        return view('company.create', ['title' => $title, 'sub_title' => $sub_title]);
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
                return redirect('/company/create');
            } else {
                session()->flash('success', 'Data success to add.');
                return redirect('/companies');
            }
        }
    }
}
