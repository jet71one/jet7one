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
						<span class="hot-tour__date">{{ $tour->start_date }} - {{ $tour->end_date}}</span>
							<p class="hot-tour__region">{{ $tour->destination }}</p>
							<p class="hot-tour__text">{!! $tour->body !!}</p>
						</div>	
						<div class="hot-tour__footer-content">
							<div class="price">€ {{ $tour->price }}</div>
							<a href="{{ $tour->link() }}" class="btn btn-blue hot-tour__btn">in detail</a>
							{{-- <a href="#" class="btn btn-green hot-tour__btn">registration</a> --}}
						</div>
					</div>

				@endforeach
				
			</div>
		</div>
	</div>

@endsection