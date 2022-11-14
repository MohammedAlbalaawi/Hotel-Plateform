@extends('admin.layout.app')

@section('heading','Add Slide')

@section('right_top_button')
    <a href="{{route('adminSlider.view')}}" class="btn btn-primary"><i class="fas fa-eye"></i> View slides </a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('adminSlider.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Photo</label><br>
                                        <input type="file" name="photo">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Heading</label>
                                        <input type="text" class="form-control" name="heading" value="{{old('heading')}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Test</label>
                                        <input type="text" class="form-control" name="text" value="{{old('text')}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Button Test</label>
                                        <input type="text" class="form-control" name="button_text" value="{{old('button_text')}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Button URL</label>
                                        <input type="text" class="form-control" name="button_url" value="{{old('button_url')}}">
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
