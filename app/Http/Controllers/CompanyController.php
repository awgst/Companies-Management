<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'website'=>'required|url',
            'logo'=>'required|max:2048|image|mimes:png|dimensions:min_width=100,min_height=100'
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
        $employees = $company->employees()->paginate(5);
        return view('company.show', ['company'=>$company, 'employees'=>$employees]);
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
        return view('company.edit', compact('company'));
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
        $request->validate([
            'name'=>'required',
            'email'=>['required', Rule::unique('companies')->ignore($company->id), 'email:rfc,dns'],
            'website'=>'required|url',
            'logo'=>'max:2048|image|mimes:png|dimensions:min_width=100,min_height=100'
        ]);

        $data = collect($request->except(['_token', '_method']));
        if($request->file('logo')){
            Storage::delete(str_replace('storage/app/', '', $company->logo));
            $fileName = date("Ymd").time().$request->file('logo')->getClientOriginalName();
            $pathFile = $request->file('logo')->storeAs('company', $fileName);
            $logo = 'storage/app/'.$pathFile;
            $data['logo'] = $logo;
        }
        Company::find($company->id)->update($data->all());
        return redirect('/company')->with('status', 'updated');
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
        // Delete logo saved on storage
        Storage::delete(str_replace('storage/app/', '', $company->logo));
        $delete = Company::find($company->id);
        // Delete all employees from company
        $delete->employees()->delete();
        $delete->delete();
        return redirect('/company')->with('status', 'deleted');
    }
}
