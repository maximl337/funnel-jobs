@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Select your skills
				</div>
				<div class="panel-body">
					<form id="add_tags" method="POST" action="{{ url('/tags') }}" role="form">
						{!! csrf_field() !!}
						
						@if ($errors->has('tags'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tags') }}</strong>
                            </span>
                        @endif
                        
						@foreach(array_chunk($tags->toArray(), 3) as $tag_row)
							<div class="row">
								@foreach($tag_row as $tag)
									<div class="col-md-4 form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
										<div class="checkbox">
											<label class="checkbox">
	                                            <input type="checkbox" name="tags[]" value="{{ $tag['id'] }}"> {{ $tag['name'] }}
	                                        </label>
										</div>
									</div>
								@endforeach
							</div>
							<!-- /.row -->
						@endforeach	

						
	
						<div class="form-group">
							<input class="form-control btn btn-primary" type="submit" value="Save" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection