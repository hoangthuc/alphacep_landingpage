<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectTrainee;
use Illuminate\Http\Request;

class ProjectTraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request) {
        $query  = ProjectTrainee::query();

        if ($s = $request->has("s")) {
            $query->where("trainee_number", "LIKE", "%" . $s . "%");
            $query->where("entry_date", "LIKE", "%" . $s . "%");
        }

        if ($request->project_id) {
            $query->where('project_id', $request->project_id);
        }

        $datas = $query->with('trainee')->paginate($this->numPerPage);

        return $this->hasSuccess('Get list successful.',$datas);
    }
}
