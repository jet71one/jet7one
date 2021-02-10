@extends('theme::layouts.app')


@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('content')

    
    <div class="header__text">
    <h1 class="header__title event-single-title">{{ $region->name}}</h1>
    </div>
    <div class="container">
        <div class=" tour-single">
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
                @forelse ($guide as $item)
                <?php  $collection = collect(json_decode($item->region_id)) ?>
                    @if ($collection->contains($region->id))
                        <div class="guide__inner">
                            <div class="guide__slider">
                                @if( $item->images == null)
                                    <div class="guide__item"><img src="../storage/{{ $item->avatar}}" alt="Avatar image"></div>
                                @else 
    
                                    @foreach (json_decode($item->images) as $image)
                                        <div class="guide__item"><img src="../storage/{{ $image}}" alt="{{ $item->name}} image"></div>
                                    @endforeach
                                @endif
                    
                            </div>
                            
                            <div class="guide__content">
                                <div class="guide__container">
                                    <div class="guide__body">
                                        <p class="guide__text">
                                            <div class="guide__body-title">
                                            {{$item->name }} 
                                            </div>
                                            <h4 class="hot-tour__title guide__type">{{ $TypeTour = App\TypeTour::where('id',"=", $item->type_tour_id)->value('name') }}</h4>
                                            <p>Languages : {{ $item->lang }}</p>
                                            <p class="guide__body__text">{{ $item->about }}</p>
                                            
                                        </p>
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                        @break
                   
                    @endif
                    
                @empty
                <p class="guide__body__text">
                    There is no  guide for this region yet
                </p>
                @endforelse
                {{-- {{ dd($guide) }} --}}
               {{-- @if($guide == 'There is no  guide for this region yet')
                <p class="guide__body__text">
                    {{ $guide }} 
                </p>
               @else 
                        @if ($guide->role_id == '11')
                            
                            @if ($collection->contains($region->id))
                            <div class="guide__inner">
                                <div class="guide__slider">
                                    @if( $images == null)
                                        <div class="guide__item"><img src="../storage/{{ $guide->avatar}}" alt="Avatar image"></div>
                                    @else 
                                        @foreach ($images as $image)
                                            <div class="guide__item"><img src="../storage/{{ $image}}" alt="{{ $guide->name}} image"></div>
                                        @endforeach
                                    @endif
                        
                                </div>
                                
                                <div class="guide__content">
                                    <div class="guide__container">
                                        <div class="guide__body">
                                            <p class="guide__text">
                                                <div class="guide__body-title">
                                                {{$guide->name }} 
                                                </div>
                                                <h4 class="hot-tour__title guide__type">{{ $TypeTour }}</h4>
                                                <p>Languages : {{ $guide->lang }}</p>
                                                <p class="guide__body__text">{{ $guide->about }}</p>
                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        
                            </div>
                            @endif
    
                            
                        @else
                            <div class="guide__inner">
                                <div class="guide__slider">
                                    @if( $images == null)
                                        <div class="guide__item"><img src="../storage/{{ $guide->avatar }}" alt="Avatar image"></div>
                                    @else 
                                        @foreach ($images as $image)
                                            <div class="guide__item"><img src="../storage/{{ $image}}" alt="{{ $guide->name }} image"></div>
                                        @endforeach
                                    @endif
                                </div>
                                
                                <div class="guide__content">
                                    <div class="guide__container">
                                        <div class="guide__body">
                                            <p class="guide__text">
                                                <div class="guide__body-title">{{ $guide->name }}</div>
                                                <h4 class="hot-tour__title guide__type">{{ $TypeTour }}</h4>
                                                <p>Languages : {{ $guide->lang }}</p>
                                                <p class="guide__body__text">{{ $guide->about }}</p>
                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        
                            </div>
                        @endif 
               @endif --}}
                
            </div>
            {{-- @php $information = array(); @endphp 
            @forelse ($places as $place)
                @php array_push($information,"['<a href=>']")
                @endphp 
                
            @endforelse --}}
           
            <div id="map" class="map"></div>
    
          
            <div class="register__form">
                <a href="/register" class="btn btn-blue hot-tour__btn">registration</a>
    
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
    <script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>
{{-- <script>

            var map;
            var InforObj = [];
            var centerCords = {
                lat: -25.344,
                lng: 131.036
            };
           
           var markersOnMap =  {{ $pins  }} ;
            // var markersOnMap = [{
            //         placeName: "Australia (Uluru)",
            //         LatLng: [{
            //             lat: -25.344,
            //             lng: 131.036
            //         }]
            //     },
            //     {
            //         placeName: "Australia (Melbourne)",
            //         LatLng: [{
            //             lat: -37.852086,
            //             lng: 504.985963
            //         }]
            //     },
            //     {
            //         placeName: "Australia (Canberra)",
            //         LatLng: [{
            //             lat: -35.299085,
            //             lng: 509.109615
            //         }]
            //     },
            //     {
            //         placeName: "Australia (Gold Coast)",
            //         LatLng: [{
            //             lat: -28.013044,
            //             lng: 513.425586
            //         }]
            //     },
            //     {
            //         placeName: "Australia (Perth)",
            //         LatLng: [{
            //             lat: -31.951994,
            //             lng: 475.858081
            //         }]
            //     }
            // ];

            window.onload = function () {
                initMap();
            };

            function addMarkerInfo() {
                for (var i = 0; i < markersOnMap.length; i++) {
                    var contentString = '<div id="content"><h1>' +  markersOnMap[i].placeName +
                        '</h1><p>Lorem ipsum dolor sit amet, vix mutat posse suscipit id, vel ea tantas omittam detraxit.</p></div>';

                    const marker = new google.maps.Marker({
                        position: markersOnMap[i].LatLng[0],
                        map: map
                    });

                    const infowindow = new google.maps.InfoWindow({
                        content: contentString,
                        maxWidth: 200
                    });

                    marker.addListener('click', function () {
                        closeOtherInfo();
                        infowindow.open(marker.get('map'), marker);
                        InforObj[0] = infowindow;
                    });
                    // marker.addListener('mouseover', function () {
                    //     closeOtherInfo();
                    //     infowindow.open(marker.get('map'), marker);
                    //     InforObj[0] = infowindow;
                    // });
                    // marker.addListener('mouseout', function () {
                    //     closeOtherInfo();
                    //     infowindow.close();
                    //     InforObj[0] = infowindow;
                    // });
                }
            }

            function closeOtherInfo() {
                if (InforObj.length > 0) {
                    /* detach the info-window from the marker ... undocumented in the API docs */
                    InforObj[0].set("marker", null);
                    /* and close it */
                    InforObj[0].close();
                    /* blank the array */
                    InforObj.length = 0;
                }
            }

            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: centerCords
                });
                addMarkerInfo();
            }
   
