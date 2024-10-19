@extends('layout')
@section('content')
<div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h4>Add Brand</h4>
                        <form method="POST" action="{{ route('brand.update', $brand->id) }}" class="row mb-4" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-2 col-md-2 col-12 mt-3">
                                <label for="name" class="form-label">Name*</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-12 mt-3">
                                <input type="text" id="name" name="name" value="{{$brand->name}}" class="form-control" placeholder="Enter Brand Name" required>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mt-3">
                                <label for="title" class="form-label">Title*</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-12 mt-3">
                                <input type="text" id="title" name="title" value="{{$brand->title}}" class="form-control" placeholder="Enter Brand Title" required>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mt-3">
                                <label for="image" class="form-label">Image*</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-12 mt-3">
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mt-3">
                                <label for="url" class="form-label">Website Url</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-12 mt-3">
                                <input type="text" id="url" name="website_url" value="{{ $brand->brand_url }}" class="form-control" placeholder="Enter Brand Web site Url" required>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mt-3">
                                <label for="status" class="form-label">Status</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-12 mt-3">
                                <select name="status" class="form-control" id="status">
                                    <option value="1" {{$brand->status == '1' ? 'selected' : ''}}>Active</option>
                                    <option value="2" {{ $brand->status == '2' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            
                            <div class="col-lg-2 col-md-2 col-12 mt-3">
                                <label for="description" class="form-label">Description</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-12 mt-3">
                                <textarea name="description" id="description" placeholder="Enter Brand Description " class="form-control" rows="5">{{$brand->description}}</textarea>
                            </div>
                            
                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection