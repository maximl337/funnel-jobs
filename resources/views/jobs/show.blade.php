@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Job
				</div>
				<div class="panel-body">
	
					
					<div class="row">
						<div class="col-md-12">
							@if(count($errors) > 0)
								@foreach($errors->all() as $error) 
									<p class="alert alert-danger">
										{{ $error }}
									</p>
								@endforeach		
							@endif	

							@if(Session::has('success'))
								
								<p class="alert alert-success">
									{{ Session::get('success') }}
								</p>
									
							@endif							
						</div>
						<!-- /.col-md-12 -->
					</div>
					<!-- /.row -->
					
					<div class="row">
						<div class="col-md-12">
							@if(Auth::user()->isWorker())
								<!-- Check if user has any bids -->
								@if(!Auth::user()->jobBids()->where('job_id', $job->id)->exists())
									
									@include('jobs.partials._create_bid_form')

									<a href="#" class="btn btn-success" data-toggle="collapse" data-target="#bid_form">Bid on this job</a>
								@endif
							@endif
						</div>
						<!-- /.col-md-12 -->
					</div>
					<!-- /.row -->

					<div class="row">
						<div class="col-md-12">
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
						<!-- /.col-md-12 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.panel-body -->
			</div>
		</div>
	</div>
	<!-- /.row -->

	@include('jobs.partials.bids')

</div>
<!-- /.container -->

@endsection