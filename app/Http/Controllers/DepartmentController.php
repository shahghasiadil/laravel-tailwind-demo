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
        $action_icons = [
            "icon:pencil | click:redirect('departments/{id}/edit')",
            "icon:trash | color:red | click:deleteDep({id}, '{title}')"
        ];

        return view('departments.index', [
            'departments' => Department::latest()->select('id','title')->paginate(10),
            'captions'=>['title'=>__('messages.title')],
            'action_icons' => $action_icons
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

        $categoryIds = array_map('intval', explode(',', $attributes['categories']));

        $department->categories()->attach($categoryIds);


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

        if($department->delete()){
            return response()->json([200]);
        }

        return response()->json([404]);
    }
}
