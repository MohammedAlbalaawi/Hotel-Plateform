@extends('admin.layout.app')

@section('heading','Add Faq')

@section('right_top_button')
    <a href="{{route('faqs.index')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View Faqs</a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('faqs.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Question</label>
                                        <input type="text" class="form-control" name="question" value="{{old('question')}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Answer</label>
                                        <textarea name="answer"
                                                  class="form-control snote">{{old('answer')}}</textarea>
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
