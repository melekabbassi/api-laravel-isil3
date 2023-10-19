<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //get all employees
    public function getEmployee() {
        return response()->json(Employee::all(), 200);
    }

    //get specific employee
    public function getEmployeeById($id) {
        $employee = Employee::find($id);
        if (is_null($employee)) {
            return response()->json(['message' => 'Employee not found'], 404);
        }
        return response()->json($employee::find($id), 200);
    }

    //add employee
    public function addEmployee(Request $request) {
        $employee = Employee::create($request->all());
        return response($employee, 201);
    }

    //update employee
    public function updateEmployee(Request $request, $id) {
        $employee = Employee::find($id);
        if(is_null($employee)) {
            return response()->json(['message' => 'Employee not found'], 404);
        }
        $employee->update($request->all());
        return response($employee, 200);
    }

    //delete employee
    public function deleteEmployee(Request $request, $id) {
        $employee = Employee::find($id);
        if(is_null($employee)) {
            return response()->json(['message' => 'Employee not found'], 404);
        }
        $employee->delete();
        return response()->json(null, 204);
    }
}
