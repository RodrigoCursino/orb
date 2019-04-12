@extends('layouts.master')

@section('app_css')
    <!-- Styles -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('body')
    <div id="particles-js"></div>
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img"
                 class="profile-img-card"
                 src="https://webmail.convex.com.br/skins/classic/images/roundcube_logo.png"
            />
            <p id="profile-name"
               class="profile-name-card"
            >

            </p>
            <form class="form-signin"  method="POST" action="{{ route('login') }}">
                @csrf
                <span id="reauth-email"
                      class="reauth-email"
                ></span>
                <input type="email"
                       id="inputEmail"
                       class="form-control"
                       placeholder="Usuario"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autofocus
                >
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <input type="password"
                       id="inputPassword"
                       class="form-control"
                       name="password"
                       placeholder="Senha"
                       required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox"
                               name="remember" id="remember"
                               {{ old('remember') ? 'checked' : '' }}
                               value="remember-me"
                        > Lembrar senha
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->

@endsection

@section('app_js')
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS.load('particles-js', '/js/particles.json', function() {
            console.log('callback - particles.json config loaded');
        });
    </script>
@endsection
