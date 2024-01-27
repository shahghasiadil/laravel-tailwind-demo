<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('departments.index', [
            'departments' => Department::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('departments.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(StoreDepartmentRequest $request)
    {
        $attributes = $request->validated();

        $department = Department::create(Arr::except($attributes, 'categories'));

        $department->categories()->attach($attributes['categories']);

        return redirect()->route('departments.index')->with('success', 'Department created successfully');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', [
            'department' => $department,
        ]);
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $attributes = $request->validated();

        $department->update($attributes);

        return redirect()->route('departments.index')->with('success', 'Department edited successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully');
    }
}
