@extends('layout.master')

@section('main')
<div class="p-2 m-5">
    
    <div class="">
        <div class="bg-success p-2 bg-opacity-25">
            
            <div class="">
                <h3 class="mt-2 mb-2">Update {{ $record->name }} Informatoin</h3>
                <a class="m-1 btn btn-primary float-end" href="{{route('portfolio.index')}}">Back</a>
            </div>
            
            <div class="bg-light p-3">
                @if(Session::has('success'))
                    {{ Session::get('success') }} 
                @endif
                <form action="{{ route('portfolio.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <label for="">Portfolio Name</label>
                    <input name="name" class="form-control" value="{{ old('name', $record->name) }}" type="text">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            {{-- <img src="{{ $record->img_alt_text }}" alt=""> --}}
                            
                            <label for="" class="form-label">Upload Portfolio Image</label>
                            <input type="file" name="image" class="form-control"> <br>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <img style="width: 200px; height:80px;" src="{{Storage::url($record->image) }}" alt="">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Image Alternative text</label>
                            <input name="img_alt_text" class="form-control" type="text" value="{{ old('img_alt_text', $record->img_alt_text) }}">
                            @error('img_alt_text')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <br>
                    <label for="">link</label>
                    <input type="text" class="form-control" value="{{ old('link', $record->link) }}" name="link">
                    @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <br>
                    <label for="cat">Choose a Category:</label>
                        <select id="cat" name="category" value="{{ old('img_alt_text', $record->category) }}">
                            <option selected="true" disabled="disabled">----Choose a Category----</option>
                            <option value="
                            Web Applications">
                                Web Applications</option>
                            <option value="Android Apps">
                                Android Apps</option>
                            <option value="UI/UX & Product Design">
                                UI/UX & Product Design</option>
                            
                        </select>
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <br>
                    <label for="">Description</label><br>
                    <textarea class="form-control" name="description" value="{{ old('description', $record->description) }}" id="" cols="30" rows="10"></textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection