<?php

namespace App\Http\Controllers\Pages\AuditReport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuditReport;
use App\Models\MCompany;
use App\Models\MCompanyOffice;
use Illuminate\Support\Facades\Auth;

class AuditReportPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.audit_report.index');
    }

    public function create()
    {
        $company = MCompany::all();
        $company_office = MCompanyOffice::all();
        return view('pages.audit_report.create', compact('company_office', 'company'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $company_office  = MCompanyOffice::find($request->company_office_id);
        $request['company_id'] = $company_office->company_id;

        AuditReport::create($request->except('_token'));

        return redirect()->route('view.audit_report.index')
            ->with('success', 'Audit Report created successfully!');
    }

    public function edit($id)
    {
        $model = AuditReport::findOrFail($id);
        $company = MCompany::all();
        $company_office = MCompanyOffice::all();
        return view('pages.audit_report.edit', compact('model', 'company_office', 'company'));
    }

    public function update(Request $request, $id)
    {
        $audit_report = AuditReport::findOrFail($id);

        $request->validate(
            [],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $company_office  = MCompanyOffice::find($request->company_office_id);
        $request['company_id'] = $company_office->company_id;

        $audit_report->update($request->except('customer_id'));

        return redirect()->route('view.audit_report.index')
            ->with('success', 'Audit Report updated successfully!');
    }

    public function destroy($id)
    {
        $post = AuditReport::findOrFail($id);
        $post->delete();

        return redirect()->route('view.audit_report.index')
            ->with('success', 'Audit Report deleted successfully!');
    }
}
