<div>
    @livewireStyles
    <div class="single-guide__inner">
        {{-- @foreach ($guides as $guide)
            <figure class="single-guide__item">
           
                <a  data-fancybox="cl-group-{{$guide->id}}"  data-caption=" Name:  <a href='{{ route('region.guide-single',$guide->id ) }}'>{{ $guide->name }}</a> <br> {{ $guide->about}}<br> Guides: {{ $TypeTour }}"  href="/storage/{{ $guide->avatar }}" >
                    <img src="/storage/{{ $guide->avatar }}" alt="Places" class="guide__img">
                    @if (json_decode($guide->images) !== null)
                            
                        @foreach (json_decode($guide->images) as $image)
                            <div class="hidden">
                                <a data-fancybox="cl-group-{{$guide->id}}"  href="../storage/{{ $image }}"></a>
                            </div>
                        @endforeach                            
                    @endif

                    <div class="guide__title">{{ $guide->name}}</div> 
                </a>    
            </figure>

        @endforeach --}}

      
        <a wire:click="load" class="uk-button uk-button-danger uk-align-right">Load more</a>

    </div>
    @livewireScripts
</div>
