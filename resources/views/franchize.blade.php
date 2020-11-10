@extends('theme::layouts.app')

@section('content')
<div class="header__text">
    <h1 class="header__title">
        Franchise
    </h1>
</div>

<div class="franchize-container">
    <div class="container">
        
        <h3 class="franch__title">  Franchise</h2>
            <p>
                You can make a region franchise request - the region choice is not related to the country and city where you are located. The most important condition is that you must be well oriented in chosen region.
The franchise cost depends on the selected country and region, and ranges from 1500 EUR to 5000 EUR for a 3 months period. After three months, a franchise renewal is required in the established amount for the next three months of region franchise using.
In the selected region, you can attract advertising projects or partners. After successful verification from our side, their logo will be added on the your region's website page and you will receive your percentage for attracting them in your region as a region representative.
            </p>
        <div class="register__form">
            <a href="{{route('contact')}}" class="btn btn-blue hot-tour__btn">Complete a form</a>

        </div>
    </div>
</div>       
       



@endsection