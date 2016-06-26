@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					Job
				</div>
				<div class="panel-body">
					<h2>{{ $job->title }}</h2>
					<p>
						<em>posted by: {{ $job->user->name }}</em>
					</p>
					<p>
						@foreach($job->tags as $tag)
							<span class="label label-primary">{{ $tag->name }}</span>
						@endforeach
					</p>
					<p>
						{{ $job->body }}
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection