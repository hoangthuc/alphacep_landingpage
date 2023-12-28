<?php

namespace App\Http\Controllers\Pages\FunctionCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SFunctionCategory;

use Illuminate\Support\Facades\Auth;

class FunctionCategoryPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.function_category.index');
    }

    public function create()
    {
        $categories = SFunctionCategory::all();
        return view('pages.function_category.create', compact('categories'));
    }


    public function store(Request $request)
    {


        $request->validate(
            [
                'category_name' => 'required|string|max:255|unique:s_function_category',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        if ($request->parent_category_id) {
            $cat = SFunctionCategory::find($request->parent_category_id);
            if ($cat) {
                $request['category_level'] = $cat->category_level + 1;
            }
        }

        SFunctionCategory::create($request->except('_token'));

        return redirect()->route('view.function_category.index')
            ->with('success', trans('messages.function_category.created_success'));
    }

    public function edit($id)
    {
        $categories = SFunctionCategory::all();
        $function_category = SFunctionCategory::findOrFail($id);
        return view('pages.function_category.edit', compact('function_category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $function_category = SFunctionCategory::findOrFail($id);

        $request->validate(
            [
                'category_name' => 'required|string|max:255|unique:s_function_category,category_name,' . $id . ',category_id',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        if ($request->parent_category_id) {
            $cat = SFunctionCategory::find($request->parent_category_id);
            if ($cat) {
                $request['category_level'] = $cat->category_level + 1;
            }
        } else {
            $request['category_level'] = 0;
        }

        $function_category->update($request->input());

        return redirect()->route('view.function_category.index')
            ->with('success', trans('messages.function_category.updated_success'));
    }

    public function destroy($id)
    {
        $post = SFunctionCategory::findOrFail($id);
        $post->delete();

        return redirect()->route('view.function_category.index')
            ->with('success', trans('messages.function_category.deleted_success'));
    }
}
