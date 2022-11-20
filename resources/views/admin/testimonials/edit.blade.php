@extends('admin.layout.app')

@section('heading','Edit Testimonial')

@section('right_top_button')
    <a href="{{route('testimonials.index')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View Testimonials </a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('testimonials.update',$model->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Photo</label><br>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url( $model->photo )}}"
                                             alt="slid" class="w_200 "><br><br>
                                        <input type="file" name="photo">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$model->name}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Career</label>
                                        <input type="text" class="form-control" name="career" value="{{$model->career}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Comment</label>
                                        <input type="text" class="form-control" name="comment" value="{{$model->comment}}">
                                    </div>
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary">update</button>
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
