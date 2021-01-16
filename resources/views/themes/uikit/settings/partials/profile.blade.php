<form action="{{ route('wave.settings.profile.put') }}" method="POST" enctype="multipart/form-data">
	<div class="uk-text-left" uk-grid>
		<div class="uk-width-1-4 uk-text-left">
			<div id="new_image">
				<img id="preview" src="{{ Voyager::image(auth()->user()->avatar) }}">
				<div uk-form-custom>
				    <input type="file" id="upload">
				    <input type="hidden" id="uploadBase64" name="avatar">
				    <button class="uk-button uk-button-default uk-padding-remove-left uk-padding-remove-right uk-width-1-1 uk-margin-top"><span uk-icon="icon: camera" class="uk-icon"></span></button>
				</div>
			</div>
		</div>
		<div class="uk-width-3-4">
			<div>
				<label class="uk-form-label">Name</label>
				<div class="uk-form-controls">
		            <input class="uk-input" name="name" type="text" placeholder="Name" value="{{ Auth::user()->name }}">
		        </div>
		    </div>
		    <div class="uk-margin-top">
		        <label class="uk-form-label">Email Address</label>
				<div class="uk-form-controls">
		            <input class="uk-input" name="email" type="text" placeholder="Email Address" value="{{ Auth::user()->email }}">
		        </div>
			</div>
			<div class="uk-margin-top">
		        <label class="uk-form-label">Phone</label>
				<div class="uk-form-controls">
					<input class="uk-input" name="phone" type="tel" placeholder="Your phone" value="{{ Auth::user()->phone }}">
		        </div>
			</div>
		 	


			<div class="uk-margin-top">
		        <label class="uk-form-label">About</label>
				<div class="uk-form-controls">
					<textarea class="form-control" name="about" rows="5">{{ Auth::user()->about }}</textarea>

		        </div>
			</div>
			{{-- <div class="uk-margin-top">
				<label class="uk-form-label">Type Tour </label>
				<select name="type_tour" type="select_dropdown" class="form-control" >

					<option value="">-- Select Type Tour --</option>
					@foreach ($typeTours as $tour)
						<option  value="{{ $tour->id }}" {{ $tour->id == $selectedTypeTour ? 'selected' : ''}}> {{ ucfirst($tour->name) }}</option>
					@endforeach
				</select>
			</div> --}}
			{{-- <div class="uk-margin-top">
		        <label class="uk-form-label">Language (English | Russian)</label>
				<div class="uk-form-controls">
		            <input class="uk-input" name="lang" type="text" placeholder="Enter your language" value="{{ Auth::user()->lang }}">
		        </div>
			</div> --}}
			<div class="uk-form-controls">
				<br>
				<div class="clearfix"></div>
			<label for="file">Select a file:</label>
			<input type="file" name="images[]" multiple="multiple" accept="image/*" >
			
				
			</div> 
			@if($images <> null)
				@foreach ($images as $image)
						<img src="../storage/{{ $image }}" alt=""style="width: 100px; height:100px">
				@endforeach
			@endif
			@if (auth()->user()->role_id == '10' )
			

			<div class="uk-margin-top">
				<label class="uk-form-label">Region </label>
				<select name="region_id" type="select_dropdown" class="form-control" >

					<option value="">-- Select Region --</option>
					@foreach ($regions as $region)
						{{-- @foreach ($selectedRegions as $selectedRegion) --}}
						@if ($selectedRegions  !== null)
						<option  value="{{ $region->id }}" 
							@foreach ($selectedRegions as $selectedRegion)
							{{ $region->id == $selectedRegion ? 'selected' : ''}}
							@endforeach
							
							> {{ ucfirst($region->name) }}</option>
						@else 
							@foreach ($regions as $region)
								<option  value="{{ $region->id }}"> {{ ucfirst($region->name) }}</option>

							@endforeach
						@endif
						
							
						{{-- @endforeach --}}

					@endforeach
				</select>
			</div>

			<div class="uk-margin-top">
				<label class="uk-form-label">Type Tour </label>
				<select name="type_tour" type="select_dropdown" class="form-control" >

					<option value="">-- Select Type Tour --</option>
					@foreach ($typeTours as $tour)
						<option  value="{{ $tour->id }}" {{ $tour->id == $selectedTypeTour ? 'selected' : ''}}> {{ ucfirst($tour->name) }}</option>
					@endforeach
				</select>
			</div>
			<div class="uk-margin-top">
		        <label class="uk-form-label">Language (English | Russian)</label>
				<div class="uk-form-controls">
		            <input class="uk-input" name="lang" type="text" placeholder="Enter your language" value="{{ Auth::user()->lang }}">
		        </div>
			</div>
			@else
			
			<input type="hidden" name="region_id" value="0">
			<input type="hidden" name="type_tour" value="0">
			<div class="uk-margin-top">
		        <label class="uk-form-label">Language (English | Russian)</label>
				<div class="uk-form-controls">
		            <input class="uk-input" name="lang" type="text" placeholder="Enter your language" value="{{ Auth::user()->lang }}">
		        </div>
			</div>
			
			
			@endif
			<div class="uk-margin-top">
				<label class="uk-form-label">Region </label>
				<select name="region_id[]" type="select_dropdown" multiple class="form-control select_dropdown" >
					
					<option value="">-- Select Region --</option>
					@foreach ($regions as $region)
						{{-- @foreach ($selectedRegions as $selectedRegion) --}}
						@if ($selectedRegions  !== null)
						<option  value="{{ $region->id }}" 
							@foreach ($selectedRegions as $selectedRegion)
							{{ $region->id == $selectedRegion ? 'selected' : ''}}
							@endforeach
							
							> {{ ucfirst($region->name) }}</option>
						@else 
							@foreach ($regions as $region)
								<option  value="{{ $region->id }}"> {{ ucfirst($region->name) }}</option>

							@endforeach
						@endif
						
							
						{{-- @endforeach --}}

					@endforeach
				</select>
			</div>


			@if ( auth()->user()->role_id == '11'  )
				{{-- @foreach ($selectedRegions as $item)
					{{ $item}}
				@endforeach --}}

			

			<div class="uk-margin-top">
				<label class="uk-form-label">Type Tour </label>
				<select name="type_tour" type="select_dropdown" class="form-control" >

					<option value="">-- Select Type Tour --</option>
					@foreach ($typeTours as $tour)
						<option  value="{{ $tour->id }}" {{ $tour->id == $selectedTypeTour ? 'selected' : ''}}> {{ ucfirst($tour->name) }}</option>
					@endforeach
				</select>
			</div>
			<div class="uk-margin-top">
		        <label class="uk-form-label">Language (English | Russian)</label>
				<div class="uk-form-controls">
		            <input class="uk-input" name="lang" type="text" placeholder="Enter your language" value="{{ Auth::user()->lang }}">
		        </div>
			</div>
			
			
			@endif




			


			
				
			
		</div>
	</div>

	{{ csrf_field() }}

	<button id="submit" class="uk-button uk-button-primary uk-align-right uk-margin-top" dusk="update-profile-button">Save</button>

</form>

<!-- Upload Modal -->
<div id="upload-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-crop">
    	<button class="uk-modal-close uk-modal-close-default uk-close uk-icon" type="button" uk-close></button>
    	<div class="uk-modal-header">
            <h2 class="uk-modal-title">Position and resize your photo</h2>
        </div>
    	<div class="uk-modal-body">
	        <h2 class="uk-modal-title"></h2>
	        <div id="upload-crop-container">
				<div id="upload-crop"></div>
			</div>
		</div>
		<div class="uk-modal-footer uk-text-right uk-padding-small">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary uk-button-small" id="apply-crop" type="button">Apply</button>
        </div>
    </div>

</div>

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
	$(function(){
    $("button#submit").click(function(){
        var $fileUpload = $("input[type='file']");
		console.log($fileUpload);
        if (parseInt($fileUpload.get(0).files.length)>2){
			console.log('You can only upload a maximum of 2 files');
         alert("You can only upload a maximum of 2 files");
        }
    });    
});
</script>
@endsection