@extends('front.layout.app')

@section('main_content')

    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Photo Gallery</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="photo-gallery">
                <div class="row">
                    @forelse($photos as $photo)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="photo-thumb">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($photo->photo)}}" alt="">
                            <div class="bg"></div>
                            <div class="icon">
                                <a href="{{\Illuminate\Support\Facades\Storage::url($photo->photo)}}" class="magnific"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="photo-caption">
                            {{$photo->caption}}
                        </div>
                    </div>
                    @empty
                    No Pgotos
                    @endforelse

                </div>
            </div>
            {{$photos->links()}}
        </div>
    </div>

@endsection
