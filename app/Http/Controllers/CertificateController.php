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
            'certificates' => Certificate::latest()->filter(request(['expiry_date', 'search']))->paginate(3)
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
        return view('certificates.create', [
            'certificates' => Certificate::latest()
        ]);
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

        $formFields['user_id'] = auth()->id();

        Certificate::create($formFields);

        return redirect('/')->with('message', 'Certificate created successfully');
    }

    // update certificate data
    public function update(Request $request, Certificate $certificate)
    {

        // make sure logged in user is owner

        if ($certificate->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

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

        return back()->with('message', 'Certificate updated successfully');
    }

    // delete certificate
    public function destroy(Certificate $certificate)
    {

        // make sure logged in user is owner

        if ($certificate->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $certificate->delete();
        return redirect('/')->with('message', 'listing deleted successfully');
    }

    public function manage()
    {
        return view('certificates.manage', ['certificates' => auth()->user()->certificates()->get()]);
    }
}
