<form method="POST" action="{{ url('jobs/' . $job->id) }}" role="form">
	{!! csrf_field() !!}
	{!! method_field('PUT') !!}
	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		<label for="title">Title</label>
		<input required id="title" class="form-control " type="text" name="title" value="{{ $job->title }}" placeholder="" />

		@if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
	</div>
	
	<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
		<label for="body">Description</label>
		<textarea required id="body" class="form-control" name="body" rows="5">{{ $job->body }}</textarea>

		@if ($errors->has('body'))
            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
		<label for="tags">Tags</label>
		<span class="helper-block text-muted">Hold ctrl to select multiple</span>
		<select name="tags[]" class="form-control" multiple="multiple">
			@foreach($tags as $tag) 
				<option value="{{ $tag->id }}" 
				@if(in_array($tag->id, $job->tags()->get()->toArray()))
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

	<div class="form-group">
		<input class="form-control btn btn-primary" type="submit" value="Submit" />
	</div>
</form>
					