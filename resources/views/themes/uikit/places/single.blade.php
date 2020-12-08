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
        
    </div>

   

@endsection