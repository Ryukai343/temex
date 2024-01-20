@extends('layouts.app')
@section('header_text')
    {{ $item->name }}
@endsection
@section('content')
    <article>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <div class="container px-4 px-lg-5 py-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/item_Images/{{ $item->picture }}" alt="{{ $item->picture }}"/></div>
                    <div class="col-md-6 ml-5 pl-5">
                        <h1 class="display-5 fw-bolder">{{ $item->name }}</h1>
                        <p class="lead text-break">{{ $item->description }}</p>
                        <div class="fs-5 mb-3">
                            <span>{{ $item->price }}€</span>
                        </div>
                        <form method="POST" action="{{ route('cart.item_add', $item) }}" class="d-flex">
                            @csrf
                            <label for="inputQuantity"></label><input class="form-control text-center me-3" name="inputQuantity" id="inputQuantity" type="number" value="1"/>
                            <button type="submit"  class="btn btn-outline-dark flex-shrink-0"><i class="fa-solid fa-cart-shopping"></i>Vložiť do košíka</button>
                        </form>
                    </div>
                </div>
            </div>
    </article>
@endsection
