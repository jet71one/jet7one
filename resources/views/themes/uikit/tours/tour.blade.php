@extends('theme::layouts.app')

L
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('content')

    
    <div class="header__text">
    <h1 class="header__title event-single-title">{{ $tour->title}}</h1>
    </div>

    <div class="container tour-single">
        <div class="tour__inner">
            <div class="list-btn">
                <div class="header__btn btn btn-header">
                    <a href="{{route('guest-info')}}" class="nav__link">hotels</a>
                </div>
                <div class="header__btn btn btn-header">
                    <a href="{{route('guest-info')}}" class="nav__link">apartments</a>
                </div>
                <div class="header__btn btn btn-header">
                    <a href="{{route('guest-info')}}" class="nav__link">rent a car</a>
                </div>
                <div class="header__btn btn btn-header">
                    <a href="{{route('guest-info')}}" class="nav__link">restaurants</a>
                </div>
                <div class="header__btn btn btn-header">
                    <a href="{{route('guest-info')}}" class="nav__link">strip club</a>
                </div>
                <div class="header__btn btn btn-header">
                    <a href="{{route('guest-info')}}" class="nav__link">night club</a>
                </div>
            </div>
            <div class="guide__inner">
                <div class="guide__slider">
                    <div class="guide__item"><img src="../images/guide-img-1.jpg" alt="Guide image"></div>
                    <div class="guide__item"><img src="../images/guide-img-2.jpg" alt="Guide image"></div>
                    <div class="guide__item"><img src="../images/guide-img-3.jpg" alt="Guide image"></div>
                    <div class="guide__item"><img src="../images/guide-img-4.jpg" alt="Guide image"></div>
                    <div class="guide__item"><img src="../images/guide-img-5.jpg" alt="Guide image"></div>
                    <div class="guide__item"><img src="../images/guide-img-6.jpg" alt="Guide image"></div>
                    <div class="guide__item"><img src="../images/guide-img-7.jpg" alt="Guide image"></div>
                    <div class="guide__item"><img src="../images/guide-img-8.jpg" alt="Guide image"></div>
        
                </div>
                
                <div class="guide__content">
                    <div class="guide__container">
                        <div class="guide__body">
                            <p class="guide__text">
                                <div class="guide__body-title">
                                    Leading Guide - Katarina
        
                                </div>
                                <p class="guide__body__text">
                                    Leading Guide - Katarina.<br>
                                    Katarina - prof. model
                                </p>
                                <p class="guide__body__text">
                                    She worked on world-class catwalks, represented world brands.<br>
        
                                    Also:
        
                                    Fourth vice miss “Miss Ukraine Universe” 2015<br>
        
                                    Second runner up “Princess of the Globe” 2016<br>
        
                                    Miss photogenic “Photomodel of the World” 2016<br>
        
                                    Grand Champion of senior model “World Championship of Perfoming ARTS” WCOPA U.S.A. 2017<br>
                                </p>
        
                            </p>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>

        {{-- <div id="map" class="map"></div> --}}

        <iframe src="https://www.google.com/maps/d/embed?mid=12zmLfYNODRpPhCs6YIL3oxrnODzKb6dE" width="100%" height="480"></iframe>

    </div>
 

   

@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="{{ asset('themes/uikit/js/slick.js') }}"></script>
 <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRD3yOPcpOEG6LCPm-aIWZd2sgxQCrEgw&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
<script>
    function initMap() {
    // The location of Uluru
        const uluru = { lat: 50.8614422 , lng: 30.3926087  };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });
    }
</script>
@endsection