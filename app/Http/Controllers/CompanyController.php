<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // show create form
    public function create()
    {
        return view('companies.create');
    }

    // show single listing
    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => $company
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => ['required', 'email']
        ]);

        $formFields['user_id'] = auth()->id();

        Company::create($formFields);

        return redirect('/')->with('message', 'Company created successfully');
    }
}
