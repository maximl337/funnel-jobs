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

									<div class="row">
										<div class="col-md-12">
											<a class="btn btn-primary btn-small pull-left" href="{{ url('bids/' . $job->id . '/edit') }}">Edit</a>
									
											<form method="POST" action="{{ url('bids/' . $job->id) }}">

												{!! csrf_field() !!}
												{!! method_field('DELETE') !!}
												<input type="submit" class="btn btn-danger btn-small" value="Remove">
												
											</form>		
										</div>
										<!-- /.col-md-12 -->	
									</div>
									<!-- /.row -->	
									
									
				
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