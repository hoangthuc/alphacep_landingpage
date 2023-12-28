<?php

namespace App\Http\Controllers\Pages\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DocumentTemplate;
use App\Models\DocumentAttribute;
use Illuminate\Support\Facades\DB;

class DocumentTemplatePageController extends Controller
{
    public function index()
    {
        return view('pages.document_template.index');
    }

    public function create()
    {
        return view('pages.document_template.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $request->validate(
                [
                    'name' => 'required|max:254',
                    'attr.*.name' => 'max:254',
                    'attr.*.value' => 'max:254',
                ],
                trans('validation.messages'),
                trans('validation.attributes'),
            );
            $doc = DocumentTemplate::create([
                'name' => $request->name,
                'type' => $request->type,
                'target_doc' => $request->target_doc,
            ]);

            if ($request->attr && is_array($request->attr)) {
                foreach ($request->attr as $attr) {
                    if ($attr['attribute_name'] && $attr['attribute_value']) {
                        DocumentAttribute::create([
                            'document_template_id' => $doc->document_template_id,
                            'seq_no' => $doc->document_template_id,
                            'attribute_name' => $attr['attribute_name'],
                            'attribute_value' => $attr['attribute_value'],
                        ]);
                    }
                }
            }
            DB::commit();
            return redirect()->route('view.document_template.index')
                ->with('success', trans('messages.document_template.created_success'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {  
        $model = DocumentTemplate::findOrFail($id);
        return view('pages.document_template.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $model = DocumentTemplate::findOrFail($id);

        DB::beginTransaction();
        try {

            $request->validate(
                [
                    'name' => 'required|max:254',
                    'attr.*.name' => 'max:254',
                    'attr.*.value' => 'max:254',
                ],
                trans('validation.messages'),
                trans('validation.attributes'),
            );
            $model->update([
                'name' => $request->name,
                'type' => $request->type,
                'target_doc' => $request->target_doc,
            ]);
            $model->update($request->input());
            $model->document_attributes()->delete();
            if ($request->attr && is_array($request->attr)) {
                foreach ($request->attr as $attr) {
                    if ($attr['attribute_name'] && $attr['attribute_value']) {
                        DocumentAttribute::create([
                            'document_template_id' =>  $model->document_template_id,
                            'seq_no' =>  $model->document_template_id,
                            'attribute_name' => $attr['attribute_name'],
                            'attribute_value' => $attr['attribute_value'],
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('view.document_template.index', $model->document_template_id)
                ->with('success', trans('messages.document_template.updated_success'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        $post = DocumentTemplate::findOrFail($id);
        $post->delete();

        return redirect()->route('view.document-template.index')
            ->with('success', trans('messages.document_template.deleted_success'));
    }
}
