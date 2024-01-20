@extends('layouts/app')
@section('header_text')
    Osobné údaje
@endsection
@section('content')
<article>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container rounded mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 ">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5 profile" src="{{ asset('image/profile_picture.webp') }}" alt="Profilový obrázok">
                    <span class="text-black-50 mt-4">{{$user->email}}</span>
                </div>
            </div>
            <div class="col-md-5">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Nastavenie osobných údajov</h4>
                    </div>
                    <form method="POST" action="{{ route('profile.update')}}">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels" for="firstName">Name</label>
                                <input type="text" class="form-control" placeholder="meno" id="firstName" name="firstName" value="{{$user->name}}">
                                <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                            </div>

                            <div class="col-md-6">
                                <label class="labels" for="lastName">Surname</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value="{{$user->surname}}" placeholder="priezvisko">
                                <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels" for="phone">Tel. číslo</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="tel.číslo" value="{{$user->phone}}">
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                            <div class="col-md-12">
                                <label class="labels" for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{$user->email}}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels" for="city">Mesto</label>
                                <input type="text" class="form-control" id="city" name="city"  placeholder="Mesto" value="{{$user->city}}">
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>
                            <div class="col-md-6">
                                <label class="labels" for="psc">Psč</label>
                                <input type="text" class="form-control" id="psc" name="psc"  value="{{$user->psc}}" placeholder="Psč">
                                <x-input-error :messages="$errors->get('psc')" class="mt-2" />
                            </div>

                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Uložiť zmeny</button>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('password.update')}}">
                        @csrf
                        @method('PUT')
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels" for="password">Nove heslo</label>
                            <input type="password" class="form-control" id="password" name="password"  placeholder="Nové heslo">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Zmeniť heslo</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
