<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::with('restaurant')->get();
        return view('admin.table.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $restaurants = Restaurant::get();
        return view('admin.table.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //storae a new table with validated data from request according to model
        $validatedData = $request->validate([
            'table_number' => 'required|unique:tables|max:255',
            'restaurant_id' => 'required'
        ]);
        $table = Table::create($validatedData);

        //return to tables.index
        return redirect()->route('tables.index')->with('message', 'Table Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //show tablle with id
        $table = Table::find($id);

        //return view with table
        return view('admin.table.update', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $table = Table::find($id);
        $restaurants = Restaurant::get();
        return view('admin.table.update', compact('table', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update table with validated data from request according to model
        $validatedData = $request->validate([
            'table_number' => 'required|max:255',
            'restaurant_id' => 'required'
        ]);
        Table::whereId($id)->update($validatedData);

        //return to tables.index
        return redirect()->route('tables.index')->with('message', 'Table Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //table delete with id
        $table = Table::findOrFail($id);
        $table->delete();

        //return to tables.index
        return redirect()->route('tables.index')->with('message', 'Table Deleted Successfully');
    }
}
