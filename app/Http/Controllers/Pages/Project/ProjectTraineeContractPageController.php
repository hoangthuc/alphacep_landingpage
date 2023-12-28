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
use App\Models\ProjectTraineeContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectTraineeContractPageController extends Controller
{
    public function create($project_trainee_id)
    {
        $project_trainee = ProjectTrainee::findOrFail($project_trainee_id);
        $training_facility = MTrainingFacility::all();
        return view('pages.project_trainee_contract.create', compact(
            'project_trainee',
            'training_facility',
        ));
    }


    public function store(Request $request, $project_trainee_id)
    {
        ProjectTrainee::findOrFail($project_trainee_id);
        $request['project_trainee_id'] = $project_trainee_id;
        $request->validate(
            [
                'project_trainee_id' => 'unique:project_trainee_contract',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['customer_id'] = Auth::user()->customer_id;
        $request['created_by_id'] = Auth::id();
        $request['updated_by_id'] = Auth::id();
        ProjectTraineeContract::create($request->except('_token'));

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project.created_success'));
    }

    public function edit($id)
    {
        $project_trainee_contract = ProjectTraineeContract::findOrFail($id);
        $training_facility = MTrainingFacility::all();
        $sending_agency = MSendingAgency::all();
        return view('pages.project_trainee_contract.edit', compact('project_trainee_contract', 'training_facility', 'sending_agency'));
    }

    public function update(Request $request, $id)
    {
        $project = ProjectTraineeContract::findOrFail($id);
        $request['project_trainee_id'] = $project->project_trainee_id;
        $request->validate(
            [
                'project_trainee_id' => 'unique:project_trainee_contract,project_trainee_id,' .  $id . ',contract_id',
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
        $post = ProjectTraineeContract::findOrFail($id);
        $post->delete();

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project.deleted_success'));
    }
}
