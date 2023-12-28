<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectDocument;
use Illuminate\Http\Request;

class ProjectDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request)
    {
        $query  = ProjectDocument::query();

        if ($s = $request->has("s")) {
            $query->where("trainee_number", "LIKE", "%" . $s . "%");
            $query->where("entry_date", "LIKE", "%" . $s . "%");
        }

        if ($request->project_trainee_id) {
            $query->where('project_trainee_id', $request->project_trainee_id);
        }


        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list successful.', $datas);
    }
}
