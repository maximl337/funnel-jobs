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
							<div class="col-md-1">
								<img style="width:100%" src="{{ $user->avatar ?: 'http://i.imgur.com/zgFv3GQ.jpg' }}">
							</div>
							<div class="col-md-8">
								{{ $user->name }}
								{{ $user->jobBids()->where("job_id", $job->id)->first()->pivot->accepted_at }}
							</div>
							<div class="col-md-3">
								@if(is_null($user->jobBids()->where("job_id", $job->id)->first()->pivot->accepted_at))
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
										
									@elseif($job->user_id == Auth::id())
										
										<form method="POST" action="{{ url('bids/' . $job->id . '/accept') }}">

											{!! csrf_field() !!}
											
											<input type="hidden" name="user_id" value="{{ $user->id }}">
											<input type="submit" class="btn btn-success btn-sm" value="Accept">
											
										</form>	

									@endif
								@else
									@if(!is_null($user->jobBids()->where("job_id", $job->id)->first()->pivot->accepted_at))
										<p class="label label-success"><i class="fa fa-bookmark" aria-hidden="true"></i> Awarded</p>
									@endif
								@endif
							</div>
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