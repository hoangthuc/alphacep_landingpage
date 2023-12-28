<?php

namespace App\Http\Controllers\API\Document;

use App\Http\Controllers\Controller;
use App\Models\DocumentTemplate;
use Illuminate\Http\Request;

class DocumentTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request)
    {
        $query  = DocumentTemplate::query();

        if ($s = $request->has("s")) {
        }

        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list successful.', $datas);
    }
}
