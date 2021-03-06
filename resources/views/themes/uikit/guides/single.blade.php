@extends('theme::layouts.app')


@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('content')

    
    <div class="header__text">
    <h1 class="header__title event-single-title">{{ $guide->name }}</h1>
    </div>
    <div class="container one-tour-single">
        <div class="tour__inner">
          
            <div class="guide__inner">
                <div class="guide__slider">

                    @if( $images !== null)
                        @foreach ($images as $image)
                            <div class="guide__item"><img src="../storage/{{ $image}}" alt="{{ $guide->name }} image"></div>
                        @endforeach
                    @else 
                
                    <div class="guide__item"><img src="../storage/{{ $guide->avatar}}" alt="Avatar image"></div>
                    @endif
                </div>
                
                <div class="guide__content">
                    <div class="guide__container">
                        <div class="guide__body">
                            <p class="guide__text">
                                <div class="guide__body-title">
                                    <h4>{{ $guide->name }}</h4>
                                    <h4 class="hot-tour__title guide__type">{{ $TypeTour }}</h4>
        
                                </div>
                                <p class="guide__body__text">
                                    {{ $guide->about }}
                                </p>
        
                            </p>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
        @if($guide->tours->count() > 0)
            <div class="hot-tour__inner">

            @foreach($guide->tours as $tour)
                <div class="hot-tour__item">
                    <img src="/storage/{{$tour->image}}" alt="{{$tour->title}}" class="place__img">
                    <div class="hot-tour__content">
                        <a href="/tour/{{$tour->slug}}">
                            <h3 class="hot-tour__title">{{$tour->title}}</h3>
                        </a>
                    </div>
                </div>
            @endforeach
            </div>>
        @endif


        {{-- <div class="register__form">
            <a href="/register" class="btn btn-blue hot-tour__btn">registration</a>

        </div> --}}
    </div>
 
@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="{{ asset('themes/uikit/js/slick.js') }}"></script>
 
@endsection