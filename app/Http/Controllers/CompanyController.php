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
                return redirect("/company/{{$id}}/edit");
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
                return redirect("/company/{{$id}}/edit");
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
                return redirect('/company/create');
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
}
