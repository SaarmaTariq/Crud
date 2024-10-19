@extends('layout')
@section('content')
<div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h4>Add Category</h4>

                        <form method="POST" action="{{ route('category.save')}}" class="row mb-4"  enctype="multipart/form-data"> 
                            @csrf
                            <div class="col-lg-2 col-md-2 col-12 mt-3">
                                <label for="name" class="form-label">Name*</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-12 mt-3">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Category Name" required>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mt-3">
                                <label for="image" class="form-label">Image*</label>
                            </div>
                            
                            <div class="col-lg-10 col-md-10 col-12 mt-3">
                                <input type="file" id="image" name="image" class="form-control" required>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mt-3">
                                <label for="status" class="form-label">Status</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-12 mt-3">
                                <select name="status" class="form-control" id="status">
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mt-3">
                                <label for="description" class="form-label">Description</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-12 mt-3">
                                <textarea name="description" id="description" placeholder="Enter Category Description " class="form-control" rows="5"></textarea>
                            </div>
                            
                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    @endsection