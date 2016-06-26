@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					Create a Job
				</div>
				<div class="panel-body">
					<form method="POST" action="{{ url('jobs') }}" role="form">
						{!! csrf_field() !!}
						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title">Title</label>
							<input required id="title" class="form-control " type="text" name="title" value="" placeholder="" />

							@if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
						</div>
						
						<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
							<label for="body">Description</label>
							<textarea required id="body" class="form-control" name="body" rows="5"></textarea>

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
									<option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection