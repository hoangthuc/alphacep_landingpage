<?php

namespace App\Http\Controllers\Pages\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectTrainee;
use App\Models\ProjectDocument;
use App\Models\ProjectDocumentAttribute;
use Illuminate\Support\Facades\DB;

class ProjectDocumentPageController extends Controller
{
    public function create($project_trainee_id)
    {
        $project_trainee = ProjectTrainee::findOrFail($project_trainee_id);
        return view('pages.project_document.create', compact(
            'project_trainee',
        ));
    }

    public function store(Request $request, $project_trainee_id)
    {
        DB::beginTransaction();
        try {

            ProjectTrainee::findOrFail($project_trainee_id);
            $request['project_trainee_id'] = $project_trainee_id;
            $request->validate(
                [
                    'document_name' => 'required|max:254',
                    'attr.*.name' => 'max:254',
                    'attr.*.value' => 'max:254',
                ],
                trans('validation.messages'),
                trans('validation.attributes'),
            );
            $doc = ProjectDocument::create([
                'project_trainee_id' => $project_trainee_id,
                'document_name' => $request->document_name,
                'document_type' => $request->document_type,
                'target_doc' => $request->target_doc,
            ]);

            if ($request->attr && is_array($request->attr)) {
                foreach ($request->attr as $attr) {
                    if ($attr['attribute_name'] && $attr['attribute_value']) {
                        ProjectDocumentAttribute::create([
                            'project_document_id' => $doc->project_document_id,
                            'seq_no' => $doc->project_document_id,
                            'attribute_name' => $attr['attribute_name'],
                            'attribute_value' => $attr['attribute_value'],
                        ]);
                    }
                }
            }
            DB::commit();
            return redirect()->route('view.project_trainee.edit', $project_trainee_id)
                ->with('success', trans('messages.project.created_success'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {
        $model = ProjectDocument::findOrFail($id);
        return view('pages.project_document.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $model = ProjectDocument::findOrFail($id);

        DB::beginTransaction();
        try {

            $request->validate(
                [
                    'document_name' => 'required|max:254',
                    'attr.*.name' => 'max:254',
                    'attr.*.value' => 'max:254',
                ],
                trans('validation.messages'),
                trans('validation.attributes'),
            );
            $model->update([
                'document_name' => $request->document_name,
                'document_type' => $request->document_type,
                'target_doc' => $request->target_doc,
            ]);
            $model->update($request->input());
            $model->document_attributes()->delete();
            if ($request->attr && is_array($request->attr)) {
                foreach ($request->attr as $attr) {
                    if ($attr['attribute_name'] && $attr['attribute_value']) {
                        ProjectDocumentAttribute::create([
                            'project_document_id' =>  $model->project_document_id,
                            'seq_no' =>  $model->project_document_id,
                            'attribute_name' => $attr['attribute_name'],
                            'attribute_value' => $attr['attribute_value'],
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('view.project_trainee.edit', $model->project_trainee_id)
                ->with('success', trans('messages.project.updated_success'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        $post = ProjectDocument::findOrFail($id);
        $post->delete();

        return redirect()->route('view.project.index')
            ->with('success', trans('messages.project.deleted_success'));
    }
}
