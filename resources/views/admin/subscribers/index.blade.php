@extends('admin.layout.app')

@section('heading','View Subscribers')

@section('right_top_button')
<a href="{{route('subscribers.create')}}" class="btn btn-primary" >Send Email </a>
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
                                    <th>Number</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @forelse($subscribers as $subscriber)
                                    <tr >
                                        <td >{{ $loop->iteration }}</td>
                                        <td >{{ $subscriber->email}}</td>
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
