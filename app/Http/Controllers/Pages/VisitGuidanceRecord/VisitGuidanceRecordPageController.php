<?php

namespace App\Http\Controllers\Pages\VisitGuidanceRecord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisitGuidanceRecord;
use App\Models\MCompany;
use App\Models\MCompanyOffice;
use App\Models\MCustomerStaff;
use App\Models\MTrainee;
use Illuminate\Support\Facades\Auth;

class VisitGuidanceRecordPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.visit_guidance_record.index');
    }

    public function create($company_id)
    {
        $company = MCompany::findOrFail($company_id);
        $company_office = MCompanyOffice::all();
        $customer_staff  = MCustomerStaff::all();
        $trainee  = MTrainee::all();
        return view('pages.visit_guidance_record.create', compact('company_office', 'company', 'customer_staff', 'trainee'));
    }

    public function store(Request $request, $company_id)
    {
        $company = MCompany::findOrFail($company_id);
        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $company  = MCompany::find($request->company_office_id);
        $request['company_id'] = $company->company_id;

        VisitGuidanceRecord::create($request->except('_token'));

        return redirect()->route('view.company.edit', $company_id)
            ->with('success', 'Visit Guidance Record created successfully!');
    }

    public function edit($id)
    {
        $model = VisitGuidanceRecord::findOrFail($id);
        $company_office = MCompanyOffice::all();
        $customer_staff  = MCustomerStaff::all();
        $trainee  = MTrainee::all();
        return view('pages.visit_guidance_record.edit', compact('model', 'company_office', 'customer_staff', 'trainee'));
    }

    public function update(Request $request, $id)
    {
        $visit_guidance_record = VisitGuidanceRecord::findOrFail($id);

        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $company_office  = MCompanyOffice::find($request->company_office_id);
        $request['company_id'] = $company_office->company_id;

        $visit_guidance_record->update($request->except('customer_id'));

        return redirect()->route('view.company.edit', $visit_guidance_record->company_id)
            ->with('success', 'Visit Guidance Record updated successfully!');
    }

    public function destroy($id)
    {
        $model = VisitGuidanceRecord::findOrFail($id);
        $company_id =  $model->company_id;
        $model->delete();

        return redirect()->route('view.company.edit', $company_id)
            ->with('success', 'Visit Guidance Record deleted successfully!');
    }
}
