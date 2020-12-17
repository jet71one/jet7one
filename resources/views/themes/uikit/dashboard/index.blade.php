@extends('theme::layouts.admin-app')


@section('content')

	<div class="uk-container">


		<div class="uk-child-width-1-2@m uk-grid-match uk-margin-top" uk-grid>
			<div>

				<div class="uk-card uk-card-default">
				    <div class="uk-card-header">
				        <div class="uk-grid-small uk-flex-middle" uk-grid>
				            <div class="uk-width-auto">
				                <div uk-icon="icon: happy; ratio: 2.8" class="welcome-icon"></div>
				            </div>
				            <div class="uk-width-expand">
				                <h3 class="uk-card-title uk-margin-remove-bottom uk-blue">Welcome to your Dashboard</h3>
				                <p class="uk-text-meta uk-margin-remove-top">Learn More Below</p>
				            </div>
				        </div>
				    </div>
				    <div class="uk-card-body">
				        <p>We greet you, our foreign friends! Our company came to the conclusion that you lack our unique service. Now professional top model can be your guide on a guided tour. The tour will be held personally for you, it can be planned specially according to your preference. Our top models will communicate with you in English. Excursions can be different:
							<ul>
								<li> historical walk around the city;</li>
								<li> gastronomic tour; the best clubs visiting;</li>
								<li> extreme entertainment (underground city, skydiving and others);</li>
								<li> yachting;</li>
								<li> riding a car or limousine.</li>
							</ul>
							 <strong>We can organize everything that you can imagine.</strong></p>
				    </div>
				    <div class="uk-card-footer">
				        <a href="{{ route('wave.settings', 'profile') }}" class="uk-button uk-button-text">Your profile</a>
				    </div>
				</div>
			</div>

			{{-- <div>

				<div class="uk-card uk-card-default">
				    <div class="uk-card-header">
				        <div class="uk-grid-small uk-flex-middle" uk-grid>
				            <div class="uk-width-auto">
				                <div uk-icon="icon: play-circle; ratio: 2.8" class="welcome-learn-more-icon"></div>
				            </div>
				            <div class="uk-width-expand">
				                <h3 class="uk-card-title uk-margin-remove-bottom uk-blue"> Learn more about Wave</h3>
				                <p class="uk-text-meta uk-margin-remove-top uk-light-text">Are you more of a visual learner?</p>
				            </div>
				        </div>
				    </div>
				    <div class="uk-card-body">
				        <p>Make sure to head on over to the Wave Video Tutorials to learn more how to use and customize Wave.<br><br>Click on the button below to checkout the video tutorials.</p>
				    </div>
				    <div class="uk-card-footer">
				        <a href="https://devdojo.com/series/wave" target="_blank" class="uk-button uk-button-text">Watch the Videos</a>
				    </div>
				</div>
			</div> --}}


		</div>

	</div>

@endsection