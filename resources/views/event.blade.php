@extends('theme::layouts.app')

@section('content')

    <div class="breadcrumb-nav uk-margin-bottom">
        <div class="uk-container">
            <ul class="uk-breadcrumb">
                <li><span>{{ $event->title }}</span></li>
            </ul>
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