@extends('admin.layout.app')

@section('heading','View Pages')

@section('right_top_button')
<a href="{{route('pages.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add new</a>
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
                                    <th>Page</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @forelse($pages as $page)
                                    <tr>
                                        <td style="width: 20%;">{{ $loop->iteration }}</td>

                                        <td>{{$page->name}}</td>
                                        <td class="w_50">
                                            <div class="d-flex justify-content-center ">
                                            <a href="{{ route('pages.edit',$page->id) }}" class="btn btn-warning  mr-2 px-5">Edit</a>
                                            <form action="{{ route('pages.destroy',$page->id) }}" method="POST">
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
