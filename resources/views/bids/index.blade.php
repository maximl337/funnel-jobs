@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Your job bids
				</div>
				<div class="panel-body">
					<div class="row">
						@foreach($jobs as $job)
							<div class="col-md-12">
								<h2><a href="{{ url('jobs/' . $job->id) }}">{{ $job->title }}</a></h2>

								<p>{{ str_limit($job->body, 150) }}</p>
								
								<p>Bid Amount: ${{ number_format($job->pivot->bid_amount, 2) }} USD</p>

								<p>Bid Message: {{ $job->pivot->bid_message }}</p>
								<hr />
							</div>
						@endforeach
					</div>
					<!-- /.row -->

					<div class="row">
						<div class="col-md-12">
							{!! $jobs->render() !!}
						</div>
						<!-- /.col-md-12 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel panel-default -->
		</div>
		<!-- /.col-md-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /.container -->


@endsection