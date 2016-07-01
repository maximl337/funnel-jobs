<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Job Bids
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				@if($job->users()->exists())
					
					@foreach($job->users()->get() as $user)
						<div class="row">
							<div class="col-md-12">
								{{ $user->name }}
								@if($user->id == Auth::id())
									<a href="#">Edit</a>
									<a href="#">Remove</a>
								@endif
							</div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row -->
					@endforeach
						
				@else
					<p class="alert alert-warning">
						No Bids on this job
					</p>
				@endif
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel panel-default -->
	</div>
	<!-- /.col-md-12 -->
</div>
<!-- /.row -->