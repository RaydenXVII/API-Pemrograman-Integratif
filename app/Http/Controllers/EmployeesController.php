<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Employees as EmployeesResource;
use App\Http\Controllers\BaseController as BaseController;

class EmployeesController extends BaseController
{
    public function index()
    {
        $employees = Employees::all();
        return $this->sendResponse(EmployeesResource::collection($employees), 'Post Fetched');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'employeeNumber' => 'required',
            'lastName' => 'required',
            'firstName' => 'required',
            'extension' => 'required',
            'email' => 'required',
            'officeCode' => 'required',
            'reportsTo' => 'required',
            'jobTitle' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        DB::table('employees')->insert($input);

        $employees = DB::table('employees')->where('employeeNumber', $input['employeeNumber'])->first();

        return $this->sendResponse(new EmployeesResource($employees), 'Post Created.');
    }

    public function show($employeeNumber)
    {
        $employee = DB::table('employees')->where('employeeNumber', $employeeNumber)->first();
        if (is_null($employee)) {
            return $this->sendError('Post does not exits.');
        }
        return $this->sendResponse(new EmployeesResource($employee), 'Post fetched.');
    }

    public function update(Request $request, $employeeNumber)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'employeeNumber' => 'required',
            'lastName' => 'required',
            'firstName' => 'required',
            'extension' => 'required',
            'email' => 'required',
            'officeCode' => 'required',
            'reportsTo' => 'required',
            'jobTitle' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $existingEmployees = DB::table('employees')
            ->where('employeeNumber', $employeeNumber)
            ->first();

        if (is_null($existingEmployees)) {
            return $this->sendError('Employee does not exist.');
        }

        DB::table('employees')
            ->where('employeeNumber', $employeeNumber)
            ->update($input);

        $updatedEmployees = DB::table('employees')
            ->where('employeeNumber', $input['employeeNumber'])
            ->first();

        return $this->sendResponse(new EmployeesResource($updatedEmployees), 'Employee updated.');
    }

    public function destroy($employeeNumber)
    {
        $existingEmployees = DB::table('employees')
            ->where('employeeNumber', $employeeNumber)
            ->first();

        if (is_null($existingEmployees)) {
            return $this->sendError('Employee does not exist.');
        }

        DB::table('employees')
            ->where('employeeNumber', $employeeNumber)
            ->delete();

        return $this->sendResponse([], 'Employee deleted.');
    }
}
