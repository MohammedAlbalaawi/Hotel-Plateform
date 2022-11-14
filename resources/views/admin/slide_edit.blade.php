@extends('admin.layout.app')

@section('heading','Edit Slide')

@section('right_top_button')
    <a href="{{route('adminSlider.view')}}" class="btn btn-primary"><i class="fas fa-eye"></i> View slides </a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('adminSlider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Photo</label><br>

                                        <div class="d-flex justify-content-between">
                                        <input class="my-auto" type="file" name="photo">
                                        <img src="{{\Illuminate\Support\Facades\Storage::url( $slider->photo )}}"
                                                 alt="slid" class="w_200 ">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Heading</label>
                                        <input type="text" class="form-control" name="heading" value="{{$slider->heading}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Text</label>
                                        <input type="text" class="form-control" name="text" value="{{ $slider->text}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Button Test</label>
                                        <input type="text" class="form-control" name="button_text" value="{{ $slider->button_text}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Button URL</label>
                                        <input type="text" class="form-control" name="button_url" value="{{ $slider->button_url}}">
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
