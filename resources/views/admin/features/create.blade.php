@extends('admin.layout.app')

@section('heading','Add Slide')

@section('right_top_button')
    <a href="{{route('adminFeature.view')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View Features </a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('adminFeature.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Icon</label><br>
                                        <input type="text" class="form-control" name="icon" placeholder="Enter FontAwesome 4 icon code">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Heading</label>
                                        <input type="text" class="form-control" name="heading" value="{{old('heading')}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" name="description" value="{{old('description')}}">
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
