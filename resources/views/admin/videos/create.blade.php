@extends('admin.layout.app')

@section('heading','Add Video')

@section('right_top_button')
    <a href="{{route('videos.index')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View Videos </a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('videos.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Video id</label><br>
                                        <input type="text" class="form-control" name="video_id" value="{{old('video_id')}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">caption</label>
                                        <input type="text" class="form-control" name="caption" value="{{old('caption')}}">
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
