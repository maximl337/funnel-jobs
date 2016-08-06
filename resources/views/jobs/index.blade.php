@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Jobs
				</div>
				<div class="panel-body">

					<div class="row">
						<div class="col-md-12">
							<form id="" method="GET" action="{{ url('jobs') }}" role="form">
								{!! csrf_field() !!}
								<div class="input-group">
									<input type="text" class="form-control" name="query" placeholder="Search for Jobs">
									<span class="input-group-btn">
										<button class="btn btn-primary" type="submit">Go!</button>
									</span>
								</div>
							</form>
							
						</div>
					</div>

					@if(Session::has('message'))
						<p class="alert alert-success">{{ Session::get('message') }}</p>
					@endif

					@foreach($jobs as $job)
						
						<h2><a href="{{ url('jobs/' . $job->id) }}">{{ $job->title }}</a></h2>

						<p>{{ str_limit($job->body, 150) }}</p>

						<p class="text-muted">
							@foreach($job->tags as $tag)
								<span class="label label-default">{{ $tag->name }}</span>
							@endforeach
						</p>

						<hr />

					@endforeach
				</div>
				<div class="panel-footer">
					{{ $jobs->render() }}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection