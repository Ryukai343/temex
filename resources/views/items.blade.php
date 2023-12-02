@extends('layouts/app')
@section('content')
                <article>
                    <div class="album py-3">
                        <div class="container py-4">
                            <a href="{{ url('/createItem') }}" class="btn btn-sm btn-outline-secondary">Pridať položku</a>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                @foreach($items as $item)
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{ $item->name }}</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $item->name }}</text></svg>
                                        <div class="card-body">
                                            <h3 class="card-text">{{ $item->name }}</h3>
                                            <p class="card-text">{{ $item->description }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">Zmazať</button>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
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
