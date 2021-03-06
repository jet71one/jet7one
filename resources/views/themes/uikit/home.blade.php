@extends('theme::layouts.app')


@section('css')

@endsection
<link href="{{ asset('themes/uikit/css/animate.css') }}" rel="stylesheet">

@section('content')

<div class="intro" style="background-image: url('images/intro-bg.jpg');">

		<div class="intro__inner">
			<div class="intro__title animated fadeInRight delay-1s" style="-webkit-text-stroke: 1px #6b64db;">
				CHOOSE YOUR LOCAL GUIDE AND DISCOVER NEW CITY
			</div>
		</div>
</div>

<div class="social">
	<a href="https://www.facebook.com/jet71one/?modal=admin_todo_tour" class="social__item" target="_blank">
		<img src="images/icons/facebook-f.svg" alt="Facebook">
	</a>

	<a href="https://youtube.com/channel/UCOaCo8-5R0gGlBnk80ULS8A" class="social__item" target="_blank">
		<img src="images/icons/youtube.svg" alt="Youtube">
	</a>
	<a href="https://mobile.twitter.com/Jet7One" class="social__item" target="_blank">
		<img src="images/icons/twitter.svg" alt="Twitter">
	</a>
	<a href="https://www.instagram.com/jet_7_one/" class="social__item" target="_blank">
		<img src="images/icons/instagram.svg" alt="Instagram">
	</a>
</div>

<div class="destinations">
	<div class="destination__inner">
		@foreach ($blues as $item)

			<div class="destination__item blue  animated fadeInUp delay-0.5s ">
				<div class="destination__title">
					<a  class="destination__title"href="{{ $item->link() }}">{{ $item->name}} </a>
				</div>
				<div class="destination__desc">choose your tour</div>
			</div>

		@endforeach

		@foreach ($roses as $item)

		<div class="destination__item rose  animated fadeInUp delay-0.5s ">
			<div class="destination__title">
				<a  class="destination__title"href="{{ $item->link() }}">{{ $item->name}} </a>
			</div>
			<div class="destination__desc">choose your tour</div>
		</div>
		@endforeach

		@foreach ($dark_blues as $item)

		<div class="destination__item dark-blue animated fadeInUp delay-0.5s">
			<div class="destination__title">
				<a  class="destination__title"href="{{ $item->link() }}">{{ $item->name}} </a>
			</div>
			<div class="destination__desc"> choose your tour</div>
		</div>

		@endforeach
		<div class="destination__item dark-blue animated fadeInUp delay-0.5s">
		<a href="{{route('franchize')}}">
				<div class="destination__desc">Here could be your </br> country and your city</div>
			</a>

		</div>

	</div>
</div>

