<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all menus
        $menus = Menu::all();

        // Return view with menus
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $restaurants = Restaurant::all();
        return view('admin.menu.create', compact('categories', 'restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:menus|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'restaurant_id' => 'required',
            'image' => 'required'
        ]);

        if (!$validatedData) {
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }

        $input = $request->all();
        if ($request->file('image')) {
            $image = Storage::disk('public')->put('/images', $request->image);
            $input['image'] = $image;
        }
        $menu = Menu::create($input);
        return redirect()->route('menus.index')->with('message', 'Menu Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //    show a menu
        $menu = Menu::find($id);
        return view('admin.menu.update', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //edit a menu
        $menu = Menu::find($id);
        $categories = Category::all();
        $restaurants = Restaurant::all();
        return view('admin.menu.update', compact('menu', 'categories', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update a menu
        $menu = Menu::find($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'restaurant_id' => 'required',
        ]);

        if (!$validatedData) {
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }

        $input = $request->all();
        if ($request->file('image')) {
            $image = Storage::disk('public')->put('/images', $request->image);
            $input['image'] = $image;
        }
        $menu->update($input);
        return redirect()->route('menus.index')->with('message', 'Menu Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete a menu
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->back()->with('message', 'Menu Deleted Successfully');
    }
}
