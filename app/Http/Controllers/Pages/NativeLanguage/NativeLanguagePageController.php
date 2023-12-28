<?php

namespace App\Http\Controllers\Pages\NativeLanguage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MNativeLanguage;

use Illuminate\Support\Facades\Auth;

class NativeLanguagePageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.native_language.index');
    }

    public function create()
    {
        return view('pages.native_language.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'native_language' => 'required|max:255',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['created_by_id'] = Auth::id();
        $request['updated_by_id'] = Auth::id();

        MNativeLanguage::create($request->except('_token'));

        return redirect()->route('view.native_language.index')
            ->with('success', 'Native Language created successfully!');
    }

    public function edit($id)
    {
        $native_language = MNativeLanguage::findOrFail($id);
        return view('pages.native_language.edit', compact('native_language'));
    }

    public function update(Request $request, $id)
    {
        $native_language = MNativeLanguage::findOrFail($id);

        $request->validate(
            [
                'native_language' => 'required|max:255',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );
        
        $request['updated_by_id'] = Auth::id();
        $native_language->update($request->input());

        return redirect()->route('view.native_language.index')
            ->with('success', 'Native Language updated successfully!');
    }

    public function destroy($id)
    {
        $post = MNativeLanguage::findOrFail($id);
        $post->delete();

        return redirect()->route('view.native_language.index')
            ->with('success', 'Native Language deleted successfully!');
    }
}
