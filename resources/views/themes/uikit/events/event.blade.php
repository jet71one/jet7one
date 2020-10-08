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

    {{-- <div class="uk-container uk-container-small">
        <article id="post-{{ $event->id }}" class="uk-article post-{{ $event->id }} uk-text-center uk-margin-large-bottom">
            
            <meta property="name" content="{{ $event->title }}">
            <meta property="author" typeof="Person" content="admin">
            <meta property="dateModified" content="{{ Carbon\Carbon::parse($event->updated_at)->toIso8601String() }}">
            <meta class="uk-margin-remove-adjacent" property="datePublished" content="{{ Carbon\Carbon::parse($event->created_at)->toIso8601String() }}">
            
            <div class="uk-margin-large-bottom">
                <img width="1200" height="640" src="{{ $event->image() }}" alt="{{ $event->title }}" srcset="{{ $event->image() }}">
            </div>
            
                
            <div class="uk-container uk-container-small uk-text-left">
                
                {!! $event->body !!}
                
            </div>

        </article>
    </div> --}}

@endsection