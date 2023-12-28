<?php

namespace App\Http\Controllers\Pages\Work;

use App\Http\Controllers\Controller;
use App\Models\MCompany;
use App\Models\MSendingAgency;
use Illuminate\Http\Request;
use App\Models\MWork;
use App\Models\MWorkflow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WorkPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.work.index');
    }

    public function create()
    {
        $workflow = MWorkflow::all();
        return view('pages.work.create', compact('workflow'));
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'name'=>'required|max:254',
                'workflow_id'=>'required',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['customer_id'] = Auth::user()->customer_id;
        $request['created_by_id'] = Auth::id();

        MWork::create($request->except('_token'));

        return redirect()->route('view.work.index')
            ->with('success', trans('messages.work.created_success'));
    }

    public function edit($id)
    {
        $workflow = MWorkflow::all();
        $work = MWork::findOrFail($id);
        return view('pages.work.edit', compact('work', 'workflow'));
    }

    public function update(Request $request, $id)
    {
        $work = MWork::findOrFail($id);
        $request->validate(
            [
                'name'=>'required|max:254',
                'workflow_id'=>'required',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['updated_by_id'] = Auth::id();
        $work->update($request->input());

        return redirect()->route('view.work.index')
            ->with('success', trans('messages.work.updated_success'));
    }

    public function destroy($id)
    {
        $post = MWork::findOrFail($id);
        $post->delete();

        return redirect()->route('view.work.index')
            ->with('success', trans('messages.work.deleted_success'));
    }
}
