<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectDocumentAttribute;
use Illuminate\Http\Request;

class ProjectDocumentAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request)
    {
        $query  = ProjectDocumentAttribute::query();

        if ($s = $request->has("s")) {
        }

        if ($request->project_document_id) {
            $query->where('project_document_id', $request->project_document_id);
        }

        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list successful.', $datas);
    }
}
