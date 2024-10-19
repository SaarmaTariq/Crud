<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return view('category.index',compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }


   public function save(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'status' => 'required',
            'description' => 'nullable'
        ]);
        $image = $request->image;

        $imageName = $request->id .'_'. time(). '.'.$image->getClientOriginalExtension();
        $imageName = str_replace('', '-', $imageName);
        $image->move(public_path('uploads/category'), $imageName);
        $url = asset("uploads/category/{$imageName}");
        
        $category = new Category;
        $category->name = $request->name;
        $category->image = $url;
        $category->status = $request->status;
        $category->description = $request->description;
        $category->save();


        return redirect()->route('category');
        
    }

    public function edit(Request $request,$id){
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'name' => 'required',
            // 'image' => 'required',
            'status' => 'required',
            'description' => 'nullable'
        ]);
        $category = Category::find($id);

        if($request->hasFile('image')){
            if (file_exists(public_path($category->image))){
                    unlink(public_path($category->image));
            }
            $image = $request->image;

            $imageName = $request->id .'_'. time(). '.'.$image->getClientOriginalExtension();
            $imageName = str_replace('', '-', $imageName);
            $image->move(public_path('uploads/category'), $imageName);
            $url = asset("uploads/category/{$imageName}");
            $category->image = $url;
        }
        
       
        $category->name = $request->name;
        $category->image = $url;
        $category->status = $request->status;
        $category->description = $request->description;
        $category->save();


        return redirect()->route('category');
        
    }
    public function delete($id)
    {
        $category = Category::find($id);
        if (file_exists(public_path($category->image))){
                unlink(public_path($category->image));
        }
        $category->delete();
        return redirect()->route('category');
    }
}
