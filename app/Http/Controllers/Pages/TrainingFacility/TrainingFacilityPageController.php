<?php

namespace App\Http\Controllers\Pages\TrainingFacility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MTrainingFacility;
use Illuminate\Support\Facades\Auth;

class TrainingFacilityPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.training_facility.index');
    }

    public function create()
    {
        return view('pages.training_facility.create');
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|max:254',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['customer_id'] = Auth::user()->customer_id;
        $request['created_by_id'] = Auth::id();
        $request['updated_by_id'] = Auth::id();

        MTrainingFacility::create($request->except('_token'));

        return redirect()->route('view.training_facility.index')
            ->with('success', 'Training Facility created successfully!');
    }

    public function edit($id)
    {
        $training_facility = MTrainingFacility::findOrFail($id);
        return view('pages.training_facility.edit', compact('training_facility'));
    }

    public function update(Request $request, $id)
    {
        $training_facility = MTrainingFacility::findOrFail($id);

        $request->validate(
            [
                'name' => 'required|max:254',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );
        $request['updated_by_id'] = Auth::id();
        $training_facility->update($request->except('customer_id'));

        return redirect()->route('view.training_facility.index')
            ->with('success', 'Training Facility updated successfully!');
    }

    public function destroy($id)
    {
        $post = MTrainingFacility::findOrFail($id);
        $post->delete();

        return redirect()->route('view.training_facility.index')
            ->with('success', 'Training Facility deleted successfully!');
    }
}
