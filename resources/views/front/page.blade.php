@extends('front.layout.app')

@section('main_content')

    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$model->name}}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        {!! $model->content !!}
                    </p>

                </div>
            </div>
        </div>
    </div>

@endsection
