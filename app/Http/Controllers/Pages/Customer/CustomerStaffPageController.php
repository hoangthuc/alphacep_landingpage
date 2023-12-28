<?php

namespace App\Http\Controllers\Pages\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MCustomerStaff;
use App\Models\MCustomerOffice;
use Illuminate\Support\Facades\Auth;

class CustomerStaffPageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.customer_staff.index');
    }

    public function create($customer_office_id)
    {

        $customer_office = MCustomerOffice::findOrFail($customer_office_id);
        return view('pages.customer_staff.create', compact('customer_office'));
    }

    public function store(Request $request, $customer_office_id)
    {
        $customer_office = MCustomerOffice::findOrFail($customer_office_id);

        $request->validate(
            [
                'name' => 'required|max:255',
                'name_kana' => 'required|max:255',
                'tel' => 'required|regex:/^\d{10}$/',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['customer_office_id'] = $customer_office->customer_office_id;
        $request['customer_id'] = $customer_office->customer_id;
        $request['created_by_id'] = Auth::id();
        $request['updated_by_id'] = Auth::id();

        MCustomerStaff::create($request->except('_token'));

        return redirect()->route('view.customer_office.edit', ['id' => $customer_office->customer_office_id])
            ->with('success', 'CustomerOffice created successfully!');
    }

    public function edit($id)
    {
        $customer_staff = MCustomerStaff::findOrFail($id);

        return view('pages.customer_staff.edit', compact(['customer_staff']));
    }

    public function update(Request $request, $id)
    {
        $customer_staff = MCustomerStaff::findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'name_kana' => 'required|max:255',
            'tel' => 'required|regex:/^\d{10}$/',
        ], [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name must not exceed :max characters.',
            'name_kana.required' => 'The name kana field is required.',
            'name_kana.max' => 'The name kana must not exceed :max characters.',
            'tel.required' => 'The telephone field is required.',
            'tel.regex' => 'The telephone field must be a 10-digit number.',
        ]);
        $customer_staff->update($request->except(['customer_office_id', 'customer_id', '_token']));

        return redirect()->route('view.customer_office.edit', ['id' => $customer_staff->customer_office_id])
            ->with('success', 'CustomerStaff updated successfully!');
    }

    public function destroy($id)
    {
        $staff = MCustomerStaff::findOrFail($id);
        $customer_office_id = $staff->customer_office_id;
        $staff->delete();

        return redirect()->route('view.customer_office.edit', ['id' => $customer_office_id])
            ->with('success', 'Staff deleted successfully!');
    }
}
