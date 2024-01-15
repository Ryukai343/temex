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
                <div class="col-lg-5">
                    <div class="image-comparison">
                        <div class="images-container">
                            <img class="before-image" src="{{ asset('image/brusenie_before.jpg') }}" alt="" />
                            <img class="after-image" src="{{ asset('image/brusenie_after.png') }}" alt="" />

                            <div class="slider-line"></div>
                            <div class="slider-icon">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"
                                    />
                                </svg>
                            </div>

                            <input type="range" class="slider" min="0" max="100" />
                        </div>
                    </div>
{{--                        <img src="{{ asset('image/brusenie_after.png') }}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto">--}}
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
                    <div class="image-comparison">
                        <div class="images-container">
                            <img class="before-image" src="{{ asset('image/nater_hrob_before.jpg') }}" alt="" />
                            <img class="after-image" src="{{ asset('image/nater_hrob_after.jpg') }}" alt="" />

                            <div class="slider-line"></div>
                            <div class="slider-icon">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"
                                    />
                                </svg>
                            </div>

                            <input type="range" class="slider" min="0" max="100" />
                        </div>
                    </div>
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
