<?php

namespace App\Http\Controllers\Pages\Work;

use App\Http\Controllers\Controller;
use App\Models\MCompany;
use App\Models\MSendingAgency;
use Illuminate\Http\Request;
use App\Models\MWorkFlow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WorkFlowPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.workflow.index');
    }

    public function create()
    {

        return view('pages.workflow.create');
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'name'=>'required',
                'flowgroup_id'=>'required',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['customer_id'] = Auth::user()->customer_id;
        $request['created_by_id'] = Auth::id();

        MWorkFlow::create($request->except('_token'));

        return redirect()->route('view.workflow.index')
            ->with('success', trans('messages.workflow.created_success'));
    }

    public function edit($id)
    {
        $workflow = MWorkFlow::findOrFail($id);
        return view('pages.workflow.edit', compact('workflow'));
    }

    public function update(Request $request, $id)
    {
        $workflow = MWorkFlow::findOrFail($id);
        $request->validate(
            [
                'name'=>'required',
                'flowgroup_id'=>'required',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['updated_by_id'] = Auth::id();

        $workflow->update($request->input());

        return redirect()->route('view.workflow.index')
            ->with('success', trans('messages.workflow.updated_success'));
    }

    public function destroy($id)
    {
        $post = MWorkFlow::findOrFail($id);
        $post->delete();

        return redirect()->route('view.workflow.index')
            ->with('success', trans('messages.workflow.deleted_success'));
    }
}
