@extends('theme::layouts.app')


@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('content')
<div class="header__text">
    <h1 class="header__title">
       Guides 
    </h1>
</div>
<div class="hot-tour">
    <div class="container">
        <div class="hot-tour__inner">
            @foreach ($guides as $guide)
                <div class="hot-tour__item">
                    <img src="/storage/{{ $guide->image }}" alt="Places" class="place__img">
                    <div class="hot-tour__content">
                    <a href="{{ $guide->link() }}">
                        <h3 class="hot-tour__title">{{ $guide->name }}</h3>
                    </a>    
                    </div>	
                
                </div>

            @endforeach
            
        </div>
    </div>
</div>

   

@endsection

@section('javascript')

@endsection