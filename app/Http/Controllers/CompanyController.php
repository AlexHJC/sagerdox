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

    // show manage page
    public function manage()
    {
        return view('companies.manage', [
            'companies' => auth()->user()->companies()->get()
        ]);
    }

    public function edit(Company $company)
    {
        return view('companies.edit', [
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

        if ($request->has('description')) {
            $formFields['description'] = $request['description'];
        }

        $formFields['user_id'] = auth()->id();

        Company::create($formFields);

        return redirect('/')->with('message', 'Company created successfully');
    }

    // update certificate data
    public function update(Request $request, Company $company)
    {

        // make sure logged in user is owner

        if ($company->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => ['required', 'email']
        ]);

        if ($request->has('description')) {
            $formFields['description'] = $request['description'];
        }

        $company->update($formFields);

        return back()->with('message', 'Company updated successfully');
    }

    public function destroy(Company $company)
    {

        // make sure logged in user is owner

        if ($company->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $company->delete();
        return back()->with('message', 'Company deleted successfully');
    }

    public function getCompanies(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $companies = Company::orderby('title', 'asc')->select('id', 'title')->get();
        } else {
            $companies = Company::orderby('title', 'asc')->select('id', 'title')->where('title', 'like', '%' . $search . '%')->limit(5)->get();
        }
        $response = array();
        foreach ($companies as $company) {
            $response[] = array(
                "id" => $company->id,
                "text" => $company->title
            );
        }
        return response()->json($response);
    }
}
