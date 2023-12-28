<?php

namespace App\Http\Controllers\Pages\Work;

use App\Http\Controllers\Controller;
use App\Models\MCompany;
use App\Models\MSendingAgency;
use Illuminate\Http\Request;
use App\Models\MWorkingHour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WorkingHourPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.working_hour.index');
    }

    public function create()
    {
        return view('pages.working_hour.create');
    }


    public function store(Request $request)
    {

        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        MWorkingHour::create($request->except('_token'));

        return redirect()->route('view.working_hour.index')
            ->with('success', trans('messages.working_hour.created_success'));
    }

    public function edit($id)
    {
        $model = MWorkingHour::findOrFail($id);
        return view('pages.working_hour.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $model = MWorkingHour::findOrFail($id);
        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['updated_by_id'] = Auth::id();
        $model->update($request->input());

        return redirect()->route('view.working_hour.index')
            ->with('success', trans('messages.working_hour.updated_success'));
    }

    public function destroy($id)
    {
        $post = MWorkingHour::findOrFail($id);
        $post->delete();

        return redirect()->route('view.working_hour.index')
            ->with('success', trans('messages.working_hour.deleted_success'));
    }
}
