<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Category::create([
            'title' => ucfirst($request->title),
        ]);

        return redirect()->route('category.index')->with('success', 'Yayyy! Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|max;255',
        ]);

        $category->update([
            'title' => ucfirst($request->title),
        ]);

        return redirect()->route('category.index')->with('success', 'yayyy Category updated!!!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'noooo u delete this????');
    }
}
