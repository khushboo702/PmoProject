<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Yajra\DataTables\DataTables;
use File;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::orderBy('created_at', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('action', function ($data) {
                    $builder['data'] = $data;
                    return view('layout.employee_action', $builder);
                })
                ->editColumn('status', function ($data) {
                    return $data->status == 'active' ? "Active" : "Inactive";
                })
                ->editColumn('address', function ($data) {
                    return strlen(strip_tags($data->address)) > 40 ? substr(strip_tags($data->address), 0, 40) . '...' : strip_tags($data->address);
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('employee.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        if ($request->hasFile('emp_image')) {
            $image = 'emp-' . time() . '-' . rand(0, 99) . '.' . $request->emp_image->extension();
            $request->emp_image->move(public_path('upload/emp_image/'), $image);
            $employee['image'] = $image;
        } else {
            $employee['image'] = null;
        }
        $employee['name'] = $request->emp_name;
        $employee['address'] = $request->address;
        $employee['dob'] = $request->dob;
        $employee['skill'] = $request->skill;
        Employee::create($employee);
        return redirect('employee')->with('success', 'Employee Record Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empData = Employee::where('id', ($id))->first();
        return view('employee/edit', compact('empData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasFile('emp_image')) {
            $img = 'emp_image-' . time() . '-' . rand(0, 99) . '.' . $request->emp_image->extension();
            $request->emp_image->move(public_path('upload/emp_image/'), $img);
            $oldpic = Employee::find($id)->pluck('image')[0];
            File::delete(public_path($oldpic));
            Employee::where('id', $id)->update(['image' => $img]);
        } 
        $employee = array();
        $employee['name'] = $request->emp_name;
        $employee['address'] = $request->address;
        $employee['dob'] = $request->dob;
        $employee['skill'] = $request->skill;
        Employee::where('id', $id)->update($employee);

        return redirect('employee')->with('success', 'Employee Record Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empData = Employee::where(['id' => ($id)])->whereNull('deleted_at')->first();
        $empData->delete();
        return redirect()->back()->with('success', 'Employee Record Deleted Successfully.');
    }

    public function status($id)
    {

        $employee = Employee::where(['id' => ($id)])->whereNull('deleted_at')->first();

        if ($employee) {
            // Toggle the status
            $employee->status = ($employee->status === 'active') ? 'inactive' : 'active';

            $employee->save();

            return redirect()->route('employee.index')->with('success', 'Status updated successfully.');
        }
        return redirect()->back()->with('error', 'Status  not updated.');

    }
}