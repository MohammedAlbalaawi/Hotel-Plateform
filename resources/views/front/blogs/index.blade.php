@extends('front.layout.app')

@section('main_content')

    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Blog</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-item">
        <div class="container">
            <div class="row">
                @forelse($posts as $post)
                <div class="col-md-4">
                    <div class="inner">
                        <div class="photo">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($post->photo)}}" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="">{{$post->heading}}</a></h2>
                            <div class="short-des">
                                <p>{{$post->short_content}}</p>
                            </div>
                            <div class="button">
                                <a href="{{route('blog.show',$post->id)}}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                No Posts
                @endforelse
            </div>
            {{$posts->links()}}
        </div>
    </div>

@endsection

