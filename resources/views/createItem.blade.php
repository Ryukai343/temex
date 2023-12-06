<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pridanie položky</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/button.css') }}">

    </head>
    <body>
    <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Pridanie položky</h2>
                                <form method="POST" action="{{ route('items.store') }}"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <label for="name" class="form-label">Názov</label>
                                        <input type="text" id="name" name="name" class="form-control form-control-lg" value="{{ old('name') }}" required>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label for="description" class="form-label">Popis</label>
                                        <textarea id="description" class="form-control form-control-lg"  name="description" maxlength="200" required>{{ old('description') }}</textarea>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                        <span id="character-count">0/200</span>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label for="picture" class="form-label">Obrázok položky</label>
                                        <input type="file" class="form-control form-control-lg" id="picture" name="picture" accept="image">
                                        <x-input-error :messages="$errors->get('picture')" class="mt-2" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label for="price" class="form-label">Cena</label>
                                        <input type="text" class="form-control form-control-lg" id="price" onkeypress="return /[0-9]/i.test(event.key)" name="price" pattern="^\d+$" value="{{ old('price') }}" required>
                                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class=" pushable btn btn-primary  btn-block btn-lg gradient-custom-4 ">Vytvoriť položku</button>
                                    </div>
                                    <div class="meter" hidden>
                                        <span id="XC"></span>
                                        <span id="YC"></span>
                                        <span id="DIS"></span>
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
    <script src="{{ asset('js/describtion_number_of_chars.js') }}"></script>
    <script src="{{ asset('js/button.js') }}"></script>
</html>
