@extends('admin.layout.app')

@section('heading','View Photos')

@section('right_top_button')
<a href="{{route('photos.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new </a>
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
                                    <th>Photo</th>
                                    <th>Caption</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                    @forelse($photos as $photo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{\Illuminate\Support\Facades\Storage::url( $photo->photo )}}"
                                                 alt="photo" class="w_200">
                                        </td>
                                        <td>{{$photo->caption}}</td>
                                        <td class="w_50">
                                            <div class="d-flex justify-content-center ">
                                                <a href="{{ route('photos.edit',$photo->id) }}" class="btn btn-warning  mr-2 px-5">Edit</a>
                                                <form action="{{ route('photos.destroy',$photo->id) }}" method="POST">
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
