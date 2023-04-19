<?php

namespace App\Http\Controllers;

use App\Models\Employee;
// use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Http\RedirectResponse;



class EmployeeController extends Controller
{
    public function index() 
    {
        $employee = employee::all()->toArray();
        return response()->json($employee);
    }

    public function store(Request $request)
    {
        $employee = new Employee([
            'first_name' =>   $request->input('first_name'),
            'last_name' =>   $request->input('last_name'),
            'address' =>   $request->input('address'),
            'mobile' =>   $request->input('mobile'),
        ]);
        $employee->save();
        return response()->json('Employee created');
    }

    // public function show($id) 
    // {
    //     $contact = Employee::find($id);
    //     return response()->json( $contact);
    // }

    public function update(Request $request , $id)
    {
        $employee = Employee::find($id);
        $employee->update($request->all());
        return response()->json('Employee updated');
    }

    public function destroy(Request $request , $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json('Employee deleted');
    }
}
