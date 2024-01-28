<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $action_icons = [
            "icon:pencil | click:redirect('categories/{id}/edit')",
            "icon:trash | color:red | click:deleteCategory({id}, '{title}')"
        ];
        return view('categories.index', [
            'categories' => Category::latest()->paginate(10),
            'captions'=>['title'=>__('messages.title')],
            'action_icons' => $action_icons
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $attributes = $request->validated();

        $category = Category::create($attributes);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $attributes = $request->validated();

        $category->update($attributes);


        return redirect()->route('categories.index')->with('success', 'Category edited successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
