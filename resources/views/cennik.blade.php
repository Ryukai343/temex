@extends('layouts/app')
@section('header_text')
    Cenník
@endsection
@section('content')
    <article>
        <div class="container marketing pt-5">
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">Brúsenie<img src="{{ asset('image/sander.png') }}" class="sander_icon"></h2>
                    <div class="lead">
                        <ul class="list text-left">
                            <li class="text-left">Brúsenie 1-hrob bez platne</li>
                            <li>Brúsenie 2-hrob bez platní</li>
                            <li>Brúsenie 3-hrob bez platní</li>
                            <li>Brúsenie 1-hrob s platňou</li>
                            <li>Brúsenie 2-hrob s platňami</li>
                            <li>Brúsenie 3-hrob s platňami</li>
                            <li>Brúsenie pomník kameninový (podľa veľkosti) - 50 €</li>
                            <li>Brúsenie pomník mramorový (podľa veľkosti) - 70 €</li>
                        </ul>
                        <p class="text-center"><strong>Cena po obhliadke dohodou. Preferujeme zaslanie fotografie.</strong></p>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('image/brusenie_hrob.png') }}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1"><i class="fa-solid fa-brush "></i>    Ochranný náter</h2>
                    <ul class="lead">
                        <li>Ochranný náter proti vode, machu a popraskaniu 1-hrob - 30 €</li>
                        <li>Ochranný náter proti vode, machu a popraskaniu 2-hrob - 50 €</li>
                        <li>Ochranný náter proti vode, machu a popraskaniu 3-hrob - 70 €</li>
                    </ul>
                </div>
                <div class="col-md-5 order-md-1">
                    <img src="{{ asset('image/nater_hrob.png') }}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">Ostatné</h2>
                    <ul class="lead">
                        <li>Zdvihnutie upadnutej stredovej priečky - 25 €</li>
                        <li>Zdvihnutie upadnutého hrobu (nutné vidieť) - 280 €</li>
                        <li>Montáž - demontáž pomníka - 25 € - 25 €</li>
                        <li>Výmena sokla (pod pomníkom) - 30 €</li>
                        <li>Osadenie odlepených obrúb - 40 €</li>
                        <li>Lampáš (strieborný základný) - 25 € 1ks</li>
                        <li>Váza (strieborná základná) - 25 € 1ks</li>
                        <li>Osadenie lampášov a váz - 5 € 1ks</li>
                        <li>Opravy poškodených kusov a základov (treba vždy najprv vidieť) - cena dohodou</li>
                        <li>Obnova písma všetky farby - cena dohodou</li>
                    </ul>
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->
            <p class="text-center"><strong>Všetky ceny sú uvedené s DPH.</strong></p>
            <h2 class="text-center pb-5 mb-0">Pri kompletnom prebrúsení hrobu obnova písma a doprava ZADARMO !!!</h2>
        </div>
    </article>
@endsection
