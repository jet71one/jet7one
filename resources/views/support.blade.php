@extends('theme::layouts.app')

@section('content')
<div class="header__text">
    <h1 class="header__title">
        Support
    </h1>
</div>

<div class="get-involded">
    <div class="container">
        <h2 class="get-involded__title">Get Involved</h2>
        <p class="get-involded__text">You can choose one or several tourist routes offered by us, or you can develop it yourself.  All our tours are designed for a maximum of 5 people.  If your company exceeds this amount, you must notify us in advance.</p>
        <a href="{{route('events')}}" class="btn">See Our Events</a>
    </div>
</div>

<div class="support-bg">
    
</div>

<div class="communication">
    <div class="container">
        <div class="communication__title">communication methods</div>
        <div class="communication__text">Here are some ways </div>
    </div>
</div>

<div class="communications">
    <div class="communication__inner" style="background: linear-gradient(135deg,#ec5e87 20%,#2a70de 70%);">
        <div class="communication__item" >
            <div class="communicate__item-img">
                <svg data-bbox="38 41 123.999 118" viewBox="38 41 123.999 118" fill="white"xmlns="http://www.w3.org/2000/svg" data-type="color"><path d="M161.971 159H38.033L38 139.652c-.011-9.519 5.151-16.928 14.155-20.333 3.37-1.276 17.158-5.928 23.247-7.975v-10.233c-4.176-17.061-6.671-27.43-4.369-37.093C74.363 50.055 85.732 41.02 99.994 41c14.276.02 25.647 9.055 28.977 23.018 2.304 9.658-.192 20.029-4.371 37.092v10.234c6.089 2.047 19.877 6.699 23.249 7.976 9.007 3.404 14.164 10.813 14.15 20.331L161.971 159zm-115.504-8.453h107.068l.018-10.908c.009-5.967-2.996-10.258-8.689-12.411-4.123-1.562-25.611-8.763-25.829-8.834l-2.882-.967V100.09l.121-.495c4.273-17.459 6.25-26.18 4.479-33.614-1.901-7.978-8.355-16.509-20.759-16.526-12.388.017-18.842 8.547-20.745 16.527-1.771 7.436.204 16.156 4.481 33.613l.121.495v17.337l-2.882.967c-.217.072-21.706 7.272-25.824 8.833-5.697 2.153-8.702 6.445-8.698 12.413l.02 10.907z"  data-color="1"/></svg>
            </div>
            <h3 class="communication__item-title ">I am a model, I want to work as your guide </h3>
            
            <a href="/register" class="btn btn-white">contact</a>
        </div>
        <div class="communication__item">
            <div class="communicate__item-img">
                <svg data-bbox="43 43 114 114" viewBox="43 43 114 114" fill="white" xmlns="http://www.w3.org/2000/svg" data-type="color"><path d="M100 43c-31.43 0-57 25.57-57 57s25.57 57 57 57 57-25.57 57-57-25.57-57-57-57zM51.4 100c0-1.72.1-3.43.27-5.1 4.07-3.7 12.21-7.38 23.65-9.64a145.7 145.7 0 00-.73 14.7c0 5.08.25 10.04.74 14.78-11.44-2.26-19.59-5.93-23.66-9.64a48.56 48.56 0 01-.27-5.1zm31.6-.03c0-5.77.34-11.12.91-16.05a137.8 137.8 0 0116.05-.91c5.8 0 11.16.34 16.1.92.58 4.92.92 10.27.92 16.04 0 5.8-.34 11.16-.92 16.1-4.94.58-10.3.92-16.1.92-5.77 0-11.11-.34-16.04-.92a137.3 137.3 0 01-.92-16.1zm41.65-14.7c11.48 2.27 19.62 5.97 23.67 9.7a49.47 49.47 0 010 10.06c-4.05 3.73-12.2 7.43-23.67 9.7a145.16 145.16 0 000-29.47zm20.94-2.05c-5.96-2.91-13.54-5.2-22.12-6.69-1.48-8.57-3.76-16.15-6.67-22.11a48.83 48.83 0 0128.8 28.8zm-40.5-31.54c3.7 4.07 7.38 12.21 9.64 23.66a145.41 145.41 0 00-14.77-.75c-5.05 0-9.99.26-14.71.74 2.26-11.44 5.93-19.58 9.63-23.65a48.95 48.95 0 0110.21 0zm-21.92 2.73c-2.9 5.96-5.18 13.55-6.66 22.11-8.57 1.48-16.15 3.76-22.1 6.67A48.84 48.84 0 0183.17 54.4zm-28.77 62.4c5.96 2.9 13.55 5.19 22.12 6.67 1.49 8.58 3.78 16.16 6.7 22.12a48.83 48.83 0 01-28.82-28.79zm40.55 31.52c-3.72-4.05-7.42-12.19-9.7-23.67a144.74 144.74 0 0029.47 0c-2.27 11.48-5.97 19.62-9.7 23.67a49.28 49.28 0 01-10.06 0zm21.81-2.73c2.93-5.96 5.21-13.55 6.7-22.13 8.58-1.49 16.17-3.78 22.13-6.7a48.83 48.83 0 01-28.83 28.83z"  data-color="1"/></svg>
            </div>
            <h3 class="communication__item-title">Online</h3>
            <p class="communication__item-desc">Make a tax deductible donation‏.</p>
            <a href="viber://chat?number=%2B380669213266" class="btn btn-white">donate</a>
        </div>
        <div class="communication__item" >
            <div class="communicate__item-img">
                <svg data-bbox="23.5 23.5 153 152.999" viewBox="23.5 23.5 153 153" fill="white" xmlns="http://www.w3.org/2000/svg" data-type="color"><path d="M57.67 34.01c2.8 0 6 1.02 8.46 4.7 6.63 9.88 13.03 19.19 16.57 25.53 1.2 2.15 2.37 8.24-1.55 12.64-3.38 3.8-6.36 4.73-8.16 7.5-1.24 1.92-2.65 6.2-.33 11.1 2.78 5.87 6.16 10.69 13.6 18.24 7.54 7.42 12.36 10.8 18.23 13.58a12.5 12.5 0 005.37 1.24c2.53 0 4.57-.82 5.73-1.57 2.78-1.8 3.71-4.78 7.51-8.16 2.3-2.03 5.04-2.7 7.45-2.7 2.23 0 4.17.58 5.2 1.16 6.35 3.53 15.66 9.93 25.55 16.55 6.94 4.65 4.41 11.92 3.43 14.2-.98 2.28-6 9.84-16.8 15.49-2.97 1.55-6.9 2.48-11.65 2.48-14.97 0-38.15-9.16-65.66-36.66C34.38 93.12 29.99 64.4 36.43 52.07c5.65-10.8 13.22-15.81 15.5-16.79a14.97 14.97 0 015.74-1.27zm0-10.51c-4.11 0-7.66 1.16-9.9 2.13-4.46 1.9-13.87 8.6-20.66 21.57-8.48 16.2-4.13 49.39 36.07 89.57 34.59 34.57 60.64 39.73 73.1 39.73 6.3 0 11.86-1.24 16.52-3.68 12.96-6.77 19.67-16.17 21.6-20.66 4.49-10.5 1.64-21.11-7.24-27.07l-4.52-3.04c-8.24-5.53-16.01-10.76-21.76-13.97a21.85 21.85 0 00-10.33-2.48c-5.5 0-10.48 1.85-14.43 5.35a39.03 39.03 0 00-5.44 6.06c-.25.32-.55.73-.79 1.02h-.03a2.1 2.1 0 01-.87-.24c-4.37-2.06-8.27-4.6-15.3-11.5-6.9-7.03-9.45-10.94-11.52-15.3-.19-.4-.24-.7-.23-.9.29-.24.7-.54 1.02-.79 1.57-1.2 3.73-2.82 6.05-5.43 6.66-7.5 6.45-18.34 2.89-24.75-3.24-5.78-8.5-13.61-14.09-21.9l-2.94-4.37c-4.05-6.03-10.15-9.35-17.2-9.35z"  data-color="1"/></svg>
            </div>
            <h3 class="communication__item-title ">Over the Phone</h3>
            <p class="communication__item-desc">It is also easy to contact  online</p>
            <p class="communication__item-desc">Whatsapp: 
                <a href="https://wa.me/380669213266" target="_blank" class="communication__item-link">+38 (066) 921 32 66</a>
            </p>
            <p class="communication__item-desc">Telegram: 
                
                <a href="https://t.me/JetSetUa" target="_blank" class="footer-social-icon">
                    <img src="../images/icons/telegram.png" alt="Telegram">
                </a>
            </p>
        </div>
        
    </div>
</div>

@endsection