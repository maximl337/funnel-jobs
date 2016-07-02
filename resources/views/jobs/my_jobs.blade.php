@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Jobs
					<a href="{{ url('jobs/create') }}" class="pull-right">Create Job</a>
				</div>
				<div class="panel-body">

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