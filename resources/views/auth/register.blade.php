<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TEMEX- renovácie hrobov</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="images/x-icon" href="{{ asset('image/Logo.png') }}" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/registracia.css">
</head>
<body>
<section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <!-- Name -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="firstName" :value="__('Name')" />
                                            <x-text-input id="firstName" class="form-control form-control-lg" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="firstName" />
                                            <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                                        </div>

                                        <!-- Surname -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="lastName" :value="__('Name')" />
                                            <x-text-input id="lastName" class="form-control form-control-lg" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="lastName" />
                                            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                                        </div>

                                        <!-- Email Address -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="password" :value="__('Password')" />

                                            <x-text-input id="password" class="form-control form-control-lg"
                                                            type="password"
                                                            name="password"
                                                            required autocomplete="new-password" />

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="form-outline mb-4">
                                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                            <x-text-input id="password_confirmation" class="form-control form-control-lg"
                                                            type="password"
                                                            name="password_confirmation" required autocomplete="new-password" />

                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                        <p class="text-center text-muted mt-5 mb-0">Už ste registrovaný?
                                            <a class="fw-bold text-body" href="{{ route('login') }}">
                                                {{ __('Prihláste sa') }}
                                            </a>
                                        </p>

                                        <div class="d-flex justify-content-center">
                                            <x-primary-button class="btn btn btn-primary  btn-block btn-lg gradient-custom-4">
                                                {{ __('Registrácia') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
