<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::get();
        return view('brand.index',compact('brands'));
    }
    public function create()
    {
        return view('brand.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'image' => 'required',
            'website_url' => 'required',
            'status' => 'required',
            'description' => 'nullable'
        ]);

        $image = $request->image;

        $imageName = $request->id .'_'. time(). '.'.$image->getClientOriginalExtension();
        $imageName = str_replace('', '-', $imageName);
        $image->move(public_path('uploads/brand'), $imageName);
        $url = asset("uploads/brand/{$imageName}");

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->image = $url;
        $brand->title = $request->title;
        $brand->brand_url = $request->website_url;
        $brand->status = $request->status;
        $brand->description = $request->description;

        $brand->save();

        return redirect()->route('brands');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brand.edit', compact('brand'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'website_url' => 'required',
            'status' => 'required',
            'description' => 'nullable'
        ]);
        $brand = Brand::find($id);

        if($request->hasFile('image')){
            if (file_exists(public_path($brand->image))){
                    unlink(public_path($brand->image));
            }
            $image = $request->image;

            $imageName = $request->id .'_'. time(). '.'.$image->getClientOriginalExtension();
            $imageName = str_replace('', '-', $imageName);
            $image->move(public_path('uploads/brand'), $imageName);
            $url = asset("uploads/brand/{$imageName}");
            $brand->image = $url;
        }
       

        
        $brand->name = $request->name;
       
        $brand->title = $request->title;
        $brand->brand_url = $request->website_url;
        $brand->status = $request->status;
        $brand->description = $request->description;

        $brand->save();

        return redirect()->route('brands');
    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        if (file_exists(public_path($brand->image))){
                unlink(public_path($brand->image));
        }
        $brand->delete();
        return redirect()->route('brands');
    }
  
}
