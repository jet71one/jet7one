@extends('theme::layouts.app')


@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('content')


    <div class="header__text">
    <h1 class="header__title event-single-title">{{ $tour->title}}</h1>
    </div>
    <style media="screen">
      .tour__inner{
        display: flex;
        color: #000;
        margin-top: 30px;
        margin-bottom: 30px;
      }
      .tour__image{
        margin-right: 30px;
        max-width: 320px;
      }
      .tour__image img{
        width: 100%;
        margin-bottom: 30px;
      }

    </style>
    <div class="container tour-single">
        <div class="tour__inner">
                <div class="tour__image">
                   <img src="/storage/{{$tour->image}}" alt="{{$tour->title}}">

                   <div class="header__btn btn btn-header">
                      <a href="/region/{{$region->slug}}" class="nav__link">{{$region->name}} </a>
                  </div>

                </div>

                    <div class="tour__container">
                        <div class="tour__body">

                                <div class="guide__body-title">
                                    {{$tour->title}}
                                </div>
                                <div class="">
                                    {!!$tour->body!!}
                                </div>

                        </div>
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
