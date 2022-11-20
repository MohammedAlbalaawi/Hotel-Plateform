@extends('admin.layout.app')

@section('heading','View Testimonials')

@section('right_top_button')
<a href="{{route('testimonials.create')}}" class="btn btn-primary" id="example1"><i class="fa fa-plus"></i> Add new </a>
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
                                    <th>Testimonial</th>
                                    <th>Photo</th>
                                    <th>comment</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                    @forelse($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{\Illuminate\Support\Facades\Storage::url( $testimonial->photo )}}"
                                                 alt="slid" class="w_200">
                                        </td>
                                        <td>{{ $testimonial->comment }}</td>
                                        <td class="">
                                            <a href="{{ route('adminSlider.edit',$testimonial->id) }}" class="btn btn-warning w-25">Edit</a>
                                            <a href="{{ route('adminSlider.delete',$testimonial->id) }}" class="btn btn-danger w-25"
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