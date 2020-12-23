@extends('theme::layouts.app')


@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('content')

    
    <div class="header__text">
    <h1 class="header__title event-single-title">{{ $region->name}}</h1>
    </div>
    <div class="container tour-single">
        <div class="tour__inner">
            <div class="list-btn">
                @foreach ($categories as $item)
                        <?php $countPlace = App\Place::where('location_id', '=' ,$region->id )->where('category_id','=', $item->id)->count() ?>
                        @if( $countPlace >= '1')
                            <div class="header__btn btn btn-header">
                                <a href="{{ route('places.index',['id'=> $item->id,'regID' => $region->id]) }}" class="nav__link">{{ $item->name}}  </a>
                            </div>   
                        @endif
                @endforeach
                <div class="header__btn btn btn-header">
                    <a href="{{ route('region.guides',['regID' => $region->id]) }}" class="nav__link">Guides of region</a>
                </div>  
                
            </div>
           
            @if ($guide->role_id == '11')
                <div class="guide__inner">
                    <div class="guide__slider">
                        @if( $guide->images <> 'NULL')
                             <div class="guide__item"><img src="../storage/{{ $guide->avatar}}" alt="Avatar image"></div>
                        @else 
                            @foreach ($guide->images as $image)
                                    <div class="guide__item"><img src="storage/{{ $image}}" alt="{{ $guide->name }} image"></div>
                            @endforeach
                    
                        @endif
            
                    </div>
                    
                    <div class="guide__content">
                        <div class="guide__container">
                            <div class="guide__body">
                                <p class="guide__text">
                                    <div class="guide__body-title">
                                       {{ $guide->name}}
            
                                    </div>
                                    <p> <span class="rose type_tour">{{ $TypeTour }}</span></p>
                                    <p class="guide__body__text">
                                        {{ $guide->about }}
                                    </p>
            
                                </p>
                            </div>
                        </div>
                    </div>
            
                </div>
            @else
            @endif
        </div>
        
        <div id="map" class="map"></div>

      
        <div class="register__form">
            <a href="/register" class="btn btn-blue hot-tour__btn">registration</a>

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
    <script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>
<script>
    
    function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 6,
    center: { lat: 50.024, lng: 30.887 },
  });
  // Create an array of alphabetical characters used to label the markers.
  const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  // Add some markers to the map.
  // Note: The code uses the JavaScript Array.prototype.map() method to
  // create an array of markers based on a given "locations" array.
  // The map() method here has nothing to do with the Google Maps API.
  const markers = locations.map((location, i) => {
    return new google.maps.Marker({
      position: location,
      label: labels[i % labels.length],
    });
  });
  // Add a marker clusterer to manage the markers.
  new MarkerClusterer(map, markers, {
    imagePath:
      "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
  });
}
const locations =  [ {{ $pins}} ]  ;
</script>
@endsection