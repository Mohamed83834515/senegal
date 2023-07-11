@extends('dashboard.layouts.default', ['title' => 'Changement de mot de passe'])

@section('content')
	<!-- Login form -->

    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="">
	<form  method="POST" action="{{ route('user.change_password') }}">
		@csrf
		@method('PUT')
                <div class="card ">
                    <div class="card-body">

                        <div class="text-center mb-3">
                            <img class="img-fluid mb-3" width="200" src="{{ asset('inter/img/reveil-logo.png') }}" alt="">
                            <h5 class="mb-0">Changement de mot de passe</h5>
                            <span class="d-block text-muted">Saisisser un nouveau mot de passe</span>
                        </div>

                        @if ($errors->any())
                            <div class="alert bg-danger text-white alert-styled-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <ul class="pl-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                        <div class=" input-group input-group-merge">
                            <input name="password" type="password" class="form-control" placeholder="Mot de passe">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>
                         </div>

                        <div class="mb-3">
                        <div class="input-group input-group-merge">
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Confirmation du mot de passe">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-teal btn-block">Changer le mot de passe<i class="icon-circle-right2 ml-2"></i></button>
                        </div>

                    </div>
                </div>
	</form>

</div>
</div>
	<!-- /login form -->
@endsection
