@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					User profile
					@if($user->id == Auth::id())
						<a href="{{ url('users/'.$user->id.'/edit') }}" class="pull-right"><i class="fa fa-pencil"></i> Edit profile</a>
					@endif
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row basic-info">
						<div class="col-md-2">
							<img style="width:100%" src="{{ $user->avatar ?: 'http://i.imgur.com/zgFv3GQ.jpg' }}">
						</div>
						<!-- /.col-md-4 -->
						<div class="col-md-8">
							<h2>{{ $user->name }}</h2>
							<h4>{{ $user->title ?: "" }}</h4>
							<p>{{ $user->body ?: "" }}</p>
						</div>
						<!-- /.col-md-8 -->
						<div class="col-md-2">
							<div class="row">
								
								
								<div class="col-md-12">
									Joined: {{ $user->created_at->diffForHumans() }}
								</div>
								<!-- /.col-md-12 -->

								<div class="col-md-12">
									
								</div>
								<!-- /.col-md-12 -->
								
								<div class="col-md-12">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
									 <i class="fa fa-message"></i> Send Message
									</button>

								</div>
								<!-- /.col-md-12 -->
							</div>
							<!-- /.row -->
						</div>
					</div>
					<!-- /.row basic-info -->
					
					@if(count($user->tags->toArray()) > 0)
						<div class="row">
							<div class="col-md-12">
								<h3>
									Tags
								</h3>
								
								@foreach(array_chunk($user->tags->toArray(), 3) as $tagRow)
									<div class="row">
										@foreach($tagRow as $tag)
											<div class="col-md-4">
												{{ $tag['name'] }}
											</div>
										@endforeach
									</div>
								@endforeach
							</div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row -->
					@endif
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


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Send Message</h4>
			</div>
			<div class="modal-body">
				
				<form id="send_message" method="POST" action="{{ url('message/send') }}" role="form">
					
					{!! csrf_field() !!}

					<input type="hidden" name="recipient_id" value="{{ $user->id }}">

					<div class="form-group">
						<label for="message">Message</label>
						<textarea id="message" class="form-control" name="message" rows="10" placeholder="Enter your message"></textarea>
					</div>
					
					<div class="form-group">
						<input class="form-control btn btn-primary" type="submit" value="Send" />
					</div>
				</form>
				
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
@endsection