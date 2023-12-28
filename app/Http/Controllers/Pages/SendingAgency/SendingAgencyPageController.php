<?php

namespace App\Http\Controllers\Pages\SendingAgency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MSendingAgency;

use Illuminate\Support\Facades\Auth;

class SendingAgencyPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.sending_agency.index');
    }

    public function create()
    {
        return view('pages.sending_agency.create');
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'representative_name' => 'required|max:255',
                'representative_name_kana' => 'required|max:255',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['customer_id'] = Auth::user()->customer_id;
        $request['created_by_id'] = Auth::id();
        $request['updated_by_id'] = Auth::id();

        MSendingAgency::create($request->except('_token'));

        return redirect()->route('view.sending_agency.index')
            ->with('success', 'Sending Agency created successfully!');
    }

    public function edit($id)
    {
        $sending_agency = MSendingAgency::findOrFail($id);
        return view('pages.sending_agency.edit', compact('sending_agency'));
    }

    public function update(Request $request, $id)
    {
        $sending_agency = MSendingAgency::findOrFail($id);

        $request->validate(
            [
                'representative_name' => 'required|max:255',
                'representative_name_kana' => 'required|max:255',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );
        $request['updated_by_id'] = Auth::id();
        $sending_agency->update($request->except('customer_id'));

        return redirect()->route('view.sending_agency.index')
            ->with('success', 'Sending Agency updated successfully!');
    }

    public function destroy($id)
    {
        $post = MSendingAgency::findOrFail($id);
        $post->delete();

        return redirect()->route('view.sending_agency.index')
            ->with('success', 'Sending Agency deleted successfully!');
    }
}
