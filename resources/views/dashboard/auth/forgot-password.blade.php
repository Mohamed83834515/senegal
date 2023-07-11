@extends('layouts.default', ['title' => 'Mot de passe oublié'])

@section('content')
	<!-- Password recovery form -->
	<form class="login-form" action="index.html">
		<div class="card mb-0">
			<div class="card-body">
				<div class="text-center mb-3">
					<i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
					<h5 class="mb-0">Password recovery</h5>
					<span class="d-block text-muted">We'll send you instructions in email</span>
				</div>

				<div class="form-group form-group-feedback form-group-feedback-right">
					<input type="email" class="form-control" placeholder="Your email">
					<div class="form-control-feedback">
						<i class="icon-mail5 text-muted"></i>
					</div>
				</div>

				<button type="submit" class="btn bg-blue btn-block"><i class="icon-spinner11 mr-2"></i>Reinitialiser</button>
			</div>
		</div>
	</form>
	<!-- /password recovery form -->
@endsection