<?php

namespace App\Http\Controllers\Pages\Project;

use App\Http\Controllers\Controller;
use App\Models\MCompany;
use App\Models\MSendingAgency;
use App\Models\MWork;
use App\Models\MTrainingFacility;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectWork;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectWorkPageController extends Controller
{
    public function create($project_id)
    {
        $project = Project::findOrFail($project_id);
        $work = MWork::get();
        return view('pages.project_work.create', compact(
            'project',
            'work',
        ));
    }


    public function store(Request $request, $project_id)
    {
        Project::findOrFail($project_id);
        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['project_id'] = $project_id;
        ProjectWork::create($request->except('_token'));

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project.created_success'));
    }

    public function edit($id)
    {
        $model = ProjectWork::findOrFail($id);
        $work = MWork::get();
        return view('pages.project_work.edit', compact('model', 'work'));
    }

    public function update(Request $request, $id)
    {
        $project = ProjectWork::findOrFail($id);

        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $project->update($request->input());

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project.updated_success'));
    }

    public function destroy($id)
    {
        $post = ProjectWork::findOrFail($id);
        $post->delete();

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project.deleted_success'));
    }
}
