<form id="edit_user" method="POST" action="{{ url('users/'.$user->id) }}" role="form">
	{!! csrf_field() !!}
	<fieldset>
		<legend>Basic info</legend>
		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			<label for="name">Name *</label>
			<input id="name" class="form-control" required="required" type="text" name="name" value="{{ $user->name }}" placeholder="Enter Name" />
			@if ($errors->has('name'))
	            <span class="help-block">
	                <strong>{{ $errors->first('name') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
			<label for="title">Title</label>
			<input id="title" class="form-control" type="text" name="title" value="{{ $user->title }}" placeholder="Enter Title" />
			@if ($errors->has('title'))
	            <span class="help-block">
	                <strong>{{ $errors->first('title') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="avatar">Avatar</label>
			<input id="avatar" class="form-control" type="url" name="avatar" value="{{ $user->avatar }}" placeholder="Profile Picture" />
			@if ($errors->has('avatar'))
	            <span class="help-block">
	                <strong>{{ $errors->first('avatar') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
			<label for="body">About</label>
			<textarea id="body" class="form-control" name="body" rows="5" placeholder="Enter some information about your work and experience">{{ $user->body }}</textarea>
			@if ($errors->has('body'))
	            <span class="help-block">
	                <strong>{{ $errors->first('body') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
			<label for="website">Website</label>
			<input id="website" class="form-control" type="text" name="website" value="{{ $user->website }}" placeholder="Enter Website" />
			@if ($errors->has('website'))
	            <span class="help-block">
	                <strong>{{ $errors->first('website') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
			<label for="tags">Tags</label>
			<span class="helper-block text-muted">Hold ctrl to select multiple</span>
			<select name="tags[]" class="form-control" multiple="multiple">
				@foreach($tags as $tag) 
					<option value="{{ $tag->id }}" 
					@if(in_array($tag->id, $user->tags()->get()->toArray()))
						selected="selected"
					@endif
					>{{ $tag->name }}</option>
				@endforeach
			</select>

			@if ($errors->has('tags'))
	            <span class="help-block">
	                <strong>{{ $errors->first('tags') }}</strong>
	            </span>
	        @endif
		</div>
		
	</fieldset>
	<!-- /fieldset -->
	
	<fieldset>
		<legend>Social Links</legend>	
		<div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
			<label for="facebook">Facebook URL</label>
			<input id="facebook" class="form-control" type="text" name="facebook" value="{{ $user->facebook }}" placeholder="http://www.facebook.com/you" />
			@if ($errors->has('facebook'))
	            <span class="help-block">
	                <strong>{{ $errors->first('facebook') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
			<label for="twitter">Twitter URL</label>
			<input id="twitter" class="form-control" type="text" name="twitter" value="{{ $user->twitter }}" placeholder="http://www.twitter.com/you" />
			@if ($errors->has('twitter'))
	            <span class="help-block">
	                <strong>{{ $errors->first('twitter') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
			<label for="linkedin">Linkedin URL</label>
			<input id="linkedin" class="form-control" type="text" name="linkedin" value="{{ $user->linkedin }}" placeholder="http://www.linkedin.com/you" />
			@if ($errors->has('linkedin'))
	            <span class="help-block">
	                <strong>{{ $errors->first('linkedin') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('googleplus') ? ' has-error' : '' }}">
			<label for="googleplus">Google+ URL</label>
			<input id="googleplus" class="form-control" type="text" name="googleplus" value="{{ $user->googleplus }}" placeholder="http://www.google.com/you" />
			@if ($errors->has('googleplus'))
	            <span class="help-block">
	                <strong>{{ $errors->first('googleplus') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('github') ? ' has-error' : '' }}">
			<label for="github">Github URL</label>
			<input id="github" class="form-control" type="text" name="github" value="{{ $user->github }}" placeholder="http://www.github.com/you" />
			@if ($errors->has('github'))
	            <span class="help-block">
	                <strong>{{ $errors->first('github') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('stackoverflow') ? ' has-error' : '' }}">
			<label for="stackoverflow">Stackoverflow URL</label>
			<input id="stackoverflow" class="form-control" type="text" name="stackoverflow" value="{{ $user->stackoverflow }}" placeholder="http://www.stackoverflow.com/you" />
			@if ($errors->has('stackoverflow'))
	            <span class="help-block">
	                <strong>{{ $errors->first('stackoverflow') }}</strong>
	            </span>
	        @endif
		</div>
	</fieldset>
	<!-- /fieldset -->
	
	<fieldset>
		<legend>Address</legend>
		<div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
			<label for="street">Street</label>
			<input id="street" class="form-control" type="text" name="street" value="{{ $user->street }}" placeholder="123 Dream st." />
			@if ($errors->has('street'))
	            <span class="help-block">
	                <strong>{{ $errors->first('street') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
			<label for="city">City</label>
			<input id="city" class="form-control" type="text" name="city" value="{{ $user->city }}" placeholder="New york" />
			@if ($errors->has('city'))
	            <span class="help-block">
	                <strong>{{ $errors->first('city') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
			<label for="state">State</label>
			<input id="state" class="form-control" type="text" name="state" value="{{ $user->state }}" placeholder="New York" />
			@if ($errors->has('state'))
	            <span class="help-block">
	                <strong>{{ $errors->first('state') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
			<label for="zip">Postal Code</label>
			<input id="zip" class="form-control" type="text" name="zip" value="{{ $user->zip }}" placeholder="M33 UX2" />
			@if ($errors->has('zip'))
	            <span class="help-block">
	                <strong>{{ $errors->first('zip') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="country">Country</label>
			<input id="country" class="form-control" type="text" name="country" value="{{ $user->country }}" placeholder="USA" />
			@if ($errors->has('country'))
	            <span class="help-block">
	                <strong>{{ $errors->first('country') }}</strong>
	            </span>
	        @endif
		</div>	
	</fieldset>
	<!-- /fieldset -->

	
	<div class="form-group">
		<input class="form-control btn btn-primary" type="submit" value="update" />
	</div>

</form>
