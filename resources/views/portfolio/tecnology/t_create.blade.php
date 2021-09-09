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
                <form action="{{ route('tecnology.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{ request()->input('id') }}" name="portfolio_id">
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="" class="form-label">Upload Tecnology Image</label>
                            <input type="file" name="t_img" class="form-control mb-3">
                            @error('t_img')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="">Image Alternative text</label>
                            <input name="img_1_text" class="form-control mb-1" type="text">
                            @error('img_1_text')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection