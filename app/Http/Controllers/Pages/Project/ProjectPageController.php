<?php

namespace App\Http\Controllers\Pages\Project;

use App\Http\Controllers\Controller;
use App\Models\MCompany;
use App\Models\MSendingAgency;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.project.index');
    }

    public function create()
    {
        $company = MCompany::all();
        $sending_agency = MSendingAgency::all();
        return view('pages.project.create', compact('company', 'sending_agency'));
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'trainee_number' => 'required',
                'entry_date' => 'required',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $slug = Str::slug($request->project_name, '-');
        $request['url'] = $slug;

        Project::create($request->except('_token'));

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project.created_success'));
    }

    public function edit($id)
    {
        $company = MCompany::all();
        $sending_agency = MSendingAgency::all();
        $project = Project::findOrFail($id);
        return view('pages.project.edit', compact('project', 'company', 'sending_agency'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate(
            [
                'trainee_number' => 'required',
                'entry_date' => 'required',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $slug = Str::slug($request->project_name, '-');
        $request['url'] = $slug;
        $project->update($request->input());

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project.updated_success'));
    }

    public function destroy($id)
    {
        $post = Project::findOrFail($id);
        $post->delete();

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project.deleted_success'));
    }
}
