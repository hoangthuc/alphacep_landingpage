<?php

namespace App\Http\Controllers\Pages\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MWork;
use App\Models\ProjectWork;
use App\Models\ProjectWorkTaskFile;
use Illuminate\Support\Facades\Storage;

class ProjectWorkTaskFilePageController extends Controller
{
    public function create($project_work_id)
    {
        $project_work = ProjectWork::findOrFail($project_work_id);
        return view('pages.project_work_task_file.create', compact(
            'project_work',
        ));
    }


    public function store(Request $request, $project_work_id)
    {
        ProjectWork::findOrFail($project_work_id);
        $request->validate(
            [
                'seq_no' => 'numeric',
                'file' => 'required|mimes:pdf,doc,docx|max:4096',

            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $file = $request->file('file');
        $fileName = uniqid() . '.' . $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $seqNo = $request->input('seq_no');

        Storage::disk('local')->put('public/uploads/' . $fileName, file_get_contents($file));


        $record =  ProjectWorkTaskFile::create([
            'file_name' => $fileName,
            'file_size' => $fileSize,
            'seq_no' => $seqNo,
            'project_work_id' => $project_work_id,
        ]);

        return redirect()->route('view.project_work.edit', $project_work_id)
            ->with('success', trans('messages.project_work_task_file.created_success'));
    }

    public function edit($id)
    {
        $model = ProjectWorkTaskFile::findOrFail($id);
        $work = MWork::get();
        return view('pages.project_work_task_file.edit', compact('model', 'work'));
    }

    public function update(Request $request, $id)
    {
        $project = ProjectWorkTaskFile::findOrFail($id);

        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $project->update($request->input());

        return redirect()->route('view.project_work.edit', $project->project_work_id)
            ->with('success', trans('messages.project_work_task_file.updated_success'));
    }

    public function destroy($id)
    {
        $model = ProjectWorkTaskFile::findOrFail($id);
        $project_work_id = $model->project_work_id;
        $model->delete();

        return redirect()->route('view.project_work.edit', $project_work_id)
            ->with('success', trans('messages.project_work_task_file.deleted_success'));
    }
}
