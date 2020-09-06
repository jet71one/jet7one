@extends('theme::layouts.app')

@section('content')

<div class="header__text">
		<h1 class="header__title">
			Hot tour
		</h1>
	</div>

	<div class="hot-tour">
		<div class="container">
			<div class="hot-tour__inner">
				@foreach ($tours as $tour)
					<div class="hot-tour__item">
						<img src="storage/{{ $tour->image }}" alt="Hot tour" class="hot-tour__img">
						<div class="hot-tour__content">
						<h3 class="hot-tour__title">{{ $tour->title }}1</h3>
							<span class="hot-tour__date">{{ $tour->date }}</span>
							<p class="hot-tour__region">{{ $tour->destination }}</p>
							<p class="hot-tour__text">{!! $tour->body !!}</p>
						</div>	
						<div class="hot-tour__footer-content">
							<div class="price">€ {{ $tour->price }}</div>
							<a href="#" class="btn btn-green hot-tour__btn">in detail</a>
							<a href="#" class="btn btn-green hot-tour__btn">registration</a>
						</div>
					</div>

				@endforeach
				
				
				
				<div class="hot-tour__item">
					<img src="images/file-2.jpg" alt="Hot tour" class="hot-tour__img">
					<div class="hot-tour__content">
						<h3 class="hot-tour__title">Wine tour</h3>
						<span class="hot-tour__date">01/19 - 01/21</span>
						<p class="hot-tour__region">Ukraine - Odessa - Moldova</p>
						<p class="hot-tour__text">Group of 5 to 10 people
	
							The price includes transfer, lunch, wine tasting. Transfer to Moldova and back
							
							Price is per person</p>
					</div>
				
					<div class="hot-tour__footer-content">
						<div class="price">€ 150</div>
						<a href="#" class="btn btn-green hot-tour__btn">in detail</a>
						<a href="#" class="btn btn-green hot-tour__btn">registration</a>
					</div>
				</div>
				<div class="hot-tour__item">
					<img src="images/file-3.jpg" alt="Hot tour" class="hot-tour__img">
					<div class="hot-tour__content">
						<h3 class="hot-tour__title">Wine tour</h3>
						<span class="hot-tour__date">01/19 - 01/21</span>
						<p class="hot-tour__region">Ukraine - Odessa - Moldova</p>
						<p class="hot-tour__text">Group of 5 to 10 people
	
							The price includes transfer, lunch, wine tasting. Transfer to Moldova and back
							
							Price is per person</p>
					</div>
				
					<div class="hot-tour__footer-content">
						<div class="price">€ 150</div>
						<a href="#" class="btn btn-green hot-tour__btn">in detail</a>
						<a href="#" class="btn btn-green hot-tour__btn">registration</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection