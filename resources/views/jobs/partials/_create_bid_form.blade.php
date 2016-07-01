<form class="collapse" id="bid_form" method="POST" action="{{ url('jobs/' . $job->id . '/bid') }}" role="form">
	{!! csrf_field() !!}

		
	<div class="form-group">
		<input id="" class="form-control " type="text" name="amount" required value="" placeholder="Enter Bid amount" />
	</div>
	
	<div class="form-group">
		<textarea id="" class="form-control" name="message" required rows="5" placeholder="Enter a message"></textarea>
	</div>

	<div class="form-group">
		<input class="form-control btn btn-primary" type="submit" value="Post Bid" />
	</div>
	
</form>
