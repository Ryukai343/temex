@extends('layouts.app')
@section('header_text')
    Nákupný košík
@endsection
@section('content')
    <article>
        <div class="h-100 h-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        @if(session('cart'))
                        <div class="card card-registration card-registration-2">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black">Nákupný košík</h1>
                                            </div>
                                            <hr class="my-4">
                                            @foreach(session('cart') as $id => $item )
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-xl-1">
                                                        <img
                                                            src="/item_Images/{{ $item['picture'] }}" class="img-fluid rounded-3" alt="/item_Images/{{ $item['picture'] }}">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted text-center text-md-start">{{ $item['name'] }}</h6>
                                                        <h6 class="text-black mb-0 text-center text-md-start">{{ $item['price'] }}€</h6>
                                                    </div>
                                                    <div class="col-md-3 justify-content-between align-items-center col-lg-3 col-xl-2 d-flex">
                                                        <form method="POST" action="{{ route('cart.item_quantity_sub', $id) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-link px-2">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </form>

                                                        <h5 class="mb-0">{{ $item['quantity'] }}</h5>

                                                        <form method="POST" action="{{ route('cart.item_quantity_add', $id) }}">
                                                            @csrf
                                                            <button class="btn btn-link px-2" type="submit">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h5 class="mb-0 text-center text-md-end">{{ $item['fullPrice'] }}€</h5>
                                                    </div>
                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end align-items-center">
                                                        <form method="POST" action="{{ route('cart.item_delete', $id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button  class="btn text-muted text-center" type="submit"><i class="fas fa-times"></i></button>
                                                        </form>
                                                    </div>
                                                </div>

                                                <hr class="my-4">
                                            @endforeach
                                                <h3 class="text-black mb-4 text-end">Spolu cena: {{session('sum_price')}}€</h3>

                                                <div class="card">
                                                    <div class="card-body d-flex justify-content-center">
                                                        <a href="{{ url('/objednavka') }}" class="btn btn-primary btn-lg flex-shrink-0k">Pokračovať</a>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="rounded-3 mb-4 empty row d-flex justify-content-between align-items-center">
                                <div class="card-body p-4">
                                    <h1 class="lead fw-normal mb-2 text-center">Košík je prádny</h1>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
