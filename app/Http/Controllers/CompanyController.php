<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return index views of company
        $companies = Company::paginate(5);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'email'=>'required|email:rfc,dns|unique:companies',
            'website'=>'required',
            'logo'=>'required|max:2048|image|mimes:jpeg,jpg,png,svg|dimensions:min_width=100,min_height=100'
        ]);
        $fileName = date("Ymd").time().$request->file('logo')->getClientOriginalName();
        $pathFile = $request->file('logo')->storeAs('company', $fileName);
        $logo = 'storage/app/'.$pathFile;
        $company = new Company($request->all());
        $company->logo = $logo;
        $company->save();
        return redirect('company/create')->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        // Show company with employees
        // Lazy eager load
        $employees = Company::find($company->id)->employees;
        return view('company.show', ['company'=>$company, 'employees'=>$employees->load('company')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        // Delete data from database
        $delete = Company::find($company->id);
        // Delete all employees from company
        $delete->employees()->delete();
        $delete->delete();
        return redirect('/company')->with('status', 'deleted');
    }
}
