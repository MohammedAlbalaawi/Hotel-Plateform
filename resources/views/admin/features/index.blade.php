@extends('admin.layout.app')

@section('heading','View Features')

@section('right_top_button')
<a href="{{route('adminFeature.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new </a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>Feature</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                    @forelse($features as $feature)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <i class="{{$feature->icon}} fz_40"></i>
                                        <td>
                                            {{ $feature->heading}}
                                        </td>
                                        <td class="">
                                            <a href="{{ route('adminFeature.edit',$feature->id) }}" class="btn btn-warning w-25">Edit</a>
                                            <a href="{{ route('adminFeature.delete',$feature->id) }}" class="btn btn-danger w-25"
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
