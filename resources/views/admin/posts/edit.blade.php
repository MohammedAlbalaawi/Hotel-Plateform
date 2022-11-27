@extends('admin.layout.app')

@section('heading','Edit Post')

@section('right_top_button')
    <a href="{{route('posts.index')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View Posts</a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('posts.update',$model->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Photo</label><br>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url( $model->photo )}}"
                                             alt="slid" class="w_100 h_100"><br><br>
                                        <input type="file" name="photo">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="heading" value="{{$model->heading}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Short Description</label>
                                        <input type="text" class="form-control" name="short_content" value="{{$model->short_content}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Content</label>
                                        <textarea name="content" style="height: 100px;"  class="form-control snote">{{$model->long_content}}</textarea>
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
