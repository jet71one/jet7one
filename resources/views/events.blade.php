@extends('theme::layouts.app')

@section('content')
<div class="header__text">
    <h1 class="header__title">
        Events
    </h1>
</div>

<div class="events">
    <div class="container">
        <div class="events__inner">
         
            @foreach($events as $event)
            <div class="events__item">
                <div class="events__date">{{ $event->created_at->format('d')}}</div>
                <div class="events__content">
                    <div class="events__day">{{ $event->created_at->format('D')}}</div>
                    <div class="events__month">{{ $event->created_at->format('M')}}</div>
                </div>
                <div class="events__text">
                    <a href="{{ $event->link() }}">{{ $event->title}}</a>
                    </div>
                <a href="/register" class="btn">Register Now</a>
            </div>
            
           
               
            @endforeach
        </div>
    </div>
</div>


@include('theme::blocks.franchized')

@endsection