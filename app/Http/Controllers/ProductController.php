<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Models\Certificate;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // show create form
    public function create()
    {
        return view('products.create', [
            'companies' => Company::all(),
            'certificates' => Certificate::all()
        ]);
    }

    // store product data
    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company_id' => ['required', 'numeric'],
            'product_code' => 'required',
            'certificate_id' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Product::create($formFields);

        return redirect('/')->with('message', 'Product created successfully');
    }
}
