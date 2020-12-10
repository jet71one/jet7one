@extends('theme::layouts.app')

@section('content')

     <div class="header__text">
        <h1 class="header__title">
            {{ $post->title }}
        </h1>
    </div>
    <div class="container">
        
        <div class="uk-container blog-container uk-container-small">
            <article id="post-{{ $post->id }}" class="uk-article post-{{ $post->id }} uk-text-center uk-margin-large-bottom">
                
                <meta property="name" content="{{ $post->title }}">
                <meta property="author" typeof="Person" content="admin">
                <meta property="dateModified" content="{{ Carbon\Carbon::parse($post->updated_at)->toIso8601String() }}">
                <meta class="uk-margin-remove-adjacent" property="datePublished" content="{{ Carbon\Carbon::parse($post->created_at)->toIso8601String() }}">
                
                <div class="uk-margin-large-bottom">
                    <img class="blog-image" src="{{ $post->image() }}" alt="{{ $post->title }}" srcset="{{ $post->image() }}">
                </div>
                
                <div class="uk-margin-medium-bottom uk-container uk-container-small uk-text-center">    
                    <h1 class="uk-article-title uk-margin-remove-top">{{ $post->title }}</h1>
                    <p class="uk-article-meta">Written on <time datetime="{{ Carbon\Carbon::parse($post->created_at)->toIso8601String() }}">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</time>. 
                        {{-- Posted in <a href="{{ route('wave.blog.category', $post->category->slug) }}" rel="category">{{ $post->category->name }}</a>. --}}
                    </p>       
                </div>
                    
                <div class="uk-container uk-container-small uk-text-left">
                    
                    {!! $post->body !!}
                    
                </div>

               <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_linkedin"></a>
                    <a class="a2a_button_copy_link"></a>
                </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <!-- AddToAny END -->
                {{-- @include('theme::partials.comments') --}}
            </article>
        </div>


    </div>
    <div class="container blog_container">
        <div class="recent__inner">
            <div class="title"><h3>Recent Posts</h3> </div>
            <div class="link"> <a href="{{ route('news')}}">See all</a></div>
        </div>
       
        <div class="consultant__inner">
            @foreach($featured_posts as $post)
            <div class="consultant__item animated fadeInLeft delay-1s " data-wow-delay="0.1s">
                    <img class="consultant__image" src="{{ $post->image() }}" alt="Consultant image">
                <h3 class="consultant__text">
                    <a href="{{ $post->link() }}">{{ $post->title }}</a>	
                </h3>
            </div>
            @endforeach

        </div>
    </div>

@endsection