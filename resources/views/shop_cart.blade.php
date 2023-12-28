@extends('layouts.app')
@section('content')
    <article>
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
                    @if(session('cart'))
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 text-black">Nákupný košík</h3>
                        </div>
                        @foreach(session('cart') as $id => $item )
                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img
                                                src="/item_Images/{{ $item['picture'] }}" class="img-fluid rounded-3" alt="{{ $item['picture'] }}">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">{{ $item['name'] }}</p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="0" name="quantity" value="{{ $item['quantity'] }}" type="number"
                                                   class="form-control form-control-sm" />

                                            <button class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">{{ $item['price'] }}€</h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="{{ route('items.delete_cart_item', $id) }}" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <div class="card">
                                <div class="card-body d-flex justify-content-center">
                                    <a href="{{ url('/objednavka') }}" class="btn btn-primary btn-lg flex-shrink-0k">Objednat</a>
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
    </article>
@endsection
