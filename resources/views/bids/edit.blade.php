@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Bid
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">

					@if(Session::has('success'))
						<p class="alert alert-success">
							{{ Session::get('success') }}
						</p>
					@endif
					
					<form id="edit_bid" method="POST" action="{{ url('bids/' . $bid->id) }}" role="form">

						{!! csrf_field() !!}
						<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
							<label for="">Amount</label>
							<input required class="form-control " type="number" min="1" name="amount" 
									value="{{ number_format((float)$bid->pivot->bid_amount, 2, '.', '') }}" placeholder="Enter Bid amount" />
							@if ($errors->has('amount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
							<label for="">Message</label>
							<textarea required class="form-control" name="message" rows="10" placeholder="">{{ $bid->pivot->bid_message }}</textarea>
							@if ($errors->has('message'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="form-group">
							<input class="form-control btn btn-primary" type="submit"  value="Update" />
						</div>
						
					</form>
					

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