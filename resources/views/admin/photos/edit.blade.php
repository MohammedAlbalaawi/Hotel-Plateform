@extends('admin.layout.app')

@section('heading','Edit Slide')

@section('right_top_button')
    <a href="{{route('photos.index')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View Photos</a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('photos.update',$model->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <label class="form-label">Photo</label><br>
                                                <input class="my-auto" type="file" name="photo">
                                            </div>
                                            <img src="{{\Illuminate\Support\Facades\Storage::url( $model->photo )}}"
                                                 alt="photo" class="w_200 ">
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
