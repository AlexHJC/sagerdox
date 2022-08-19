<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Certificate;
use App\Models\Company;
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
            'alert' => $alert,
            'certificates' => Certificate::all()
        ]);
    }

    public function manage()
    {
        return view('alerts.manage', [
            'alerts' => auth()->user()->alerts()->get()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->certificate_id);
        $formFields = $request->validate([
            'title' => 'required',
            'period_id' => ['required', 'numeric'],
            // 'certificate_id' => 'required'
        ]);

        if ($request->certificate_id) {
            $formFields['certificate_id'] = implode(',', $request->certificate_id);
        }

        if ($request->has('description')) {
            $formFields['description'] = $request['description'];
        }

        $formFields['user_id'] = auth()->id();

        Alert::create($formFields);

        return redirect('/')->with('message', 'Alert created successfully');
    }

    public function edit(Alert $alert)
    {
        return view('alerts.edit', [
            'alert' => $alert,
            'certificates' => Certificate::all()
        ]);
    }

    // update certificate data
    public function update(Request $request, Alert $alert)
    {

        // make sure logged in user is owner

        if ($alert->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'period_id' => ['required', 'numeric'],
            // 'certificate_id' => 'required'
        ]);

        if ($request->certificate_id) {
            $formFields['certificate_id'] = implode(',', $request->certificate_id);
        }

        if ($request->has('description')) {
            $formFields['description'] = $request['description'];
        }

        $alert->update($formFields);

        return back()->with('message', 'Alert updated successfully');
    }

    public function destroy(Alert $alert)
    {

        // make sure logged in user is owner

        if ($alert->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $alert->delete();
        return redirect('/')->with('message', 'Alert deleted successfully');
    }

    public function getAlerts(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $alerts = Alert::orderby('title', 'asc')->select('id', 'title')->get();
        } else {
            $alerts = Alert::orderby('title', 'asc')->select('id', 'title')->where('title', 'like', '%' . $search . '%')->limit(5)->get();
        }
        $response = array();
        foreach ($alerts as $alert) {
            $response[] = array(
                "id" => $alert->id,
                "text" => $alert->title
            );
        }
        return response()->json($response);
    }
}
