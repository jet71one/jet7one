@extends('theme::layouts.app-without-chat')


@section('css')
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
@endsection
@section('content')
<div class="header__text">
    <h1 class="header__title">
       Guides 
    </h1>
</div>
<div class="hot-tour">
    <div class="container">
        <div class="single-guide__inner">
            @foreach ($guides as $guide)
              
                <?php  $collection = collect(json_decode($guide->region_id)) ?>
                @php $TypeTour = App\TypeTour::where('id',"=", $guide->type_tour_id)->value('name'); @endphp

                @if ($collection->contains($regID))
                    <figure class="single-guide__item">
                
                        <a  data-fancybox="cl-group-{{$guide->id}}"  data-caption=" Name:  <a  href='{{ route('region.guide-single',$guide->id ) }}'><strong>{{ $guide->name }}</strong></a> <br> {{ $guide->about}}<br> Guide' tours: {{ $TypeTour }}"  href="/storage/{{ $guide->avatar }}" >
                            <img src="/storage/{{ $guide->avatar }}" alt="Places" class="guide__img">
                            
                          
                            @if (json_decode($guide->images) !== null && json_decode($guide->images) !== "")
                            
                                @foreach (json_decode($guide->images) as $image)
                                    <div class="hidden">
                                        <a data-fancybox="cl-group-{{$guide->id}}"  href="../storage/{{ $image }}"></a>
                                    </div>
                                @endforeach
                                            
                            @endif

                            <div class="guide__title">{{ $guide->name}}</div> 
                        </a>    
                    </figure>
                @else
                @endif

                  

            @endforeach
            {{-- @livewire('guides')
            <a wire:click="load" class="uk-button uk-button-danger uk-align-right">Load more</a> --}}

        </div>
    </div>
        
        
    
</div>

   

@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

@endsection