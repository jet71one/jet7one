<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @if(isset($seo->title))
        <title>{{ $seo->title }}</title>
    @else
        <title>{{ setting('site.title', 'Laravel Wave') . ' - ' . setting('site.description', 'The Software as a Service Starter Kit built on Laravel & Voyager') }}</title>
    @endif

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('/') }}">

    <link rel="icon" href="/wave/favicon.png" type="image/x-icon">

    {{-- Social Share Open Graph Meta Tags --}}
    @if(isset($seo->title) && isset($seo->description) && isset($seo->image))
        <meta property="og:title" content="{{ $seo->title }}">
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:image" content="{{ $seo->image }}">
        <meta property="og:type" content="@if(isset($seo->type)){{ $seo->type }}@else{{ 'article' }}@endif">
        <meta property="og:description" content="{{ $seo->description }}">
        <meta property="og:site_name" content="{{ setting('site.title') }}">

        <meta itemprop="name" content="{{ $seo->title }}">
        <meta itemprop="description" content="{{ $seo->description }}">
        <meta itemprop="image" content="{{ $seo->image }}">

        @if(isset($seo->image_w) && isset($seo->image_h))
            <meta property="og:image:width" content="{{ $seo->image_w }}">
            <meta property="og:image:height" content="{{ $seo->image_h }}">
        @endif
    @endif

    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">

    @if(isset($seo->description))
        <meta name="description" content="{{ $seo->description }}">
    @endif

    <!-- Styles -->
    <link href="{{ asset('themes/uikit/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
</head>
<body class="@if(Request::is('/')){{ 'home' }}@else{{ str_slug(str_replace('/', '-', Request::path())) }}@endif">
    <div id="app" data-sticky-wrap>

        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <div class="header__logo">
                        <a href="#" class="logo__link">Jet 7 One</a>
                    </div>
                    <nav class="nav">
                        <a href="/" class="nav__link">Home</a>
                        <a href="{{route('about')}}" class="nav__link">About us</a>
                        <a href="{{route('support')}}" class="nav__link">Support</a>
                        <a href="{{route('news')}}" class="nav__link">News</a>
                        <a href="{{route('events')}}" class="nav__link">Events</a>
                        <a href="{{route('hot-tour')}}" class="nav__link">Hot tour</a>
                        <a href="{{route('contact')}}" class="nav__link">Contact</a>
                    </nav>
                    <div class="header__btn btn btn-header">
                        <a href="#" class="nav__link">guest information</a>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer__inner">
                <div class="footer__info">
                    <p class="footer__text">Guide Administrator </p>
                    <p class="footer__text">Contact us via Telegram:<br>
    
                        JetSetUa<a href="https://t.me/JetSetUa" target="_blank" class="footer-social-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"/></svg>
                        </a></p>
                    <div class="footer__email">Email:
                        <a href="mailto:jet71one@gmail.com">jet71one@gmail.com</a>
                    </div>
                    <div class="footer__phone">Phone:
                        <a href="tel:+380669213266">+38 (066) 921 32 66</a>
                    </div>
                    <div class="footer__whatsapp">Whatsapp: 
                        <a href="#">+38 (066) 921 32 66</a>
                    </div>
                </div>
                <div class="footer__form">
                    <div class="footer__form-title">Get Monthly Updates</div>
                    <input type="text" class="footer__form-input" placeholder="Enter your email here *">
                    <button type="submit" class="btn btn-form">Sign Up</button>
                </div>
                <div class="footer__links">
                    <div class="footer__links-title">Quick Links</div>
                    <nav class="list__links">
                        <a href="#" class="list__link">About</a>
                        <a href="/support.html" class="list__link">Support Us</a>
                        <a href="/new.html" class="list__link">News</a>
                        <a href="/events.html" class="list__link">Events</a>
                        <a href="#" class="list__link">Contact</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright">
        <div class="container">
            <div class="copyright__inner">
                © 2019 by PWR. Proudly created with JetSetUa | <a href="#">Terms of Use</a>   |  <a href="#">Privacy Policy</a> 
            </div>
        </div>
    </div>

    {{-- @if(!auth()->guest() && auth()->user()->hasAnnouncements())
        @include('theme::partials.announcements')
    @endif --}}

    <!-- Scripts -->
    <script src="{{ asset('themes/uikit/js/app.js') }}"></script>

    @yield('javascript')

    @impersonating
        @include('theme::partials.impersonation-bar')
    @endImpersonating

    <script>
        @if(session('message'))
            @php $message_type = (session('message_type') == 'info') ? 'primary' : session('message_type'); @endphp
            UIkit.notification('{{ session("message") }}', {status:'{{ $message_type }}', pos: 'top-right'})
        @endif
    </script>

    @if(setting('site.google_analytics_tracking_id', ''))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-62970618-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', '{{ setting("site.google_analytics_tracking_id") }}');
        </script>

    @endif
</body>
</html>
