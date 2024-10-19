@extends('layout')
@section('content')
<div>
<a href="{{ route('brand.create') }}" type="button" class="btn btn-primary">Add Brand</a>
</div>
<div id="table">
            
            <div class="table-responsive">>
                    <table class="table">
                        <thead>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">status</th>
                            <th scope="col">action</th>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
                                <th scope="row"><img src="{{ $brand->image }}" alt="" width="10%"></th>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->title }}</td>
                                <td>
                                    @if($brand == '1')
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                <a href="{{ route('edit.brand', $brand->id) }}" type="button" class="btn btn-primary">Edit</a>
                               <a href="{{ route('brand.delete', $brand->id) }}"> <button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
@endsection