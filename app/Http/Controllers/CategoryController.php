<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select('id', 'image', 'name', 'status')
        ->with('products')
        ->paginate(10);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'sometimes|mimes:png,jpg,jpeg',
            'name' => "required|unique:categories,name,$id",
            'status' => 'required|in:Active,Inactive',
        ]);

        $category = Category::find($id);

        $data = $request->all();
        $data['image'] = $this->uploadImage($request) ?? $category->image;
        $category->update($data);

        return redirect()->route('category.index')->with('status', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index')->with('status', 'Category Deleted Successfully');

    }

    private function uploadImage(Request $request){
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = md5(microtime()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('category'), $name);
            return $name;
        }
    }
}
