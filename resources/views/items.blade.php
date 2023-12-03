@extends('layouts/app')
@section('content')
                <article>
                    <div class="album py-3">
                        <div class="container py-4">
                            <a href="{{ url('/createItem') }}" class="btn btn-sm btn-outline-secondary">Pridať položku</a>
                            <hr>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                @foreach($items as $item)
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <img src="item_Images/{{ $item->picture }}"  class="bd-placeholder-img card-img-top item_picture" alt="{{ $item->picture }}">
                                        <div class="card-body">
                                            <h3 class="card-text">{{ $item->name }}</h3>
                                            <p class="card-text">{{ $item->description }}</p>
                                            <p class="card-text">{{ $item->picture }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <form method="POST" action="{{ route('items.destroy', $item->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                    <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-cart-shopping"></i></button>
                                                </div>
                                                <small class="text-body-secondary">{{ $item->price }}€</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </article>
@endsection
