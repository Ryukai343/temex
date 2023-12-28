@extends('layouts.app')
@section('content')
    <article>
            <div class="container px-4 px-lg-5 py-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                                               src="/item_Images/{{ $item->picture }}" alt="{{ $item->picture }}"/></div>
                    <div class="col-md-6 ml-5 pl-5">
                        <h1 class="display-5 fw-bolder">{{ $item->name }}</h1>
                        <div class="fs-5 mb-3">
                            <span>{{ $item->price }}€</span>
                        </div>
                        <p class="lead text-break">{{ $item->description }}</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                                   style="max-width: 3rem"/>
                            <a type="button" href="{{ route('items.add_to_cart', $item) }}" class="btn btn-outline-dark flex-shrink-0"><i class="fa-solid fa-cart-shopping"></i>Vložiť do košíka</a>
                        </div>
                    </div>
                </div>
            </div>
    </article>
@endsection
