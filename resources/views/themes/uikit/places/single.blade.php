@extends('theme::layouts.app')

@section('content')

    
    <div class="header__text">
        <h1 class="header__title event-single-title">{{ $place->name }}</h1>
    </div>
    <div class="container event-single">
        {{-- <img class="event-single-image" src="{{ $event->image() }}" alt="Event single"> --}}

        <div class="event-single-content">
           
            <h3>about the place</h3>
            <p class="event-body">
                {!! $place->body !!}
            </p>
           
        </div>


              
        <div id="map" class="map"></div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script type="text/javascript" src="{{ asset('themes/uikit/js/slick.js') }}"></script> --}}
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRD3yOPcpOEG6LCPm-aIWZd2sgxQCrEgw&callback=initMap&libraries=&v=weekly" defer>
        </script>
            <script>
                function initMap() {
                // The location of Uluru
                    const uluru = {{ $center}};
                    // The map, centered at Uluru
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 6,
                        center: uluru,
                    });


                    
                    // The marker, positioned at Uluru
                    const marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                    });
                }
        </script>
        

    </div>

   

@endsection

@section('javascript')


@endsection