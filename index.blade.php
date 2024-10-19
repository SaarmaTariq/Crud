@extends('layout')
@section('content')
<div>
<a href="{{ route('category.create') }}" type="button" class="btn btn-primary">Add category</a>
</div>
<div id="table">
            
            <div class="table-responsive">>
                    <table class="table">
                        <thead>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">status</th>
                            <th scope="col">action</th>
                        </thead>
                        <tbody>
                            @foreach($category as $item)
                            <tr>
                                <th scope="row"><img src="{{ $item->image }}" alt="" width="10%"></th>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if($category == '1')
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                <a href="{{ route('category.edit', $item->id) }}" type="button" class="btn btn-primary">Edit</a>
                                <form action="{{route('category.destroy', $item->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE') <!-- Use DELETE method for deleting -->
                                <button type="submit" class="btn btn-sm delete delete-btn btn btn-danger">Delete</button>
                            </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
@endsection