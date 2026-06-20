<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{

// function to save category in database 

public function storeCategory(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable'
    ]);

    Category::create([
        'name' => $request->name,
        'description' => $request->description
    ]);

    return redirect()->back()->with('success', 'Category Added Successfully');
}

    //display all categories on categories page
    public function categories()
{
    $categories = Category::all();
    return view('Admin.categories', compact('categories'));
}


//function to delete category

public function deleteCategory($id)
{
    Category::findOrFail($id)->delete();
    return back()->with('success', 'Category deleted successfully');
}

// function to open the edit category page with previous values

public function editCategory($id)
{
    $category = Category::findOrFail($id);

    return view('Admin.editcategories', compact('category'));
}

//function to update category

public function updateCategory(Request $request, $id)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable'
    ]);

    $category = Category::findOrFail($id);

    $category->update([
        'name' => $request->name,
        'description' => $request->description
    ]);

    return redirect('/admin/categories')
           ->with('success', 'Category Updated Successfully');
}

}
