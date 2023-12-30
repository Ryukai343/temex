@php use App\Http\Controllers\ProfileController; @endphp
@extends('layouts/app')
@section('header_text')
    Detail objednávky
@endsection
@section('content')
<article>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex flex-column align-items-center">
                    <img src="/order_images/{{ $headerOrder->photo }}" class="img-fluid rounded-3" alt="{{ $headerOrder->photo }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Customer Information</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $headerOrder->name }}</p>
                        <p><strong>Surname:</strong> {{ $headerOrder->surname }}</p>
                        <p><strong>Phone Number:</strong> {{ $headerOrder->phone }}</p>
                        <p><strong>City:</strong> {{ $headerOrder->city }}</p>
                        <p><strong>Zip Code:</strong> {{ $headerOrder->psc }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h2>Job Description</h2>
                    </div>
                    <div class="card-body">
                        <p class="text-break">{{ $headerOrder->description }}</p>
                    </div>
                </div>
                @if(ProfileController::roleCheck(auth()->user()->role))
                    <div class="card my-3 py-3">
                        <form method="POST" action="{{ route('order.update', $headerOrder) }}">
                            @csrf
                            <div class="d-flex justify-content-center">
                                @if($headerOrder->status == 'vybavená')
                                    <button type="submit" class="btn btn-lg btn-sm btn-primary">Otvoriť objednávku</button>
                                @else
                                    <button type="submit" class="btn btn-lg btn-sm btn-danger justify-content-center">Ukončiť objednávku</button>
                                @endif
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        <hr>
        <div class="h-100 h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-12">
                                    <div class="p-2">
                                        <hr class="my-1">
                                        @foreach($items as $item)
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-xl-1">
                                                    <img src="/item_Images/{{ $item->picture }}" class="img-fluid rounded-3" alt="{{ $item->picture }}">
                                                </div>
                                                <div class="col-2 col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted text-center text-md-start">{{ $item->name }}</h6>
                                                    <h6 class="text-black mb-0 text-center text-md-start">{{ $item->price }}€</h6>
                                                </div>
                                                <div class="col-2 col-md-3 col-lg-3 col-xl-2">
                                                    <h5 class="mb-0 text-center text-md-end">{{ $item->quantity }} ks</h5>
                                                </div>
                                                <div class="col-2 col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h5 class="mb-0 text-center text-md-end">{{ $item->price * $item->quantity }}€</h5>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                        @endforeach
                                        <h3 class="text-black mb-4 text-end">Spolu cena: {{$headerOrder->total_price}}€</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
