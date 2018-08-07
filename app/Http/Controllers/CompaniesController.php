<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return all companies
     */
    public function showAllCompanies(){
        $companies = Company::all();
        
        return json_encode($companies);
    }

    public function getCompanyById($id){
        // $company = Company::getById($id);
        $company = Company::find($id);

        return json_encode($company);
    }

    public function getCompanyByType($type){
        $companies = Company::where('type', $type)->get();

        return json_encode($companies);
    }

    public function createCompany(Request $request){
        $company = new Company();

        $company->name = $request->get('name');
        $company->type = $request->get('type');
        $company->save();

        return response()->json(['Company Created!'], 200);
    }

    public function deleteCompany($id){
        $company = Company::find($id);
        $company->delete();

        return response()->json(['Company Deleted!'], 200);
    }

    public function updateCompany(Request $request, $id) {
        $company = Company::find($id);
    
        $company->name = $request->get('name');
        $company->type = $request->get('type');
        $company->save();
    
        return response()->json(['Company Updated!'], 200);
    }
}