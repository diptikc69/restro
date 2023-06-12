<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:restaurants|max:255',
            'description' => 'required',
        ]);

        if (!$validatedData) {
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }
        $input = $request->all();

        if ($request->file('image')) {
            $image = Storage::disk('public')->put('/images', $request->image);
            $input['image'] = $image;
        }
        //store a new restaurant with validated data from request according to model
        $restaurant = Restaurant::create($input);
        //return to restaurants.index
        return redirect()->route('restaurants.index')->with('message', 'Restaurant Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $restaurant = Restaurant::find($id);

        //return view with restaurant
        return view('admin.restaurants.update', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $restaurant = Restaurant::find($id);

        //return view with restaurant
        return view('admin.restaurant.update', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update a restaurant with validation
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        if (!$validatedData) {
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }
        $input = $request->all();
        if ($request->file('image')) {
            $image = Storage::disk('public')->put('/images', $request->image);
            $input['image'] = $image;
        }

        Restaurant::whereId($id)->update($input);

        //return to restaurants.index
        return redirect()->route('restaurants.index')->with('message', 'Restaurant Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        //return to restaurants.index
        return redirect()->route('restaurants.index')->with('message', 'Restaurant Deleted Successfully');
    }
}
