<?php

namespace App\Http\Controllers\Pages\VisitGuidanceRecord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisitGuidanceRecordDetail;
use App\Models\MCompany;
use App\Models\MCompanyOffice;
use App\Models\VisitGuidanceRecord;
use Illuminate\Support\Facades\Auth;

class VisitGuidanceRecordDetailPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.visit_guidance_record_detail.index');
    }

    public function create($visit_record_id)
    {
        $company = MCompany::all();
        $company_office = MCompanyOffice::all();
        return view('pages.visit_guidance_record_detail.create', compact('company_office', 'company', 'visit_record_id'));
    }

    public function store(Request $request, $visit_record_id)
    {
        VisitGuidanceRecord::findOrFail($visit_record_id);
        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['visit_record_id'] = $visit_record_id;

        VisitGuidanceRecordDetail::create($request->except('_token'));

        return redirect()->route('view.visit_guidance_record.edit', $visit_record_id)
            ->with('success', 'Visit Guidance Record Detail created successfully!');
    }

    public function edit($id)
    {
        $model = VisitGuidanceRecordDetail::findOrFail($id);
        $company = MCompany::all();
        $company_office = MCompanyOffice::all();
        return view('pages.visit_guidance_record_detail.edit', compact('model', 'company_office', 'company'));
    }

    public function update(Request $request, $id)
    {
        $visit_guidance_record_detail = VisitGuidanceRecordDetail::findOrFail($id);

        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $visit_guidance_record_detail->update($request->except('customer_id'));

        return redirect()->route('view.visit_guidance_record.edit', $visit_guidance_record_detail->visit_record_id)
            ->with('success', 'Visit Guidance Record Detail updated successfully!');
    }

    public function destroy($id)
    {

        $model = VisitGuidanceRecordDetail::findOrFail($id);
        $visit_record_id =  $model->visit_record_id;
        $model->delete();

        return redirect()->route('view.visit_guidance_record.edit', $visit_record_id)
            ->with('success', 'Visit Guidance Record Detail deleted successfully!');
    }
}
