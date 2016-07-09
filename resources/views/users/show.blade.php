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
									<a href="#" class="btn btn-primary"><i class="fa fa-message"></i> Send Message</a>

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


@endsection