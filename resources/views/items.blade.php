@php use App\Http\Controllers\ProfileController; @endphp
@extends('layouts/app')
@section('header_text')
    Obchod
@endsection
@section('content')
        <article>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="album py-3">
                <div class="container py-4">
                    @if(auth()->user() != null && ProfileController::roleCheck(auth()->user()->role) )
                        <a href="{{ url('/createItem') }}" class="btn btn-sm btn-outline-secondary">Pridať položku</a>
                        <a href="{{ url('/createItemsType') }}" class="btn btn-sm btn-outline-secondary">Pridať typ položky</a>
                        <hr>
                    @endif
                    <div id="mobile-filter" class="d-md-none">
                        <div class="py-3">
                            <h5 class="font-weight-bold">Kategórie</h5>
                            <ul class="list-group">
                                @foreach($types as $type)
                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category px-2">
                                        <a href="{{ route('items.index', $type) }}" class="category">{{$type->type}}</a>
                                        @if(auth()->user() != null && ProfileController::roleCheck(auth()->user()->role) )
                                            <form method="POST" action="{{ route('itemsType.destroy', $type) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                            <a href="{{ route('itemsType.edit', $type) }}" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <section id="sidebar" class="d-none d-md-block">
                        <h5 class="font-weight-bold">Kategórie</h5>
                        <ul class="list-group">
                            @foreach($types as $type)
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category px-2">
                                    <a href="{{ route('items.index', $type) }}" class="category">{{$type->type}}</a>
                                    @if(auth()->user() != null && ProfileController::roleCheck(auth()->user()->role) )
                                        <form method="POST" action="{{ route('itemsType.destroy', $type) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('itemsType.edit', $type) }}" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </section>
                    @if($items->count() == 0)
                            <div class="col cols-12 my-5 py-5">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h3 class="card-text mb-2 text-center">Nenašli sa položky</h3>
                                    </div>
                                </div>
                            </div>
                    @else
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-3">
                        @foreach($items as $item)
                        <div class="col">
                            <div class="card shadow-sm">
                                <a href="{{ route('items.show', $item) }}" class="link-body-emphasis text-decoration-none">
                                <img src="/item_Images/{{ $item->picture }}"  class="bd-placeholder-img card-img-top item_picture" alt="{{ $item->picture }}">
                                </a>
                                <div class="card-body">
                                    <a href="{{ route('items.show', $item) }}" class="link-body-emphasis text-decoration-none">
                                        <h3 class="card-text mb-2">{{ $item->name }}</h3>
                                    </a>
                                    <div class="d-flex justify-content-between">
                                        <p class="text-body-secondary m-0">{{ $item->price }}€</p>
                                        <div class="btn-group align-items-right">
                                            @if(auth()->user() != null && ProfileController::roleCheck(auth()->user()->role) )
                                                <form method="POST" action="{{ route('items.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                                <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @endif
                                            <form method="POST" action="{{ route('cart.item_add', $item) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-cart-shopping"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </article>
@endsection
