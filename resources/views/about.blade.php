@extends('theme::layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('content')
<div class="header__text">
    <h1 class="header__title">
        About us
    </h1>
</div>

<div class="about-us">
    <div class="container">
        <div class="about-us__text">
            We greet you, our foreign friends! Our company came to the conclusion that you lack our unique service.
            Now professional top model can be your guide on a guided tour. The tour will be held personally for you,
            it can be planned specially according to your preference. Our top models will communicate with you in
            English. Excursions can be different: historical walk around the city; gastronomic tour; the best clubs
            visiting; extreme entertainment (underground city, skydiving and others); yachting; riding a car or
            limousine. We can organize everything that you can imagine. Just contact our manager and make a
            pre-order!
            <!-- <svg  xmlns="http://www.w3.org/2000/svg" viewBox="11 2.88 156 177.116"><path d="M11 49.399c0 1.625.843 3.139 2.212 4.015l65.275 41.757c.781.5 1.734.752 2.629.752.786 0 1.572-.194 2.286-.585 1.529-.837 2.598-2.44 2.598-4.182V54h27.227C138.477 54 157 74.406 157 101.246v73.983c0 2.633 2.368 4.767 5 4.767s5-2.134 5-4.767v-73.983c0-15.237-5.323-29.223-15.033-39.714C141.99 50.753 128.248 45 113.227 45H86V7.647c0-1.742-1.069-3.345-2.597-4.181-1.527-.837-3.569-.773-5.037.167L13.152 45.385C11.783 46.261 11 47.774 11 49.399zm13.364.001L76 16.356v66.09L24.364 49.4z"/></svg> -->
            <h4 class="about-us__title">
                Watch a video and you'll understand everything
            </h4>
            <video class="video-bg" src="/video/about-us.mp4" controls></video>
        </div>

       
    </div>
    <div class="image-grid">
        <div class="grid-item">
            
            <a data-fancybox="gallery" href="images/about/image-1.jpg"><img src="images/about/image-1.jpg"></a>
        </div>
       
        <div class="grid-item">
            <a data-fancybox="gallery" href="images/about/image-2.jpg"><img src="images/about/image-2.jpg"></a>
        </div>
        <div class="grid-item ">
            <a data-fancybox="gallery" href="images/about/image-3.jpg"><img src="images/about/image-3.jpg"></a>
        </div>
        <div class="grid-item">
            <a data-fancybox="gallery" href="images/about/image-4.jpg"><img src="images/about/image-4.jpg"></a>
        </div>
        <div class="grid-item">
            <a data-fancybox="gallery" href="images/about/image-5.jpg"><img src="images/about/image-5.jpg"></a>
        </div>
        <div class="grid-item">
            <a data-fancybox="gallery" href="images/about/image-6.jpg"><img src="images/about/image-6.jpg"></a>
        </div>
        <div class="grid-item">
            <a data-fancybox="gallery" href="images/about/image-7.jpg"><img src="images/about/image-7.jpg"></a>
        </div>
        <div class="grid-item">
            <a data-fancybox="gallery" href="images/about/image-8.jpg"><img src="images/about/image-8.jpg"></a>
        </div>
      </div>


    {{-- <div class="guide-info">
        <div class="container">
            <div class="guide-info__text">The guides you see on this page are engaged in you.
                If our name is called a guide which is not on this page, we will inform you about this.</div>
        </div>
    </div>
    <div class="guide__inner">
        <div class="guide__slider">
            <div class="guide__item"><img src="images/guide-img-1.jpg" alt="Guide image"></div>
            <div class="guide__item"><img src="images/guide-img-2.jpg" alt="Guide image"></div>
            <div class="guide__item"><img src="images/guide-img-3.jpg" alt="Guide image"></div>
            <div class="guide__item"><img src="images/guide-img-4.jpg" alt="Guide image"></div>
            <div class="guide__item"><img src="images/guide-img-5.jpg" alt="Guide image"></div>
            <div class="guide__item"><img src="images/guide-img-6.jpg" alt="Guide image"></div>
            <div class="guide__item"><img src="images/guide-img-7.jpg" alt="Guide image"></div>
            <div class="guide__item"><img src="images/guide-img-8.jpg" alt="Guide image"></div>

        </div>
        
        <div class="guide__content">
            <div class="guide__container">
                <div class="guide__body">
                    <p class="guide__text">
                        <div class="guide__body-title">
                            Leading Guide - Katarina

                        </div>
                        <p class="guide__body__text">
                            Leading Guide - Katarina.<br>
                            Katarina - prof. model
                        </p>
                        <p class="guide__body__text">
                            She worked on world-class catwalks, represented world brands.<br>

                            Also:

                            Fourth vice miss “Miss Ukraine Universe” 2015<br>

                            Second runner up “Princess of the Globe” 2016<br>

                            Miss photogenic “Photomodel of the World” 2016<br>

                            Grand Champion of senior model “World Championship of Perfoming ARTS” WCOPA U.S.A. 2017<br>
                        </p>

                        

                        Miss “Queen Country” 2017<br>

                        Miss Audience Award “Queen Country” 2017<br>

                        This model can conduct a city tour for you, through historical places of the city and to
                        show you the night life of the city.</p>

                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="guide-right__inner">
    
        <!-- <div class="guide-nav">
            <div class="guide-nav__item"><img src="images/guide-img-1.jpg" alt="Guide image"></div>
            <div class="guide-nav__item"><img src="images/guide-img-2.jpg" alt="Guide image"></div>
        </div> -->
        <div class="guide-right__content">
            <div class="guide__container">
                <div class="guide-right__body">
                    <p class="guide__text">
                        <div class="guide__body-title">
                            Leading Guide - Katarina

                        </div>
                        <p class="guide__body__text">
                            Leading Guide - Katarina.<br>
                            Katarina - prof. model
                        </p>
                        <p class="guide__body__text">
                            This model can conduct a city tour for you, through historical places of the city and to show you  the night life of the city.
                        </p>

                    </p>
                </div>
            </div>
        </div>

        <div class="guide-right__slider">
            <div class="guide-right__item"><img src="images/guide-img-1.jpg" alt="Guide image"></div>
            <div class="guide-right__item"><img src="images/guide-img-2.jpg" alt="Guide image"></div>

        </div>

    
    </div> --}}

    
</div>

<div class="franchise">
    <div class="container">
        <div class="franchise__text">We Need Your Support Today!</div>
        <a href="/support.html" class="btn btn-white">donate</a>
    </div>
</div>

@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="{{ asset('themes/uikit/js/slick.js') }}"></script>

@endsection