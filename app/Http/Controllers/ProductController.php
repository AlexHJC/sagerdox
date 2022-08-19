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

    // show manage page
    public function manage()
    {
        return view('products.manage', [
            'products' => auth()->user()->products()->get()
        ]);
    }

    // show single listing
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'certificates' => Certificate::all(),
            'companies' => Company::all()
        ]);
    }

    // store product data
    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            // 'company_id' => 'required',
            'product_code' => 'required',
            // 'certificate_id' => 'required',
        ]);

        if ($request->company_id) {
            $formFields['company_id'] = implode(',', $request->company_id);
        }

        if ($request->certificate_id) {
            $formFields['certificate_id'] = implode(',', $request->certificate_id);
        }

        if ($request->has('description')) {
            $formFields['description'] = $request['description'];
        }

        $formFields['user_id'] = auth()->id();

        Product::create($formFields);

        return redirect('/')->with('message', 'Product created successfully');
    }

    // update certificate data
    public function update(Request $request, Product $product)
    {
        // dd($request);

        // make sure logged in user is owner

        if ($product->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            // 'company_id' => 'required',
            'product_code' => 'required',
            // 'certificate_id' => 'required',
        ]);

        if ($request->company_id) {
            $formFields['company_id'] = implode(',', $request->company_id);
        }

        if ($request->certificate_id) {
            $formFields['certificate_id'] = implode(',', $request->certificate_id);
        }

        if ($request->has('description')) {
            $formFields['description'] = $request['description'];
        }

        $product->update($formFields);

        return back()->with('message', 'Product updated successfully');
    }

    // delete product
    public function destroy(Product $product)
    {

        // make sure logged in user is owner

        if ($product->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $product->delete();
        return back()->with('message', 'Product deleted successfully');
    }

    public function getProducts(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $products = Product::orderby('title', 'asc')->select('id', 'title')->get();
        } else {
            $products = Product::orderby('title', 'asc')->select('id', 'title')->where('title', 'like', '%' . $search . '%')->limit(5)->get();
        }
        $response = array();
        foreach ($products as $product) {
            $response[] = array(
                "id" => $product->id,
                "text" => $product->title
            );
        }
        return response()->json($response);
    }
}
