@extends('layout.master')

@section('main')
    
<div class="p-2 m-5">
    
    <div class="">
        <div class="bg-success p-2 bg-opacity-25">
            <div class="text-end">
                <a class="m-1 btn btn-primary" href="{{route('portfolio.index')}}">Back</a>
            </div>
            
            <div class="bg-light p-3">
                @if(Session::has('success'))
                    
                    <h6 class="alert alert-success">{{ Session::get('success') }} </h6>
                @endif
                <form action="{{route('portfolio.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="">Portfolio Name</label>
                    <input name="name" class="form-control" type="text">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="" class="form-label">Upload Portfolio Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Image Alternative text</label>
                            <input name="img_alt_text" class="form-control" type="text">
                            @error('img_alt_text')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <br>
                    <label for="">link</label>
                    <input type="text" class="form-control" name="link">
                    @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <br>
                    <label for="cat">Choose a Category:</label>
                        <select id="cat" name="category">
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
                    <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
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