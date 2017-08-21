@extends('template')
@section('title')
	Main
@stop
@section('content')
	@if(old('url'))
		<div class="alert alert-success link-saved-warning">
			<strong>Done!</strong>
			Your url has been saved and shared with the world! :)
		</div>
	@endif
	@if(session('errorMessage'))
		<div class="alert alert-danger margin-top-1-em">
			<strong>Error! :(</strong>
			{{session('errorMessage')}}
		</div>
	@endif
	<div class="col-md-10 col-sm-10 col-md-offset-2">
		<div>
			<h3>Share a link with the world, and access a random one!</h3>
		</div>
		<div class="container-fluid main-link-form">
			<form action="/link" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="col-md-5">
					<input class="form-control" type="text" name="name" placeholder="Name" required>
				</div>
				<div class="col-md-5">
					<input class="form-control" type="text" name="url" placeholder="URL" required>
				</div>
				<div class="col-md-10 margin-top-1-em">
					<input class="form-control btn btn-primary" type="submit" name="submit" value="Share">
				</div>
			</form>
		</div>
		<div class="col-md-10">
			<a class="form-control btn btn-success" href="/random" target="_blank">Random link of the day</a>
		</div>

		@if(isset($links))
				<div class="container col-md-10">
					<h3 class="centralized">Last Links</h3>
					@foreach($links as $l)
						<div class="panel panel-default">
							<div class="panel-body">
								<a href="/links/{{$l->id}}" target="_blank">{{$l->name}} ({{$l->redirects}} click(s))</a>
							</div>
						</div>
					@endforeach
				</div>
		@endif
	</div>
@stop