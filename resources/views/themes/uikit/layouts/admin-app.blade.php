<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @if(isset($seo->title))
        <title>{{ $seo->title }}</title>
    @else
        <title>{{ setting('site.title', 'Laravel') . ' - ' . setting('site.description', '') }}</title>
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
    <link href="/themes/uikit/css/admin/admin-app.css" rel="stylesheet">
    <link href="/themes/uikit/css/app.css" rel="stylesheet">
</head>
<body class="@if(Request::is('/')){{ 'home' }}@else{{ str_slug(str_replace('/', '-', Request::path())) }}@endif">
    <div id="app" data-sticky-wrap>

        <div class="uk-nav-container" @if(Request::is('/')){{ 'uk-sticky' }}@endif>
            <div class="uk-container">
                <nav class="uk-navbar-container uk-margin uk-navbar-transparent" uk-navbar>
                    <div class="uk-navbar-left uk-logo-container">
                        <a href="/" class="logo__link">Jet 7 One</a>
                    </div>

                    @if(!Auth::guest())
                        <div id="uk-nav-left-mobile"><span class="more-btn" uk-icon="menu"></span><span class="close-btn uk-icon" uk-icon="close"></span></div>
                        <div class="uk-navbar-left uk-margin-left">
                            <ul class="uk-navbar-nav" id="uk-nav-left">
                                {!! menu('guest-menu', 'theme::menus.uikit') !!}
                            </ul>
                        </div>
                    @endif

                    <div class="uk-navbar-right">

                        <ul class="uk-navbar-nav @if(!Auth::guest()){{ 'uk-navbar-auth' }}@endif" id="uk-nav-right">
                            @if(Auth::guest())
                                {!! menu('guest-menu', 'theme::menus.uikit') !!}
                                <li class="uk-login"><a href="/login">Login</a></li>
                                <li>
                                    <a href="/register"><button class="uk-button uk-button-primary">Sign Up</button></a>
                                </li>
                            @else


                                @if( auth()->user()->onTrial() )
                                    <li><span class="trial-days">You have {{ auth()->user()->daysLeftOnTrial() }} @if(auth()->user()->daysLeftOnTrial() > 1){{ 'Days' }}@else{{ 'Day' }}@endif left on your @if(auth()->user()->subscription('main') && auth()->user()->subscription('main')->onTrial()){{ ucfirst(auth()->user()->role->name) . ' Plan' }}@else{{ 'Free' }}@endif Trial</span></li>
                                @endif

                                @if( auth()->user()->subscribed('main') && auth()->user()->subscription('main')->onGracePeriod() && !auth()->user()->onTrial() )
                                    <li><span class="trial-days">You have {{ auth()->user()->daysLeftOnGrace() }} @if(auth()->user()->daysLeftOnTrial() > 1){{ 'Days' }}@else{{ 'Day' }}@endif left on your {{ ucfirst(auth()->user()->role->name) . ' Plan' }}</span></li>
                                @endif

                                @if( !auth()->guest() && auth()->user()->can('browse_admin') )
                                    @if(!Request::is('notifications'))
                                        @include('theme::partials.notifications')
                                    @endif
                                @endif
                                <li>
                                    <a href="#_" class="user-icon">
                                        <img src="{{ Voyager::image(Auth::user()->avatar) }}">
                                        <span uk-icon="icon: triangle-down"></span>
                                    </a>
                                    <div class="uk-navbar-dropdown uk-user-dropdown" id="user-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li class="user-dropdown-info">
                                                <img src="{{ Voyager::image(Auth::user()->avatar) }}">
                                                <div>
                                                    <p>{{ Auth::user()->name }}</p>
                                                    <span>{{ Auth::user()->username }}</span>
                                                </div>
                                            </li>
                                            <li><div class="uk-label uk-label-success uk-label-plan"  style="background:#{{ stringToColorCode(auth()->user()->role->display_name) }}">{{ auth()->user()->role->display_name }}</div></li>
                                            @if( auth()->user()->onTrial() && !auth()->user()->subscription('main') )
                                                <li><a href="{{ route('wave.settings', 'plans') }}"><span uk-icon="icon: cloud-upload"></span>Upgrade My Account</a></li>
                                            @endif
                                            @if( !auth()->guest() && auth()->user()->can('browse_admin') )
                                                <li><a href="{{ route('voyager.dashboard') }}"><span uk-icon="icon: bolt"></span>Admin</a></li>
                                            @endif
                                            {{-- <li><a href="{{ route('wave.profile', Auth::user()->username) }}"><span uk-icon="icon: user"></span>My Profile</a></li> --}}
                                            <li><a href="{{ route('wave.settings') }}"><span uk-icon="icon: cog"></span>Settings</a></li>
                                            @if( !auth()->guest() && auth()->user()->can('browse_admin') )
                                            <li><a href="{{ route('wave.notifications') }}"><span uk-icon="icon: bell"></span>My Notifications</a></li>
                                            @endif
                                            <li><a href="{{ route('logout') }}"><span uk-icon="icon: sign-out"></span>Logout</a></li>
                                        </ul>
                                    </div>
                                </li>

                            @endif
                        </ul>
                        <div id="uk-nav-right-mobile"><span class="more-btn" uk-icon="more-vertical"></span><span class="close-btn uk-icon" uk-icon="close"></span></div>
                    </div>

                </nav>
            </div>
        </div>

        @yield('content')
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer__inner">
                <div class="footer__info">
                    <p class="footer__text">Guide Administrator </p>
                    <p class="footer__text">Contact us via Telegram:<br>

                        JetSetUa<a href="https://t.me/JetSetUa" target="_blank" class="footer-social-icon">
                            <img src="../images/icons/telegram.png" alt="Telegram">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"/></svg> --}}
                        </a></p>
                    <div class="footer__email">Email:
                        <a href="mailto:jet71one@gmail.com">jet71one@gmail.com</a>
                    </div>
                    <div class="footer__phone">
                        {{-- Phone: --}}
                        <img src="../images/icons/viber.png" class="footer-social-icon" alt="Viber">
                        <a href="tel:+380669213266">+38 (066) 921 32 66</a>
                    </div>
                    <div class="footer__whatsapp">
                        {{-- Whatsapp:  --}}
                        <img src="../images/icons/whatsapp.png" class="footer-social-icon" alt="Whatsapp">
                        <a href="https://api.whatsapp.com/send/?phone=380669213266&text&app_absent=0" target="_blank">+38 (066) 921 32 66</a>
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
                        <a href="{{route('about')}}" class="list__link">About</a>
                        <a href="{{route('support')}}" class="list__link">Support Us</a>
                        <a href="{{route('news')}}" class="list__link">News</a>
                        <a href="{{route('events')}}" class="list__link">Events</a>
                        <a href="{{route('contact')}}" class="list__link">Contact</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright">
        <div class="container">
            <div class="copyright__inner">
                © 2019 by PWR. Proudly created with JetSetUa | <a href="{{route('use-terms')}}">Terms of Use</a>   |  <a href="{{route('privacy-policy')}}">Privacy Policy</a>
            </div>
        </div>
    </div>

    {{-- @if(!auth()->guest() && auth()->user()->hasAnnouncements())
        @include('theme::partials.announcements')
    @endif --}}

    <script>base_url = '@php echo \Illuminate\Support\Facades\URL::to('/') @endphp'
        guest = '{{\Illuminate\Support\Facades\Auth::guest()}}';
        id = '{{\Illuminate\Support\Facades\Auth::id()}}';

        role_id = '{{(\Illuminate\Support\Facades\Auth::user()) ? \Illuminate\Support\Facades\Auth::user()->role_id : false}}';</script>>
    <!-- Scripts -->
    <script src="{{ asset('themes/uikit/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/admin-app-custom.js') }}"></script>
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
