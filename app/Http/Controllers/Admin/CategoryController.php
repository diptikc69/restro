<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        if (!$validatedData) {
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }
        $input = $request->all();
        if ($request->file('image')) {
            $image = Storage::disk('public')->put('/images', $request->image);
            $input['image'] = $image;
        }
        $category =  Category::create($input);
        return redirect()->route('categories.index')->with('message', 'Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.update', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        if (!$validatedData) {
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }
        $input = $request->all();
        if ($request->file('image')) {
            $image = Storage::disk('public')->put('/images', $request->image);
            $input['image'] = $image;
        }
        $category = Category::find($id);
        $category->update($input);
        return redirect()->route('categories.index')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
}