</script> --}}
<script>
    function initMap() {
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap'
        };
                        
        // Display a map on the web page
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        map.setTilt(50);
            
        // Multiple markers location, latitude, and longitude
        var markers = [ {{ $pins }} ];
        // var markers = [
        //     ['Brooklyn Museum, NY', 40.671531, -73.963588],
        //     ['Brooklyn Public Library, NY', 40.672587, -73.968146],
        //     ['Prospect Park Zoo, NY', 40.665588, -73.965336]
        // ];
                            
        // Info window content
        //var infoWindowContent = [ {{ $info }} ];
        var html = "<a>infoWindowContent</h3>";
        // var infoWindowContent = [
        //     ['<div class="info_content">' +
        //     '<h3>Brooklyn Museum</h3>' +
        //     '<p>The<a href="#">Google</a> Brooklyn Museum is an art museum located in the New York City borough of Brooklyn.</p>' + '</div>'],
        //     ['<div class="info_content">' +
        //     '<h3>Brooklyn Public Library</h3>' +
        //     '<p>The Brooklyn Public Library (BPL) is the public library system of the borough of Brooklyn, in New York City.</p>' +
        //     '</div>'],
        //     ['<div class="info_content">' +
        //     '<h3>Prospect Park Zoo</h3>' +
        //     '<p>The Prospect Park Zoo is a 12-acre (4.9 ha) zoo located off Flatbush Avenue on the eastern side of Prospect Park, Brooklyn, New York City.</p>' +
        //     '</div>']
        // ];
        
            
        // Add multiple markers to map
        var infoWindow = new google.maps.InfoWindow(), marker, i;
        
        // Place each marker on the map  
        for( i = 0; i < markers.length; i++ ) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0]
            });
            
            
            // Add info window to marker    
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    var html = "<a href="+markers[i][3] +">"+markers[i][0]+ "</a>"
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                }
            })(marker, i));
    
            // Center the map to fit all markers on the screen
            map.fitBounds(bounds);
        }
    
        // Set zoom level
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
            this.setZoom(12);
            google.maps.event.removeListener(boundsListener);
        });
        
    }
    // Load initialize function
    google.maps.event.addDomListener(window, 'load', initMap);
    </script>

@endsection