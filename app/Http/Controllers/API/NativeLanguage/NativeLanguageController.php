<?php

namespace App\Http\Controllers\API\NativeLanguage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MNativeLanguage;


class NativeLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request)
    {
        $query  = MNativeLanguage::query();

        if ($s = $request->has("s")) {
            $query->where("trainee_number", "LIKE", "%" . $s . "%");
            $query->where("entry_date", "LIKE", "%" . $s . "%");
        }

        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list Installers successful.', $datas);
    }
}
