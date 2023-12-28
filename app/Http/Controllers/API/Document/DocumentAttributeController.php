<?php

namespace App\Http\Controllers\API\Document;

use App\Http\Controllers\Controller;
use App\Models\DocumentAttribute;
use Illuminate\Http\Request;

class DocumentAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request)
    {
        $query  = DocumentAttribute::query();

        if ($s = $request->has("s")) {
        }

        if ($request->document_template_id) {
            $query->where('document_template_id', $request->document_template_id);
        }

        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list successful.', $datas);
    }
}
