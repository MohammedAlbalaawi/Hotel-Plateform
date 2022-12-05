@extends('admin.layout.app')

@section('heading','Add Page')

@section('right_top_button')
    <a href="{{route('pages.index')}}" class="btn btn-primary"><i class="fa fa-eye"></i>View Pages</a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('pages.update', $model->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="name" value="{{$model->name}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Content</label>
                                        <textarea name="content" style="height: 100px;"  class="form-control snote">{{$model->content}}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <div class="mb-4">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1" @if($model->status == 1) selected @endif>Show</option>
                                                <option value="0" @if($model->status == 0) selected @endif>Hide</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
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
