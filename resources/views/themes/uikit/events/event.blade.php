@extends('theme::layouts.app')

@section('content')

    
    <div class="header__text">
        <h1 class="header__title event-single-title">{{ $event->title }}</h1>
    </div>
    <div class="container event-single">
        <img class="event-single-image" src="{{ $event->image() }}" alt="Event single">

        <div class="event-single-content">
            <h3>time and place</h3>
            <p class="time-description">
                {{ $event->place}}
            </p>
            <h3>about the event</h3>
            <p class="event-body">
                {!! $event->body !!}
            </p>
        </div>
        
    </div>

   

@endsection