@extends('admin.layout.app')

@section('heading','Edit Slide')

@section('right_top_button')
    <a href="{{route('adminFeature.view')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View Features </a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('adminFeature.update',$feature->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Icon</label><br>
                                        <i class="{{$feature->icon}} fz_40"></i>
                                        <input type="text" class="form-control" value="{{$feature->icon}}" name="icon" placeholder="Enter FontAwesome 4 icon code">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Heading</label>
                                        <input type="text" class="form-control" name="heading" value="{{$feature->heading}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" name="description" value="{{$feature->description}}">
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
