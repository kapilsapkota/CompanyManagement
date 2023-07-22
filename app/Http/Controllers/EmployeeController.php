<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('company:id,name')->latest()->paginate(10);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::select('name', 'id')->orderBy('name')->get();

        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());

            return redirect()->route('employees.index')
                ->with($employee?'success':'error',
                    $employee? 'Employee '. $employee->name. ' created successfully!': 'Something went wrong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        $this->resourceExist($employee);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        $this->resourceExist($employee);

        $companies = Company::select('name', 'id')->orderBy('name')->get();

        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $employee = Employee::find($id);
        $this->resourceExist($employee);

        $employee->update($request->validated());

        return redirect()->route('employees.index')
            ->with($employee?'success':'error',
                $employee? 'Employee '. $employee->name. ' updated successfully!': 'Something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $this->resourceExist($employee);
        $employee->delete();

        return redirect()->route('employees.index')
            ->with($employee?'success':'error',
                $employee? 'Employee '. $employee->name. ' deleted successfully!': 'Something went wrong!');
    }
}
