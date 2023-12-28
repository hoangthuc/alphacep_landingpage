<?php

namespace App\Http\Controllers\Pages\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\MWork;
use App\Models\ProjectWork;
use App\Models\ProjectWorkTask;
use App\Models\ProjectWorkTaskTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectWorkTaskPageController extends Controller
{
    public function create($project_work_id)
    {
        $project_work = ProjectWork::findOrFail($project_work_id);
        return view('pages.project_work_task.create', compact(
            'project_work',
        ));
    }


    public function store(Request $request, $project_work_id)
    {
        ProjectWork::findOrFail($project_work_id);
        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['project_work_id'] = $project_work_id;
        ProjectWorkTask::create($request->except('_token'));

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project_work_task.created_success'));
    }

    public function edit($id)
    {
        $model = ProjectWorkTask::findOrFail($id);
        $work = MWork::get();
        return view('pages.project_work_task.edit', compact('model', 'work'));
    }

    public function update(Request $request, $id)
    {
        $project = ProjectWorkTask::findOrFail($id);

        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $project->update($request->input());

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project_work_task.updated_success'));
    }

    public function destroy($id)
    {
        $post = ProjectWorkTask::findOrFail($id);
        $post->delete();

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project_work_task.deleted_success'));
    }
}
