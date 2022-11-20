@extends('admin.layout.app')

@section('heading','Add Testimonial')

@section('right_top_button')
    <a href="{{route('testimonials.index')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View Testimonials </a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('testimonials.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Photo</label><br>
                                        <input type="file" name="photo">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Career</label>
                                        <input type="text" class="form-control" name="career" value="{{old('career')}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Comment</label>
                                        <input type="text" class="form-control" name="comment" value="{{old('comment')}}">
                                    </div>
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary">submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
