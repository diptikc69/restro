<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create a new menu
        return view('admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //store new menu
        $menu = Menu::create($request->all());
        return redirect()->back()->with('message', 'Menu Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //    show a menu
        $menu = Menu::find($id);
        return view('admin.menus.update', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //edit a menu
        $menu = Menu::find($id);
        return view('admin.menus.update', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update a menu
        $menu = Menu::find($id);
        $menu->update($request->all());
        return redirect()->back()->with('message', 'Menu Updated Successfully');
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
