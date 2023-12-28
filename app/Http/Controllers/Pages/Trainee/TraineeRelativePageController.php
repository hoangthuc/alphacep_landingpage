<?php

namespace App\Http\Controllers\Pages\Trainee;

use App\Http\Controllers\Controller;
use App\Models\MTrainee;
use Illuminate\Http\Request;
use App\Models\MTraineeRelative;
use Illuminate\Support\Facades\Auth;

class TraineeRelativePageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.trainee_relative.index');
    }

    public function create($trainee_id)
    {
        $trainee = MTrainee::findOrFail($trainee_id);
        return view('pages.trainee_relative.create', compact('trainee'));
    }


    public function store(Request $request, $trainee_id)
    {
        $trainee = MTrainee::findOrFail($trainee_id);
        $request->validate(
            [
                'name' => 'required|max:255',
                'relationship' => 'required|max:255',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );
        $request['trainee_id'] =  $trainee->trainee_id;
        MTraineeRelative::create($request->except('_token'));

        return redirect()->route('view.trainee.edit', $trainee_id)
            ->with('success', 'TraineeRelative created successfully!');
    }

    public function edit($id)
    {
        $model = MTraineeRelative::findOrFail($id);
        return view('pages.trainee_relative.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $trainee_relative = MTraineeRelative::findOrFail($id);
        $request->validate(
            [
                'name' => 'required|max:255',
                'relationship' => 'required|max:255',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $trainee_relative->update($request->except('customer_id'));

        return redirect()->route('view.trainee.edit', $trainee_relative->trainee_id)
            ->with('success', 'TraineeRelative updated successfully!');
    }

    public function destroy($id)
    {
        $post = MTraineeRelative::findOrFail($id);
        $post->delete();

        return redirect()->route('view.trainee.index')
            ->with('success', 'Trainee Relative deleted successfully!');
    }
}
