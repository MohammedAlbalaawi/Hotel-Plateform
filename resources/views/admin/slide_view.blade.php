@extends('admin.layout.app')

@section('heading','View Slides')

@section('right_top_button')
<a href="{{route('admin_slide_create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new </a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>Slider</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                

                                    @forelse($slides as $slide)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{\Illuminate\Support\Facades\Storage::url( $slide->photo )}}"
                                                 alt="slid" class="w_200">
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_slide_edit',$slide->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="" class="btn btn-danger"
                                               onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                        <p class="text-center">No Data</p>
                                    @endforelse
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
