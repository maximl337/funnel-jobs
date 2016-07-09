@extends('layouts.app')

@section('content')

<div class="container ">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Profile
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					
					@include('users.partials._edit_form')

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel panel-default -->
		</div>
		<!-- /.col-md-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /.container  -->


@endsection