<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
    ]);

    \App\Models\Category::create([
        'name' => $request->name
    ]);

    return redirect()->route('admin.category.index')
        ->with('success', 'Kategori berhasil ditambahkan!');
}

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return back();
    }
}
