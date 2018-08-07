<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
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
     * Return all employees
     */
    public function showAllEmployees(){
        $employees = Employee::all();
        
        return json_encode($employees);
    }

    public function getEmployeeById($id){
        $employee = Employee::find($id);

        return json_encode($employee);
    }

    public function getEmployeeByJob($job){
        $employees = Employee::where('job', $job)->get();

        return json_encode($employees);
    }

    public function createEmployee(Request $request){
        $employee = new Employee();

        $employee->employee_name = $request->get('employee_name');
        $employee->job = $request->get('job');
        $employee->save();
        
        return response()->json(['Employee Created!'], 200);
    }

    public function deleteEmployee($id){
        $employee = Employee::find($id);
        $employee->delete();

        return response()->json(['Employee Deleted!'], 200);
    }

    public function updateEmployee(Request $request, $id) {
        $employee = Employee::find($id);

        $employee->employee_name = $request->get('employee_name');
        $employee->job = $request->get('job');
        $employee->save();
    
        return response()->json(['Employee Updated!'], 200);
    }
}