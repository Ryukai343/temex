<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prihlásenie</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    </head>
    <body>
    <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Pridanie položky</h2>
                                <form method="POST" action="{{ route('items.store') }}">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" id="name" name="name" class="form-control form-control-lg" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label for="description" class="form-label">Description:</label>
                                        <textarea id="description" class="form-control form-control-lg"  name="description">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label for="picture" class="form-label">Picture URL:</label>
                                        <input type="text" class="form-control form-control-lg" id="picture" name="picture" value="{{ old('picture') }}">
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label for="price" class="form-label">Price:</label>
                                        <input type="number" class="form-control form-control-lg" id="price" name="price" value="{{ old('price') }}">
                                    </div>

                                    <div>
                                        <button type="submit">Pridaj Položku</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>
