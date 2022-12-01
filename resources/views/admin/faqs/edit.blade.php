@extends('admin.layout.app')

@section('heading','Edit Faq')

@section('right_top_button')
    <a href="{{route('faqs.index')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View Faqs</a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('faqs.update',$model->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Question</label>
                                        <input type="text" class="form-control" name="question" value="{{$model->question}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Answer</label>
                                        <textarea name="answer"
                                                  class="form-control snote">{{$model->answer}}</textarea>
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