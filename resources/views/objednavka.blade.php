@extends('layouts/app')
@section('header_text')
    Objednávka
@endsection
@section('content')
    <article>
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="featurette-heading fw-normal lh-1 text-center">Objednávka</h2>
                    <form class="mt-4" method="POST" action="{{ route('headerOrder.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="firstName">Meno</label>
                                    <input type="text"  name="firstName" id="firstName" class="form-control form-control-lg" placeholder="Meno" required/>
                                    <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="lastName">Priezvisko</label>
                                    <input type="text" name="lastName" id="lastName" class="form-control form-control-lg" placeholder="Priezvisko" required/>
                                    <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-lg" id="email"  placeholder="Meno@email.sk" required>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="phone">Tel. číslo</label>
                                    <input type="tel" name="phone" id="phone" class="form-control form-control-lg" placeholder="Tel. číslo" required/>
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="city">Mesto</label>
                                    <input type="text" id="city" name="city" class="form-control form-control-lg"  placeholder="Mesto" required>
                                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-2 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="zip">PSČ</label>
                                    <input type="text" id="zip" name="zip" class="form-control form-control-lg" placeholder="PSČ" pattern="^\d+$" minlength="5"  maxlength="5" required>
                                    <x-input-error :messages="$errors->get('zip')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline" data-mdb-input-init>
                                    <label class="form-label" for="photo" >Priložte fotografiu</label>
                                    <input type="file" name="photo" class="form-control" id="photo" accept="image"/>
                                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="form-outline" data-mdb-input-init>
                                    <label class="form-label" for="description">Popis renovácie</label>
                                    <textarea class="form-control form-control-lg" name="description" id="description" rows="4"></textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn btn-primary  btn-block btn-lg gradient-custom-4">Odoslať</button>
                        </div>
                    </form>
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->
            <p class="text-center"><strong>Všetky ceny sú uvedené s DPH.</strong></p>
            <h2 class="text-center pb-5 mb-0">Objednávacia cena je len orientačná! Počas renovácie sa môže zmeniť.</h2>
        </div>
    </article>
@endsection
