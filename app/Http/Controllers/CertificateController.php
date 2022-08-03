<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CertificateController extends Controller
{
    // show all certificates
    public function index()
    {
        return view('index', [
            'certificates' => Certificate::latest()->filter(request(['expiry_date', 'search']))->simplepaginate(6)
        ]);
    }

    // show single listing
    public function show(Certificate $certificate)
    {
        return view('certificates.show', [
            'certificate' => $certificate
        ]);
    }

    // show edit form
    public function edit(Certificate $certificate)
    {
        return view('certificates.edit', [
            'certificate' => $certificate
        ]);
    }

    // show create form
    public function create()
    {
        return view('certificates.create');
    }

    // store certificate data
    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company_id' => ['required', 'numeric'],
            'category' => 'required',
            'product_code' => ['required', 'numeric'],
            'expiry_date' => ['required', 'date'],
            'description' => 'required'
        ]);

        // TODO figure out how to have optional description
        //      add nullable description in database migrations once this is done
        // if ($request->has('description')) {
        //     $formfields['description'] = $request['description'];
        // }

        if ($request->hasFile('uploads')) {
            $formFields['uploads'] = $request->file('uploads')->store('uploads', 'public');
        }

        Certificate::create($formFields);

        return redirect('/')->with('success', 'Certificate created successfully');
    }

    // update certificate data
    public function update(Request $request, Certificate $certificate)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company_id' => ['required', 'numeric'],
            'category' => 'required',
            'product_code' => ['required', 'numeric'],
            'expiry_date' => ['required', 'date'],
            'description' => 'required'
        ]);

        // TODO figure out how to have optional description
        //      add nullable description in database migrations once this is done
        // if ($request->has('description')) {
        //     $formfields['description'] = $request['description'];
        // }

        if ($request->hasFile('uploads')) {
            $formFields['uploads'] = $request->file('uploads')->store('uploads', 'public');
        }

        $certificate->update($formFields);

        return back()->with('success', 'Certificate updated successfully');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect('/')->with('message', 'listing deleted successfully');
    }
}
