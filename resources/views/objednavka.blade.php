@extends('layouts/app')
@section('content')
    <article>
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="featurette-heading fw-normal lh-1 text-center">Objednávka</h2>
                    <form class="mt-4" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="firstName">Meno</label>
                                    <input type="text" id="firstName" class="form-control form-control-lg" placeholder="Meno" required/>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="lastName">Priezvisko</label>
                                    <input type="text" id="lastName" class="form-control form-control-lg" placeholder="Priezvisko" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control form-control-lg" id="email"  placeholder="Meno@email.sk" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="phone">Tel. číslo</label>
                                    <input type="tel" id="phone" class="form-control form-control-lg" placeholder="Tel. číslo" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="city">Mesto</label>
                                    <input type="text" id="city"  class="form-control form-control-lg"  placeholder="Mesto" required>
                                </div>
                            </div>
                            <div class="col-md-2 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="zip">PSČ</label>
                                    <input type="text" id="zip"  class="form-control form-control-lg" placeholder="PSČ" pattern="^\d+$" minlength="5"  maxlength="5" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline" data-mdb-input-init>
                                    <label class="form-label" for="customPhoto" >Priložte fotografiu</label>
                                    <input type="file" class="form-control" id="customPhoto" accept="image/*"/>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="form-outline" data-mdb-input-init>
                                    <label class="form-label" for="textAreaExample">Popis renovácie</label>
                                    <textarea class="form-control form-control-lg" id="textAreaExample" rows="4"></textarea>
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
            <h2 class="text-center pb-5 mb-0">Pri kompletnom prebrúsení hrobu obnova písma a doprava ZADARMO !!!</h2>
        </div>
    </article>
@endsection
