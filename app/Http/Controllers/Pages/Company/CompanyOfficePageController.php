<?php

namespace App\Http\Controllers\Pages\Company;

use App\Http\Controllers\Controller;
use App\Models\MCompany;
use App\Models\MCompanyOffice;
use App\Models\MCompanystaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyOfficePageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.company_office.index');
    }

    public function create($company_id)
    {
        $company =  MCompany::findOrFail($company_id);
        return view('pages.company_office.create', compact('company'));
    }

    public function store(Request $request, $company_id)
    {
        $company =  MCompany::findOrFail($company_id);
      
        $request->validate(
            [
                'name' => 'required|max:255',
                'name_kana' => 'required|max:255',
                'tel' => 'required|regex:/^\d{10}$/',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['company_id'] = $company->company_id;
        $request['created_by_id'] = Auth::id();
        $request['updated_by_id'] = Auth::id();

        MCompanyOffice::create($request->except('_token'));

        return redirect()->route('view.company.edit', ['id' => $company->company_id])
            ->with('success', 'CompanyOffice created successfully!');
    }

    public function edit($id)
    {
        $company_office = MCompanyOffice::findOrFail($id);
        $companies = MCompany::all('company_id', 'name');
        return view('pages.company_office.edit', compact('company_office', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $company_office = MCompanyOffice::findOrFail($id);

        $request->validate(
            [
                'name' => 'required|max:255',
                'name_kana' => 'required|max:255',
                'tel' => 'required|regex:/^\d{10}$/',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );


        $company_office->update($request->except(['company_id', '_token']));

        return redirect()->route('view.company.edit', ['id' => $company_office->company_id])
            ->with('success', 'CompanyOffice updated successfully!');
    }

    public function destroy($id)
    {
        $office = MCompanyOffice::findOrFail($id);
        $company_id = $office->company_id;
        MCompanystaff::where('company_office_id', $id)->delete();
        $office->delete();

        return redirect()->route('view.company.edit',['id'=>$company_id])
            ->with('success', 'Office deleted successfully!');
    }
}
