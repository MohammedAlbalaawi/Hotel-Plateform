@extends('admin.layout.app')

@section('heading','Edit Video')

@section('right_top_button')
    <a href="{{route('videos.index')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View Videos</a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('videos.update',$model->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <label class="form-label">Video id</label><br>
                                                <input type="text" class="form-control" name="video_id" value="{{$model->video_id}}">
                                            </div>
                                            <iframe width="200"
                                                    height="105"
                                                    src="https://www.youtube.com/embed/{{$model->video_id}}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Text</label>
                                        <input type="text" class="form-control" name="caption"
                                               value="{{ $model->caption}}">
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
