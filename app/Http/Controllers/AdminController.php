<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $data=new category;

        $data->category_name=$request->category;

        $data->save();

        return redirect()->back()->with('message','Category Added Successfully');
    }
    public function delete_category($id)
    {

        $data=category::find($id);

        $data->delete();

        return redirect()->back()->with('message','Category Deleted Successfully');

    }
    public function update_category($id)
{
    $data = Category::find($id);
    $categories = Category::all();

    return view('admin.update_category', ['data' => $data, 'categories' => $categories]);
}
}