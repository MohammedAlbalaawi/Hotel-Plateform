@extends('admin.layout.app')

@section('heading','Send Email')

@section('right_top_button')
    <a href="{{route('subscribers.index')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View Subscribers </a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('subscribers.store') }}" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Subject</label>
                                        <input type="text" class="form-control" name="subject" value="{{old('subject')}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Message</label>
                                        <textarea name="message" style="height: 100px;"  class="form-control snote">{{old('message')}}</textarea>                                    </div>
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary">Send to All</button>
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
