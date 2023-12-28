<?php

namespace App\Http\Controllers\Pages\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MCustomer;
use App\Models\MCustomerOffice;
use App\Models\MCustomerStaff;
use Illuminate\Support\Facades\Auth;

class CustomerOfficePageController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.customer_office.index');
    }

    public function create()
    {
        return view('pages.customer_office.create');
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|max:255',
                'name_kana' => 'required|max:255',
                'tel' => 'required|regex:/^\d{10}$/',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $request['created_by_id'] = Auth::id();
        $request['updated_by_id'] = Auth::id();

        MCustomerOffice::create($request->except('_token'));

        return redirect()->route('view.customer_office.index')
            ->with('success', 'CustomerOffice created successfully!');
    }

    public function edit($id)
    {
        $customer_office = MCustomerOffice::findOrFail($id);
        return view('pages.customer_office.edit', compact('customer_office'));
    }

    public function update(Request $request, $id)
    {
        $customer_office = MCustomerOffice::findOrFail($id);
        $request->validate(
            [
                'name' => 'required|max:255',
                'name_kana' => 'required|max:255',
                'tel' => 'required|regex:/^\d{10}$/',
            ],
            trans('validation.messages'),
            trans('validation.attributes'),
        );

        $customer_office->update($request->except(['customer_id', '_token']));

        return redirect()->route('view.customer_office.index', ['id' => $customer_office->customer_id])
            ->with('success', 'CustomerOffice updated successfully!');
    }

    public function destroy($id)
    {
        $office = MCustomerOffice::findOrFail($id);
        $customer_id = $office->customer_id;
        MCustomerStaff::where('customer_office_id', $id)->delete();
        $office->delete();

        return redirect()->route('view.customer_office.index', ['id' => $customer_id])
            ->with('success', 'Office deleted successfully!');
    }
}
