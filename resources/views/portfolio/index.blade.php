
@extends('layout.master')

@section('main')

<div class="container m-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Portfolio
                        <a href="{{route('portfolio.create')}}" class="btn btn-primary float-end">Add New Portfolio</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>link</th>
                                <th>Category</th>
                                <th>Tecnologe</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td><img style="width: 120px; height:60px;" src="{{ Storage::url($item->image) }}" alt=""></td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->link }}</td>
                                <td>{{ $item->category }}</td>
                                <td>
                                    @foreach ($item->tecnology as $key=>$img)
                                    <img style="width: 30px; display:inline-block;" src="{{Storage::url($img->t_img ?? "") }}" alt="">
                                    @endforeach
                                    
                                    <a class="btn btn-success btn-sm float-end" href="{{ route('tecnology.create', ["id" => $item->id]) }}">✙ Add</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('portfolio.edit', $item->id) }}">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="" onclick="if(confirm('Delete the Portfolio Sure ?')) 
                                    {event.preventDefault(); document.getElementById('delete-{{ $item->id }}').submit(); }">Delete</a>
                                    <form action="{{ route('portfolio.destroy', $item->id) }}" method="POST" id="delete-{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12" style=" width:95%;">
           {{ $records->links() }} 
        </div>
    </div>
</div>
@endsection