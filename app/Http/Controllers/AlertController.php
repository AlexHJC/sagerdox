<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    // show create form
    public function create()
    {
        return view('alerts.create');
    }

    // show single listing
    public function show(Alert $alert)
    {
        return view('alerts.show', [
            'alert' => $alert
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'period_id' => ['required', 'numeric']
        ]);

        // TODO figure out how to have optional certificate id

        $formFields['user_id'] = auth()->id();

        Alert::create($formFields);

        return redirect('/')->with('message', 'Alert created successfully');
    }
}
