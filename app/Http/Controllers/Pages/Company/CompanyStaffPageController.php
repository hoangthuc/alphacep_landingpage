<?php

namespace App\Http\Controllers\Pages\Company;

use App\Http\Controllers\Controller;
use App\Models\MCompany;
use App\Models\MCompanyOffice;
use App\Models\MCompanystaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanystaffPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.company_staff.index');
    }

    public function create($company_office_id)
    {   
        
        $company_office = MCompanyOffice::findOrFail($company_office_id);
        return view('pages.company_staff.create', compact('company_office'));
    }

    public function store(Request $request ,$company_office_id)
    {
        $company_office = MCompanyOffice::findOrFail($company_office_id);

        $request->validate(
            [
                'name' => 'required|max:255',
                'name_kana' => 'required|max:255',
                'tel' => 'required|regex:/^\d{10}$/',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['company_office_id'] = $company_office->company_office_id;
        $request['company_id'] = $company_office->company_id;
        $request['created_by_id'] = Auth::id();
        $request['updated_by_id'] = Auth::id();

        MCompanystaff::create($request->except('_token'));

        return redirect()->route('view.company_office.edit',['id'=>$company_office->company_office_id])
            ->with('success', 'CompanyOffice created successfully!');
    }

    public function edit($id)
    {
        $company_staff = MCompanystaff::findOrFail($id);

        return view('pages.company_staff.edit', compact(['company_staff']));
    }

    public function update(Request $request, $id)
    {
        $company_staff = MCompanystaff::findOrFail($id);

        $request->validate(
            [
                'name' => 'required|max:255',
                'name_kana' => 'required|max:255',
                'tel' => 'required|regex:/^\d{10}$/',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $company_staff->update($request->except(['company_office_id','company_id','_token']));

        return redirect()->route('view.company_office.edit',['id'=>$company_staff->company_office_id])
            ->with('success', 'Companystaff updated successfully!');
    }

    public function destroy($id)
    {
        $staff = MCompanystaff::findOrFail($id);
        $company_office_id = $staff->company_office_id;
        $staff->delete();

        return redirect()->route('view.company_office.edit',['id'=>$company_office_id])
            ->with('success', 'Staff deleted successfully!');
    }
}
