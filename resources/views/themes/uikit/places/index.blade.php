@extends('theme::layouts.app')


@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('content')
<div class="header__text">
    <h1 class="header__title">
       Places 
    </h1>
</div>
<div class="hot-tour">
    <div class="container">
        <div class="hot-tour__inner">
            @foreach ($places as $place)
                <div class="hot-tour__item">
                    {{-- <img src="storage/{{ $tour->image }}" alt="Hot tour" class="hot-tour__img"> --}}
                    <div class="hot-tour__content">
                    <a href="{{ $place->link() }}">
                        <h3 class="hot-tour__title">{{ $place->name }}</h3>
                    </a>    
                    {{-- <span class="hot-tour__date">{{ $tour->start_date }} - {{ $tour->end_date}}</span> --}}
                        {{-- <p class="hot-tour__region">{{ $tour->destination }}</p> --}}
                        <p class="hot-tour__text">{!! $place->body !!}</p>
                    </div>	
                
                </div>

            @endforeach
            
        </div>
    </div>
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