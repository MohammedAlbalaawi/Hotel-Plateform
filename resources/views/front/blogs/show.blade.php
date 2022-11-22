@extends('front.layout.app')

@section('main_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$model->heading}}</h2>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-lg-8 col-md-12">
                <div class="featured-photo text-center">
                    <img style="width: 200px; height: 200px;" src="{{\Illuminate\Support\Facades\Storage::url($model->photo)}}" alt="">
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fa fa-clock-o"></i></b>
                        {{ date('d M, Y', strtotime($model->updated_at)) }}
                    </div>
                    <div class="item">
                        <b><i class="fa fa-eye"></i></b>
                        234
                    </div>
                </div>
                <div class="main-text">
                    <p>{!! $model->long_content !!}</p>
                </div>
                <div class="share-content">
                    <h2>Share</h2>
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
            </div>



        </div>
    </div>
</div>

@endsection
