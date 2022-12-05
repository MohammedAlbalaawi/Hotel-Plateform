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
                        <form action="{{ route('pages.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Content</label>
                                        <textarea name="content" style="height: 100px;"  class="form-control snote">{{old('content')}}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <div class="mb-4">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1"  selected >Show</option>
                                                <option value="0" >Hide</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
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
