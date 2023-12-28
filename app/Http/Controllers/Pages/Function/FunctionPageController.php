<?php

namespace App\Http\Controllers\Pages\Function;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SFunction;
use App\Models\SFunctionCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FunctionPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.function.index');
    }

    public function create()
    {
        $categories = SFunctionCategory::all();
        return view('pages.function.create', compact('categories'));
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'function_name' => 'required|string|max:255|unique:s_function',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $slug = Str::slug($request->function_name, '-');
        $request['url'] = $slug;

        SFunction::create($request->except('_token'));

        return redirect()->route('view.function.index')
            ->with('success', trans('messages.function.created_success'));
    }

    public function edit($id)
    {
        $categories = SFunctionCategory::all();
        $function = SFunction::findOrFail($id);
        return view('pages.function.edit', compact('function', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $function = SFunction::findOrFail($id);
        $request->validate(
            [
                'function_name' => 'required|string|max:255|unique:s_function,function_name,' . $id . ',function_id',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $slug = Str::slug($request->function_name, '-');
        $request['url'] = $slug;
        $function->update($request->input());

        return redirect()->route('view.function.index')
            ->with('success', trans('messages.function.updated_success'));
    }

    public function destroy($id)
    {
        $post = SFunction::findOrFail($id);
        $post->delete();

        return redirect()->route('view.function.index')
            ->with('success', trans('messages.function.deleted_success'));
    }
}
