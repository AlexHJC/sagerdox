<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Company;
use App\Models\Product;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CertificateController extends Controller
{
    // show all certificates
    public function index()
    {
        return view('index', [
            'certificates' => Certificate::latest()->filter(request(['expiry_date', 'search']))->paginate(6),
            'alerts' => Alert::all()
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
            'certificate' => $certificate,
            'companies' => Company::all(),
            'products' => Product::all()
        ]);
    }

    // show create form
    public function create()
    {
        return view('certificates.create', [
            'certificates' => Certificate::all()
        ]);
    }

    // store certificate data
    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company_id' => 'required',
            'category' => 'required',
            'product_code' => 'required',
            'expiry_date' => ['required', 'date']
        ]);

        if ($request->product_code) {
            $formFields['product_code'] = implode(',', $request->product_code);
        }

        if ($request->company_id) {
            $formFields['company_id'] = implode(',', $request->company_id);
        }

        if ($request->has('description')) {
            $formFields['description'] = $request['description'];
        }

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
            'company_id' => 'required',
            'category' => 'required',
            'product_code' => 'required',
            'expiry_date' => ['required', 'date']
        ]);

        if ($request->product_code) {
            $formFields['product_code'] = implode(',', $request->product_code);
        }

        if ($request->company_id) {
            $formFields['company_id'] = implode(',', $request->company_id);
        }

        if ($request->has('description')) {
            $formFields['description'] = $request['description'];
        }

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
        return back()->with('message', 'Certificate deleted successfully');
    }

    public function manage()
    {
        return view('certificates.manage', ['certificates' => auth()->user()->certificates()->get()]);
    }

    public function getCertificates(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $certificates = Certificate::orderby('title', 'asc')->select('id', 'title')->get();
        } else {
            $certificates = Certificate::orderby('title', 'asc')->select('id', 'title')->where('title', 'like', '%' . $search . '%')->limit(5)->get();
        }
        $response = array();
        foreach ($certificates as $certificate) {
            $response[] = array(
                "id" => $certificate->id,
                "text" => $certificate->title
            );
        }
        return response()->json($response);
    }
}
