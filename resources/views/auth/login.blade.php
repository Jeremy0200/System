@extends('layouts.app_login')

@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="{{ asset('images/logo.png') }}" alt="logo" style="width:120px;">
              </div>
              <h1 class="text-center" style="font-weight: 800 !important;">Iniciar Sesión</h1>

              <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label for="email">Correo Electrónico</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <!-- reCAPTCHA v2 -->
    <div class="form-group">
        <div class="g-recaptcha" data-sitekey="6LdgpcEqAAAAAMDjq4krp1oV7Uq-wxDrFDuk4xPQ"></div>
        @if ($errors->has('captcha'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('captcha') }}</strong>
            </span>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
</form>

<!-- Script de reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>







@endsection
