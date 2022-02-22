<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends BaseController
{
    public function index()
    {
        $this->setPagetitle('Categories', 'List of all categories');

        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        $this->setPagetitle('Categories', 'Create Category');

        return view('admin.categories.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(CategoryStoreRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('category');
        }

        Category::create($validated + [
            'featured' => $request->filled('featured'),
            'menu' => $request->filled('menu')
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Created Successfully.');
    }

    public function edit(Category $category)
    {
        $this->setPagetitle('Categories', 'Edit Category');

        return view('admin.categories.edit', [
            'category' => $category,
            'categories' => Category::all()
        ]);
    }

    public function update(CategoryStoreRequest $request, Category $category)
    {
        $validated = $request->validated();

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('category');
        }

        $category->update($validated + [
            'featured' => $request->filled('featured'),
            'menu' => $request->filled('menu')
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Updated Successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Deleted Successfully.');
    }
}