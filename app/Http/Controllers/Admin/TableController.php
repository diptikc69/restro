<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //storae a new table with validated data from request according to model
        $validatedData = $request->validate([
            'table_number' => 'required|unique:tables|max:255',
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
        return view('admin.tables.update', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $table = Table::find($id);
        return view('admin.tables.update', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update table with validated data from request according to model
        $validatedData = $request->validate([
            'table_number' => 'required|unique:tables|max:255',
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
