@extends('layouts/app')
@section('content')
        <article>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="album py-3">
                <div class="container py-4">
                    <a href="{{ url('/createItem') }}" class="btn btn-sm btn-outline-secondary">Pridať položku</a>
                    <a href="{{ url('/createItemType') }}" class="btn btn-sm btn-outline-secondary">Pridať typ položky</a>
                    <hr>
                    <div id="mobile-filter" class="d-md-none">
                        <div class="py-3">
                            <h5 class="font-weight-bold">Categories</h5>
                            <ul class="list-group">
                                @foreach($types as $type)
                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category px-2"><a href="{{ route('items.index', $type) }}" class="category">{{$type->type}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <section id="sidebar" class="d-none d-md-block">
                        <h5 class="font-weight-bold">Categories</h5>
                        <ul class="list-group">
                            @foreach($types as $type)
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category px-2"><a href="{{ route('items.index', $type) }}" class="category">{{$type->type}}</a></li>
                            @endforeach
                        </ul>
                    </section>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-3">
                        @foreach($items as $item)
                        <div class="col">
                            <a href="{{ route('items.show', $item) }}" class="link-body-emphasis text-decoration-none">
                                <div class="card shadow-sm">
                                    <img src="/item_Images/{{ $item->picture }}"  class="bd-placeholder-img card-img-top item_picture" alt="{{ $item->picture }}">
                                    <div class="card-body">
                                        <h3 class="card-text mb-2">{{ $item->name }}</h3>
                                        <div class="d-flex justify-content-between">
                                            <div class="btn-group align-items-left">
                                                <form method="POST" action="{{ route('items.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                                <a type="button" href="{{ route('items.add_to_cart', $item) }}" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-cart-shopping"></i></a>
                                            </div>
                                            <small class="text-body-secondary">{{ $item->price }}€</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </article>
@endsection
