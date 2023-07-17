@extends('layouts.app')
@php
$dane['status'] = 1;
@endphp
@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-body p-5">
                    <p class="text-center">
                        <!-- <img class="mx-auto element rounded-circle" src="https://wirtualne-pomorze.pl/portal/img/WP-logo250.png" style="width: 125px"> -->
                        <img class="mx-auto element" src="{{ asset('img/logo-kolo.png') }}" style="width: 125px">
                    </p>
                    <div class="text-center">
            			<h1 class="h4 mb-4">Zaloguj się do panelu!</h1>
            		</div>
                    <div class="row py-4">
                        @include('layouts.partials.alert')
                        @if($dane['status'] == 0)
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <h5><i class="fas fa-ban"></i> <b>Uwaga!</b></h5>
                                Brak możliwości zalogowania się do panelu!<br>
                                Dostęp do panelu tylko dla <b>uprawnionych!</b><br>
                                <b>Powód: </b><?php echo $dane['powod'];?><br>
                                <hr>
                                <small class="mb-0">Poinformował <b>System Wirtualnego Pomorza</b> w dniu <?php echo $dane['updated_at'];?></small>
                            </div>
                        </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-outline mb-4">
                            <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" required>
                            <label class="form-label" for="email">E-mail</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" value="{{ old('password') }}" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Hasło" required>
                            <label class="form-label" for="password">Hasło</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- 2 column grid layout -->
                        <div class="row mb-4">
                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-3 mb-md-0">
                                    <input class="form-check-input" type="checkbox" value="" name="remember" id="loginCheck" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="loginCheck"> Zapamiętaj mnie </label>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Simple link -->
                                <a href="{{ route('password.request') }}">Zapomniałeś hasła?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4"><i class="fas fa-sign-in-alt"></i> Zaloguj się</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            @if(Route::has('register'))
                                <p>Nie masz konta?  <a href="{{ route('register') }}">Zarejestruj się</a></p>
                            @endif
                            <p>lub zarejestruj się przez :</p>
                            @include('auth.includes.socialite')
                        </div>
                    </form>
                </div>
            </div>
            <div class="py-4 text-center">
        		<div class="container-fluid px-auto px-xl-5">
        			<p class="mb-1">Copyright © Wirtualne Pomorze 2021 <br> by Mateusz Wydra & Mateusz Rembowski</p>
        		</div>
        	</div>
        </div>
    </div>
</div>

@endsection
