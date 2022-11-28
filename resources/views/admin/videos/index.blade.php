@extends('admin.layout.app')

@section('heading','View Videos')

@section('right_top_button')
<a href="{{route('videos.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new </a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="example1">
                                <thead>
                                <tr>
                                    <th>number</th>
                                    <th>Video Preview</th>
                                    <th>Caption</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                    @forelse($videos as $video)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <iframe width="560"
                                                    height="315"
                                                    src="https://www.youtube.com/embed/{{$video->video_id}}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </td>
                                        <td>{{$video->caption}}</td>
                                        <td class="w_50">
                                            <div class="d-flex justify-content-center ">
                                                <a href="{{ route('videos.edit',$video->id) }}" class="btn btn-warning  mr-2 px-5">Edit</a>
                                                <form action="{{ route('videos.destroy',$video->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="btn btn-danger px-5"
                                                            onClick="return confirm('Are you sure?');">
                                                        Delete</button>
                                                </form>
                                            </div>
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
