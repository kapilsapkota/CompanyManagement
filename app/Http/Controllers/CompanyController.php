<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::latest()->paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $validatedData = $request->validated();

        if($request->hasFile('logo_upload')){
            $id = Company::max('id') + 1;
            $filename = 'company_' . $id. '.'.$request['logo_upload']->getClientOriginalExtension();
            Storage::put('public/'.$filename, File::get($request['logo_upload']));
            $validatedData['logo'] = $filename;
        }

        $company = Company::create($validatedData);

            return redirect()->route('companies.index')
                ->with($company?'success':'error',
                    $company? 'Company '. $company->name. ' created successfully!': 'Something went wrong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, string $id)
    {
        $company = Company::find($id);
        $validatedData = $request->validated();

        if($request->hasFile('logo_upload')){
            $filename = 'company_' . $id. '.'.$request['logo_upload']->getClientOriginalExtension();
            Storage::put('public/'.$filename, File::get($request['logo_upload']));
            $validatedData['logo'] = $filename;

            //delete old photo
            if(file_exists(Storage::get('public/'.$company->logo))){
                @unlink(storage_path('public/'.$company->logo));
            }
        }

        $company->update($validatedData);

        return redirect()->route('companies.index')
            ->with($company?'success':'error',
                $company? 'Company '. $company->name. ' updated successfully!': 'Something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        //delete old photo
        if(Storage::exists('public/'.$company->logo)){
            @Storage::delete('public/'.$company->logo);
        }

        $company->delete();

        return redirect()->route('companies.index')
            ->with($company?'success':'error',
                $company? 'Company '. $company->name. ' deleted successfully!': 'Something went wrong!');
    }
}
