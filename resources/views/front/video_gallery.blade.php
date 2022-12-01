@extends('front.layout.app')

@section('main_content')

    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Video Gallery</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="video-gallery">
                <div class="row">
                    @forelse($videos as $video)
                        <div class="col-lg-3 col-md-4">
                            <div class="video-thumb">
                                <img src={{$video->ImageVideoPreview($video->video_id)}} alt="preview">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href={{$video->videoPreview($video->video_id)}} class="video-button"><i
                                            class="fa fa-play"></i></a>
                                </div>
                            </div>
                            <div class="video-caption">
                                {{$video->caption}}
                            </div>
                        </div>
                    @empty
                        No Videos
                    @endforelse

                </div>
            </div>
        </div>
    </div>

@endsection