@extends('dashboard.layouts.default', ['title' => 'Connexion'])

@section('content')
          <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              {{-- <div class="app-brand justify-content-center">
                <a href="#" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-body fw-bolder">BIENVENUE SUR LE SSISE</span>
                </a>
              </div> --}}
              <!-- /Logo 👋-->
              <div class="text-center">

              <h6 style="font-size: 16px;color:#e79300;" class="mb-2">BIENVENUE SUR LE SSISE </h6>
              <h5 class="mb-2">Connexion </h5>
              <p class="mb-3">Entrer vos identifiants</p>
			  @if ($errors->any())
			  <div class="alert bg-danger text-white alert-styled-left alert-dismissible">
				  <button type="button" class="btn btn-link text-white close" data-bs-dismiss="alert"><span>X</span></button>
				  <ul class="pl-1">
					  @foreach ($errors->all() as $error)
						  <li>{{ $error }}</li>
					  @endforeach
				  </ul>
			  </div>
		     @endif
            </div>
              <form  class="mb-3" action="{{ route('login') }}" method="POST">
                @csrf
		        @method('POST')

                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="login" required
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                 <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="Mot de passe"
                      aria-describedby="password"  required
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <small class="form-check-label" for="remember-me">Se souvenir de moi </small>
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn col-10" style="font-size: 16px;color:#171743;background:#e79300 !important" type="submit">Se connecter<i class="fas fa-chevron-circle-right col-2">  </i></button>
                </div>
              </form>
            </div>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
  </div>


  @endsection


	{{-- <form class="login-form" method="POST" action="{{ route('login') }}">
		@csrf
		@method('POST')

		<div class="card mb-0">
			<div class="card-body">

				<div class=id="formAuthentication""text-center mb-3">
					{{-- <img class="img-fluid mb-3" width="200" src="{{ asset('inter/img/ruche.png') }}" alt="">
					<h2 style="color:#e79300">BIENVENUE SUR LE SSISE</h2>
					<h5 class="mb-0">Connexion</h5>
					<span class="d-block text-muted">Entrer vos identifiants</span>
				</div>



				<div class="form-group form-group-feedback form-group-feedback-left">
					<input id="email" name="email" type="text" class="form-control" placeholder="login" value="{{ old('email') }}" required>
					<div class="form-control-feedback">
						<i class="icon-user text-muted"></i>
					</div>
				</div>

				<div class="form-group form-group-feedback form-group-feedback-left">
					<input name="password" type="password" class="form-control" placeholder="Mot de passe">
					<div class="form-control-feedback">
						<i class="icon-lock2 text-muted"></i>
					</div>
				</div>

				<div class="form-group form-group-feedback form-group-feedback-left">
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" name="remember" class="form-check-input-styled" data-fouc>
							Se souvenir de moi ?
						</label>
					</div>
				</div>

				<div class="form-group">
					<button type="submit" class="btn bg-teal btn-block">Se connecter<i class="icon-circle-right2 ml-2"></i></button>
				</div>

				{{-- <div class="text-center">
					<a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
				</div>
			</div>
		</div>
	</form> --}}
	<!-- /login form -->
