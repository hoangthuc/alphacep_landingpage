<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectWorkTask;
use Illuminate\Http\Request;

class ProjectWorkTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request)
    {
        $query  = ProjectWorkTask::query();

        if ($s = $request->has("s")) {
        }
        if ($request->project_work_id) {
            $query->where('project_work_id', $request->project_work_id);
        }
        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list successful.', $datas);
    }
}
