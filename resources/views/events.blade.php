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
            <div class="events__date">18</div>
            <div class="events__content">
                <div class="events__day">Пн</div>
                <div class="events__month">Вересень</div>
            </div>
            <div class="events__text">
                <a href="#">Wine tour at Asconi winery</a>
                </div>
            <a href="#" class="btn">Register Now</a>
        </div>
    </div>
</div>

<div class="franchise">
    <div class="container">
        <div class="franchise__text">We Need Your Support Today!</div>
        <a href="/support.html" class="btn btn-white">donate</a>
    </div>
</div>

@endsection