<div class="consultant" style="background: linear-gradient(#0006,#00000080),url(images/consultant-bg.jpg) no-repeat center center;background-size: cover">

	<div class="container ">
		<h2 class="consultant__title">constant offers</h2>
		<div class="consultant__inner">

			@foreach ($events as $event)
			<div class="consultant__item animated fadeInLeft delay-1s " data-wow-delay="0.1s">
				<img class="consultant__image" src="{{ $event->showImage() }}" alt="Consultant image">
				<h3 class="consultant__text">
				<a href="{{ $event->link() }}">{{ $event->title }}</a>

				</h3>

				<!--<div class="consultant__content">
					<span>
						<svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19" role="img" aria-label="Views count" class="blog-icon-fill"><title></title><path d="M18.6514224,10.4604595 C17.3924224,11.9688254 13.9774224,15.4790227 9.46342244,15.5 L9.42442244,15.5 C6.26242244,15.5 3.20842244,13.7938483 0.345422443,10.4264963 C-0.115140814,9.88163847 -0.115140814,9.08439833 0.345422443,8.5395405 C1.60442244,7.03117456 5.01942244,3.52097727 9.53342244,3.5 L9.57342244,3.5 C12.7354224,3.5 15.7894224,5.20615167 18.6524224,8.5735037 C19.1122856,9.11875503 19.1118633,9.91569484 18.6514224,10.4604595 Z M17.8674224,9.2228003 C15.2084224,6.09518855 12.4194224,4.50990594 9.57442244,4.50990594 L9.54042244,4.50990594 C5.46142244,4.52888537 2.30642244,7.78335969 1.14042244,9.18084575 C0.991393136,9.3517953 0.988008897,9.60533857 1.13242244,9.78019645 C3.79142244,12.9078082 6.58142244,14.4920919 9.42542244,14.4920919 L9.46042244,14.4920919 C13.5394224,14.4741114 16.6934224,11.2196371 17.8604224,9.822151 C18.0095734,9.6511131 18.0125381,9.39726759 17.8674224,9.2228003 L17.8674224,9.2228003 Z M9.49942244,13.3932823 C7.35251405,13.3646853 5.63255349,11.6080263 5.65157552,9.46333471 C5.67059754,7.31864313 7.42144652,5.59270141 9.56852513,5.6021069 C11.7156037,5.61151239 13.4512316,7.35272696 13.4514224,9.49750271 C13.4349115,11.6625186 11.6668124,13.4054651 9.49942244,13.3932823 L9.49942244,13.3932823 Z M9.49942244,6.61762258 C7.91092198,6.63961751 6.63891624,7.93990193 6.65354481,9.52676854 C6.66817338,11.1136351 7.96393479,12.3902997 9.55257137,12.3830695 C11.1412079,12.3758393 12.4252698,11.0874333 12.4254224,9.50049946 C12.4127657,7.89797688 11.1037033,6.60820738 9.49942244,6.61762258 L9.49942244,6.61762258 Z"></path></svg>
					17
					</span>
					<span class="consultant__content-text">Comments</span>
					<span class="consultant__content-heart">
						<svg class="heart" xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19" role="img"><path d="M9.44985848,15.5291774 C9.43911371,15.5362849 9.42782916,15.5449227 9.41715267,15.5553324 L9.44985848,15.5291774 Z M9.44985848,15.5291774 L9.49370677,15.4941118 C9.15422701,15.7147757 10.2318883,15.0314406 10.7297038,14.6971183 C11.5633567,14.1372547 12.3827081,13.5410755 13.1475707,12.9201001 C14.3829188,11.9171478 15.3570936,10.9445466 15.9707237,10.0482572 C16.0768097,9.89330422 16.1713564,9.74160032 16.2509104,9.59910798 C17.0201658,8.17755699 17.2088969,6.78363112 16.7499013,5.65913129 C16.4604017,4.81092573 15.7231445,4.11008901 14.7401472,3.70936139 C13.1379564,3.11266008 11.0475663,3.84092251 9.89976068,5.36430396 L9.50799408,5.8842613 L9.10670536,5.37161711 C7.94954806,3.89335486 6.00516066,3.14638251 4.31830373,3.71958508 C3.36517186,4.00646284 2.65439601,4.72068063 2.23964629,5.77358234 C1.79050315,6.87166888 1.98214559,8.26476279 2.74015555,9.58185512 C2.94777753,9.93163559 3.23221417,10.3090129 3.5869453,10.7089994 C4.17752179,11.3749196 4.94653811,12.0862394 5.85617417,12.8273544 C7.11233096,13.8507929 9.65858244,15.6292133 9.58280954,15.555334 C9.53938013,15.5129899 9.48608859,15.5 9.50042471,15.5 C9.5105974,15.5 9.48275828,15.5074148 9.44985848,15.5291774 Z"></path></svg>

					</span>

				</div>-->
			</div>
			@endforeach

		</div>
		<a href="{{route('events')}}" class="btn">Read More</a>
	</div>
</div>

<div class="franchise animated fadeInRight delay-2s">
	<div class="container">
		<div class="franchise__text">You can buy a franchise for your city or your country.</div>
		<a href="{{route('franchize')}}" class="btn btn-white">in detail</a>
	</div>
</div>

<div class="upcoming-events">
	<div class="container">
		<div class="events__title">
			News
		</div>
		<div class="consultant__inner">

			@foreach ($news as $item)
				<div class="consultant__item animated fadeInLeft delay-1s " data-wow-delay="0.1s">
						<img class="consultant__image" src="{{ $item->image() }}" alt="Consultant image">
					<h3 class="consultant__text">
						<a href="{{ $item->link() }}">{{ $item->title }}</a>
					</h3>
				</div>
			@endforeach
		</div>
		<a href="{{route('news')}}" class="btn">More news</a>
	</div>
</div>

<div class="join-us">
	<div class="join-us__inner">
		<div class="join-us__content animated fadeInLeft delay-2s">
			<h4 class="join-us__title">Join Us</h4>
			<p class="join-us__text">We are looking for local guides in different countries and cities<br> Contact us<br></p>
			<a href="{{route('contact')}}" class="btn">Contact</a>
		</div>
		<img class="join-us-image animated fadeInRight delay-2s" src="images/join-us-bg.jpg" alt="Join us">
	</div>

</div>





@endsection
