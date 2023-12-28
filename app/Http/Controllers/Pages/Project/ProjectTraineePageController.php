<?php

namespace App\Http\Controllers\Pages\Project;

use App\Http\Controllers\Controller;
use App\Models\MCompany;
use App\Models\MSendingAgency;
use App\Models\MTrainee;
use App\Models\MTrainingFacility;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectTrainee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectTraineePageController extends Controller
{
    public function create($project_id)
    {
        $project = Project::findOrFail($project_id);
        $this_project_trainee_ids = ProjectTrainee::get()->pluck('trainee_id');
        $trainee = MTrainee::whereNotIn('trainee_id', $this_project_trainee_ids)->get();
        $training_facility = MTrainingFacility::all();
        $sending_agency = MSendingAgency::all();
        return view('pages.project_trainee.create', compact(
            'project',
            'trainee',
            'training_facility',
            'sending_agency',
        ));
    }


    public function store(Request $request, $project_id)
    {
        Project::findOrFail($project_id);
        $request->validate(
            [
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['project_id'] = $project_id;
        ProjectTrainee::create($request->except('_token'));

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project.created_success'));
    }

    public function edit($id)
    {
        $project_trainee = ProjectTrainee::findOrFail($id);
        $training_facility = MTrainingFacility::all();
        $sending_agency = MSendingAgency::all();
        return view('pages.project_trainee.edit', compact('project_trainee', 'training_facility', 'sending_agency'));
    }

    public function update(Request $request, $id)
    {
        $project = ProjectTrainee::findOrFail($id);

        $request->validate(
            [
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $project->update($request->input());

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project.updated_success'));
    }

    public function destroy($id)
    {
        $post = ProjectTrainee::findOrFail($id);
        $post->delete();

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project.deleted_success'));
    }
}
