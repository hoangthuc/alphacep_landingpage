<?php

namespace App\Http\Controllers\Pages\Nationality;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MNationality;
use App\Models\MNationalityOffice;
use App\Models\MNationalityStaff;
use Illuminate\Support\Facades\Auth;

class NationalityPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.nationality.index');
    }

    public function create()
    {
        return view('pages.nationality.create');
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|max:255',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['created_by_id'] = Auth::id();
        $request['updated_by_id'] = Auth::id();

        MNationality::create($request->except('_token'));

        return redirect()->route('view.nationality.index')
            ->with('success', 'Nationality created successfully!');
    }

    public function edit($id)
    {
        $nationality = MNationality::findOrFail($id);
        return view('pages.nationality.edit', compact('nationality'));
    }

    public function update(Request $request, $id)
    {
        $nationality = MNationality::findOrFail($id);
        $request->validate(
            [
                'name' => 'required|max:255',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );
        $request['updated_by_id'] = Auth::id();
        $nationality->update($request->input());

        return redirect()->route('view.nationality.index')
            ->with('success', 'Nationality updated successfully!');
    }

    public function destroy($id)
    {
        $post = MNationality::findOrFail($id);
        $post->delete();

        return redirect()->route('view.nationality.index')
            ->with('success', 'Nationality deleted successfully!');
    }
}
