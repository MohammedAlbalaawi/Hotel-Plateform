@extends('front.layout.app')

@section('main_content')

    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>FAQs</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">

                        @php $i =0 @endphp

                        @forelse($faqs as $faq)
                            @php $i++; @endphp

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$i}}">
                                    <button class="accordion-button @if($i != 1) collapsed @endif"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{$i}}"
                                            aria-expanded="@if($i == 1) true @else false @endif"
                                            aria-controls="collapse{{$i}}">

                                        {{ $faq->question}}
                                    </button>
                                </h2>

                                <div id="collapse{{$i}}"
                                     class="accordion-collapse collapse @if($i ==1) show @endif"
                                     aria-labelledby="heading{{$i}}"
                                     data-bs-parent="#accordionExample">

                                    <div class="accordion-body">
                                        <p>{!! $faq->answer !!}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                        No Questions
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection